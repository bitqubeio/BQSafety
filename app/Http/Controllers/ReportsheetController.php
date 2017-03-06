<?php

namespace App\Http\Controllers;

use App\Location;
use Carbon\Carbon;
use PDF;
use App\Reportsheet;
use App\Http\Requests\ReportsheetCreateRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use narutimateum\Toastr\Facades\Toastr;
use Yajra\Datatables\Facades\Datatables;

class ReportsheetController extends Controller
{
    public function allListing()
    {
        // report sheets
        $reportsheets = Reportsheet::where('reportsheet_status', 0)
            ->join('users', 'users.id', '=', 'reportsheets.user_id')
            ->join('locations', 'locations.id', '=', 'reportsheets.location_id')
            ->select([
                'reportsheets.id',
                'reportsheets.reportsheet_datetime',
                'reportsheets.created_at',
                'user_username',
                'avatar',
                'location_name',
                'reportsheet_classification',
                'reportsheet_description',
                'reportsheet_correctiveaction',
                'reportsheet_image',
            ])
            ->get();

        // return
        return Datatables::of($reportsheets)
            ->addColumn('action', function ($reportsheet) {
                $newControl = null;
                // crear seguimiento y control
                if (auth()->user()->can('tracking-create')) {
                    $newControl = '<button value="' . $reportsheet->id . '" onclick="showWindowControl(this);"><i class="fa fa-calendar-check-o" aria-hidden="true" title="Seguimiento y Control"></i></button>';
                }
                return $newControl . ' <a href="reportsheets/' . $reportsheet->id . '" title="Ver"><i class="fa fa-eye"></i></a>';
            })
            ->editColumn('reportsheet_datetime', function ($reportsheet) {
                return '<span class="badge badge-progress badge-md"><i class="fa fa-clock-o"></i> ' . date('d/m/Y - H:i', strtotime($reportsheet->reportsheet_datetime)) . '</span>';
            })
            ->editColumn('user_username', function ($reportsheet) {
                return '<span class="small">' . $reportsheet->user_username . '</span><div class="imageuser"><ul><li><img src="images/avatars/' . $reportsheet->avatar . '"> </li></ul></div>';
            })
            ->editColumn('location_name', function ($reportsheet) {
                return '<span class="small">' . $reportsheet->location_name . '</span>';
            })
            ->editColumn('reportsheet_classification', function ($reportsheet) {
                $classifications = $reportsheet->reportsheet_classification;
                $classification = explode(',', $classifications);
                $var = null;
                if (in_array(1, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #E25668"></i> Accidente Seguridad</span><br>';
                }
                if (in_array(2, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #CF56E2"></i> Incidente Seguridad</span><br>';
                }
                if (in_array(3, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #8A56E2"></i> Acto Subestandar</span><br>';
                }
                if (in_array(4, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #68E256"></i> Accidente Ambiental</span><br>';
                }
                if (in_array(5, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #E2CF56"></i> Incidente Ambiental</span><br>';
                }
                if (in_array(6, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #E28956"></i> Condición Subestandar</span><br>';
                }
                return $var;
            })
            ->editColumn('reportsheet_description', function ($reportsheet) {
                return '<p class="small text-muted">Creado ' . $reportsheet->created_at->diffForHumans() . '</p><p class="small">' . str_limit($reportsheet->reportsheet_description, 47) . '</p>';
            })
            ->editColumn('reportsheet_correctiveaction', function ($reportsheet) {
                return '<p class="small">' . str_limit($reportsheet->reportsheet_correctiveaction, 47) . '</p>';
            })
            ->editColumn('reportsheet_image', function ($reportsheet) {
                return '<div class="imageitem"><ul><li><img src="images/reportsheets/thumbnail/' . $reportsheet->reportsheet_image . '"></li></ul></div>';
            })
            ->rawColumns(['action', 'reportsheet_datetime', 'user_username', 'location_name', 'reportsheet_classification', 'reportsheet_description', 'reportsheet_correctiveaction', 'reportsheet_image'])
            ->make(true);
    }

    public function listTrackingReportSheets($type)
    {
        // tracking report sheets by type
        $reportsheets = Reportsheet::where('reportsheet_status', $type)
            ->join('tracking_report_sheets', 'tracking_report_sheets.reportsheet_id', '=', 'reportsheets.id')
            ->join('users', 'users.id', '=', 'reportsheets.user_id')
            ->join('locations', 'locations.id', '=', 'reportsheets.location_id')
            ->select([
                'reportsheets.id',
                'reportsheets.created_at',
                'tracking_report_sheet_responsible',
                'tracking_report_sheet_start_date',
                'tracking_report_sheet_end_date',
                'tracking_report_sheet_description',
                'tracking_report_sheet_image',
                'tracking_report_sheet_file',
                'user_username',
                'avatar',
                'location_name',
                'reportsheet_classification',
                'reportsheet_description',
                'reportsheet_status'
            ])
            ->get();

        // return
        return Datatables::of($reportsheets)
            ->addColumn('action', function ($reportsheet) {
                $newControl = $pdf = null;
                // editar seguimiento y control
                if (auth()->user()->can('tracking-edit')) {
                    $newControl = '<button value="' . $reportsheet->id . '" onclick="showTrackingInModal(this);"><i class="fa fa-pencil" aria-hidden="true" title="Seguimiento y Control"></i></button>';
                }
                if (auth()->user()->can('tracking-export-pdf')) {
                    $pdf = ' <a target="_blank" href="/TrackingReportSheetPDFDownload/' . $reportsheet->id . '" title="Ver"><i class="fa fa-file-pdf-o" style="color: red;"></i></a> ';
                }
                return $newControl . $pdf . ' <a href="/reportsheets/' . $reportsheet->id . '" title="Ver"><i class="fa fa-eye"></i></a>';
            })
            ->editColumn('reportsheet_status', function ($reportsheets) {
                if ($reportsheets->reportsheet_status == 1) {
                    return '<span class="badge badge-danger badge-md"><i class="fa fa-clock-o"></i> Pendiente</span>';
                }
                if ($reportsheets->reportsheet_status == 2) {
                    return '<span class="badge badge-warning badge-md"><i class="fa fa-clock-o"></i> En Proceso</span>';
                }
                if ($reportsheets->reportsheet_status == 3) {
                    return '<span class="badge badge-success badge-md"><i class="fa fa-clock-o"></i> Levantado</span>';
                }
                return null;
            })
            ->editColumn('user_username', function ($reportsheet) {
                return '<span class="small">' . $reportsheet->user_username . '</span><div class="imageuser"><ul><li><img src="../images/avatars/' . $reportsheet->avatar . '"></li></ul></div>';
            })
            ->editColumn('reportsheet_description', function ($reportsheet) {
                return '<p class="small ">' . $reportsheet->location_name . '<br>' . str_limit($reportsheet->reportsheet_description, 47) . '</p>';
            })
            ->editColumn('reportsheet_classification', function ($reportsheet) {
                $classifications = $reportsheet->reportsheet_classification;
                $classification = explode(',', $classifications);
                $var = null;
                if (in_array(1, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #E25668"></i> Accidente Seguridad</span><br>';
                }
                if (in_array(2, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #CF56E2"></i> Incidente Seguridad</span><br>';
                }
                if (in_array(3, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #8A56E2"></i> Acto Subestandar</span><br>';
                }
                if (in_array(4, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #68E256"></i> Accidente Ambiental</span><br>';
                }
                if (in_array(5, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #E2CF56"></i> Incidente Ambiental</span><br>';
                }
                if (in_array(6, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #E28956"></i> Condición Subestandar</span><br>';
                }
                return $var;
            })
            ->editColumn('tracking_report_sheet_responsible', function ($reportshet) {
                return '<p class="small">' . $reportshet->tracking_report_sheet_responsible . '</p><span class="badge badge-success badge-md"><i class="fa fa-calendar-minus-o"></i> ' . $reportshet->tracking_report_sheet_start_date->toFormattedDateString() . '</span> - <span class="badge badge-success badge-md"><i class="fa fa-calendar-check-o"></i> ' . $reportshet->tracking_report_sheet_end_date->toFormattedDateString() . '</span>';
            })
            ->editColumn('tracking_report_sheet_description', function ($reportshet) {
                return '<p class="small">' . str_limit($reportshet->tracking_report_sheet_description, 47) . '</p>';
            })
            ->editColumn('tracking_report_sheet_image', function ($reportsheet) {
                $image = null;
                if ($reportsheet->tracking_report_sheet_image) {
                    $image = '<div class="imageitem"><ul><li><img src="/images/trackingreportsheets/thumbnail/' . $reportsheet->tracking_report_sheet_image . '"></li></ul></div>';
                }
                return $image;
            })
            ->editColumn('tracking_report_sheet_file', function ($reportsheet) {
                $file = '<small>no existe</small>';
                if ($reportsheet->tracking_report_sheet_file) {
                    $file = '<a target="_blank" href="/files/trackingreportsheets/' . $reportsheet->tracking_report_sheet_file . '"><i class="fa fa-paperclip"></i><small>' . $reportsheet->tracking_report_sheet_file . '</small></a>';
                }
                return $file;
            })
            ->rawColumns(['action', 'reportsheet_status', 'user_username', 'reportsheet_description', 'reportsheet_classification', 'tracking_report_sheet_responsible', 'tracking_report_sheet_description', 'tracking_report_sheet_image', 'tracking_report_sheet_file'])
            ->make(true);
    }

    public function listing()
    {
        // report sheets
        $reportsheets = Reportsheet::join('users', 'users.id', '=', 'reportsheets.user_id')
            ->join('locations', 'locations.id', '=', 'reportsheets.location_id')
            ->select([
                'reportsheets.id',
                'reportsheets.reportsheet_datetime',
                'reportsheets.created_at',
                'user_username',
                'avatar',
                'location_name',
                'reportsheet_classification',
                'reportsheet_description',
                'reportsheet_correctiveaction',
                'reportsheet_status',
                'reportsheet_image',
            ])
            ->where('user_id', auth()->user()->id)
            ->get();

        // return
        return Datatables::of($reportsheets)
            ->addColumn('action', function ($reportsheet) {
                return '<a href="reportsheet/' . $reportsheet->id . '" title="Ver"><i class="fa fa-eye"></i></a>';
            })
            ->editColumn('reportsheet_datetime', function ($reportsheet) {
                return '<span class="badge badge-success badge-md"><i class="fa fa-clock-o"></i> ' . date('d/m/Y - H:i', strtotime($reportsheet->reportsheet_datetime)) . '</span>';
            })
            ->editColumn('user_username', function ($reportsheet) {
                return '<span class="small">' . $reportsheet->user_username . '</span><div class="imageuser"><ul><li><img src="images/avatars/' . $reportsheet->avatar . '"> </li></ul></div>';
            })
            ->editColumn('location_name', function ($reportsheet) {
                return '<span class="small">' . $reportsheet->location_name . '</span>';
            })
            ->editColumn('reportsheet_classification', function ($reportsheet) {
                $classifications = $reportsheet->reportsheet_classification;
                $classification = explode(',', $classifications);
                $var = null;
                if (in_array(1, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #E25668"></i> Accidente Seguridad</span><br>';
                }
                if (in_array(2, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #CF56E2"></i> Incidente Seguridad</span><br>';
                }
                if (in_array(3, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #8A56E2"></i> Acto Subestandar</span><br>';
                }
                if (in_array(4, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #68E256"></i> Accidente Ambiental</span><br>';
                }
                if (in_array(5, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #E2CF56"></i> Incidente Ambiental</span><br>';
                }
                if (in_array(6, $classification)) {
                    $var .= '<span class="small text-muted"><i class="fa fa-circle" style="color: #E28956"></i> Condición Subestandar</span><br>';
                }
                return $var;
            })
            ->editColumn('reportsheet_description', function ($reportsheet) {
                return '<p class="small text-muted">Creado ' . $reportsheet->created_at->diffForHumans() . '</p><p class="small">' . str_limit($reportsheet->reportsheet_description, 47) . '</p>';
            })
            ->editColumn('reportsheet_correctiveaction', function ($reportsheet) {
                return '<p class="small">' . str_limit($reportsheet->reportsheet_correctiveaction, 47) . '</p>';
            })
            ->editColumn('reportsheet_status', function ($reportsheet) {
                $status = null;
                if ($reportsheet->reportsheet_status == 0)
                    $status = '<span class="badge badge-danger badge-md"><i class="fa fa-eye-slash"></i> No Revisado</span>';
                else
                    $status = '<span class="badge badge-success badge-md"><i class="fa fa-eye"></i> Revisado</span>';
                return $status;
            })
            ->editColumn('reportsheet_image', function ($reportsheet) {
                return '<div class="imageitem"><ul><li><img src="images/reportsheets/thumbnail/' . $reportsheet->reportsheet_image . '"></li></ul></div>';
            })
            ->rawColumns(['action', 'reportsheet_datetime', 'user_username', 'location_name', 'reportsheet_classification', 'reportsheet_description', 'reportsheet_correctiveaction', 'reportsheet_status', 'reportsheet_image'])
            ->make(true);
    }

    public function all()
    {
        // view
        return view('reportsheet.all');
    }

    public function trackingReportSheets($type)
    {
        if ($type == 1 || $type == 2 || $type == 3) {
            return view('trackingreportsheet.trackingreportsheets', ['type' => $type]);
        }
        return abort(403);
    }

    public function index()
    {
        // view
        return view('reportsheet.index');
    }

    public function create()
    {
        // locations
        $locations = Location::where('location_status', 1)
            ->orderBy('location_name', 'ASC')
            ->pluck('location_name', 'id');

        // redirect
        return view('reportsheet.create', ['locations' => $locations]);
    }

    public function store(ReportsheetCreateRequest $request)
    {
        // checkbox data
        $checkboxes = implode(",", $request->get('reportsheet_classification'));

        // object report sheet
        $reportsheet = new Reportsheet($request->all());

        $reportsheet->reportsheet_datetime = Carbon::createFromFormat('d/m/Y H:i', $request->input('reportsheet_datetime'))->format('Y-m-d h:i');

        // checkboxes data to db
        $reportsheet->reportsheet_classification = $checkboxes;

        // if exist image
        if ($request->hasFile('reportsheet_image')) {

            $image = $request->file('reportsheet_image');

            $filename = time() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/reportsheets/thumbnail/' . $filename));

            Image::make($image)->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/reportsheets/700px/' . $filename));

            $reportsheet->reportsheet_image = $filename;
        }

        // save
        auth()->user()->reportsheets()->save($reportsheet);

        // notification
        Toastr::success(
            '¡Enviado correctamente!',
            $title = 'Reporte',
            $options = [
                //
            ]
        );

        // redirect
        return redirect()->route('reportsheet.index');
    }

    public function show($id)
    {
        // find
        $reportsheet = Reportsheet::findOrFail($id);

        // redirect
        return view('reportsheet.show', ['reportsheet' => $reportsheet]);
    }

    public function shows($id)
    {
        // find
        $reportsheet = Reportsheet::findOrFail($id);

        // redirect
        return view('reportsheet.shows', ['reportsheet' => $reportsheet]);
    }

    public function pdfShow($id)
    {
        // find
        $reportsheet = Reportsheet::findOrFail($id);

        //pdf
        $pdf = PDF::loadView('reportsheet.pdf', ['reportsheet' => $reportsheet]);

        // show in windows
        return $pdf->setPaper('a5', 'portrait')->stream('hoja_de_reporte_nro_' . $id . '.pdf');
    }

    public function pdfDownload($id)
    {
        // find
        $reportsheet = Reportsheet::findOrFail($id);

        //pdf
        $pdf = PDF::loadView('reportsheet.pdf', ['reportsheet' => $reportsheet]);

        // download archive
        return $pdf->setPaper('a5', 'portrait')->download('hoja_de_reporte_nro_' . $id . '.pdf');
    }

    public function pdfDownloadWithImage($id)
    {
        // find
        $reportsheet = Reportsheet::findOrFail($id);

        //pdf
        $pdf = PDF::loadView('reportsheet.pdfwithimage', ['reportsheet' => $reportsheet]);

        // download archive
        return $pdf->setPaper('a4', 'landscape')->download('hoja_de_reporte_nro_' . $id . '.pdf');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
