<?php

namespace App\Http\Controllers;

use App\Location;
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
                $newControl = '<button value="' . $reportsheet->id . '" onclick="showWindowControl(this);"><i class="fa fa-calendar-check-o" aria-hidden="true" title="Seguimiento y Control"></i></button>';
                return $newControl . ' <a href="reportsheets/' . $reportsheet->id . '" title="Ver"><i class="fa fa-eye"></i></a>';
            })
            ->editColumn('created_at', function ($reportsheet) {
                return '<span class="badge badge-success badge-md"><i class="fa fa-clock-o"></i> ' . $reportsheet->created_at->toFormattedDateString() . '</span>';
            })
            ->editColumn('user_username', function ($reportsheet) {
                return '<small class="text-muted">' . $reportsheet->user_username . '</small>
                        <div class="imageuser">
                            <ul>
                                <li><img src="images/avatars/' . $reportsheet->avatar . '"> </li>
                            </ul>
                        </div>';
            })
            ->editColumn('reportsheet_classification', function ($reportsheet) {
                $classifications = $reportsheet->reportsheet_classification;
                $classification = explode(',', $classifications);
                $var = null;
                if (in_array(1, $classification)) {
                    $var .= '<span style="background-color:#3498DB" class="badge badge-pill">Accidente Seguridad</span><br>';
                }
                if (in_array(2, $classification)) {
                    $var .= '<span style="background-color:#2ECC71" class="badge badge-pill">Incidente Seguridad</span><br>';
                }
                if (in_array(3, $classification)) {
                    $var .= '<span style="background-color:#F24E4A" class="badge badge-pill">Acto Subestandar</span><br>';
                }
                if (in_array(4, $classification)) {
                    $var .= '<span style="background-color:#293F55" class="badge badge-pill">Accidente Ambiental</span><br>';
                }
                if (in_array(5, $classification)) {
                    $var .= '<span style="background-color:#9B59B6" class="badge badge-pill">Incidente Ambiental</span><br>';
                }
                if (in_array(6, $classification)) {
                    $var .= '<span style="background-color:#F39C12" class="badge badge-pill">Condición Subestandar</span>';
                }
                return $var;
            })
            ->editColumn('reportsheet_description', function ($reportsheet) {
                return '<p class="small text-muted">Creado ' . $reportsheet->created_at->diffForHumans() . '</p><p>' . str_limit($reportsheet->reportsheet_description, 78) . '</p>';
            })
            ->editColumn('reportsheet_correctiveaction', function ($reportsheet) {
                return '<p>' . str_limit($reportsheet->reportsheet_correctiveaction, 78) . '</p>';
            })
            ->editColumn('reportsheet_image', function ($reportsheet) {
                return '<div class="imageitem">
                            <ul>
                                <li><img src="images/reportsheets/thumbnail/' . $reportsheet->reportsheet_image . '"></li>
                            </ul>
                        </div>';
            })
            ->rawColumns(['action', 'created_at', 'user_username', 'reportsheet_classification', 'reportsheet_description', 'reportsheet_correctiveaction', 'reportsheet_image'])
            ->make(true);
    }

    public function listing()
    {
        // report sheets
        $reportsheets = Reportsheet::join('users', 'users.id', '=', 'reportsheets.user_id')
            ->join('locations', 'locations.id', '=', 'reportsheets.location_id')
            ->select([
                'reportsheets.id',
                'reportsheets.created_at',
                'user_username',
                'avatar',
                'location_name',
                'reportsheet_classification',
                'reportsheet_description',
                'reportsheet_correctiveaction',
                'reportsheet_image',
            ])
            ->where('user_id', auth()->user()->id)
            ->get();

        // return
        return Datatables::of($reportsheets)
            ->addColumn('action', function ($reportsheet) {
                return '<a href="reportsheet/' . $reportsheet->id . '" title="Ver"><i class="fa fa-eye"></i></a>';
            })
            ->editColumn('created_at', function ($reportsheet) {
                return '<span class="badge badge-success badge-md"><i class="fa fa-clock-o"></i> ' . $reportsheet->created_at->toFormattedDateString() . '</span>';
            })
            ->editColumn('user_username', function ($reportsheet) {
                return '<small class="text-muted">' . $reportsheet->user_username . '</small>
                        <div class="imageuser">
                            <ul>
                                <li><img src="images/avatars/' . $reportsheet->avatar . '"> </li>
                            </ul>
                        </div>';
            })
            ->editColumn('reportsheet_classification', function ($reportsheet) {
                $classifications = $reportsheet->reportsheet_classification;
                $classification = explode(',', $classifications);
                $var = null;
                if (in_array(1, $classification)) {
                    $var .= '<span style="background-color:#3498DB" class="badge badge-pill">Accidente Seguridad</span><br>';
                }
                if (in_array(2, $classification)) {
                    $var .= '<span style="background-color:#2ECC71" class="badge badge-pill">Incidente Seguridad</span><br>';
                }
                if (in_array(3, $classification)) {
                    $var .= '<span style="background-color:#F24E4A" class="badge badge-pill">Acto Subestandar</span><br>';
                }
                if (in_array(4, $classification)) {
                    $var .= '<span style="background-color:#293F55" class="badge badge-pill">Accidente Ambiental</span><br>';
                }
                if (in_array(5, $classification)) {
                    $var .= '<span style="background-color:#9B59B6" class="badge badge-pill">Incidente Ambiental</span><br>';
                }
                if (in_array(6, $classification)) {
                    $var .= '<span style="background-color:#F39C12" class="badge badge-pill">Condición Subestandar</span>';
                }
                return $var;
            })
            ->editColumn('reportsheet_description', function ($reportsheet) {
                return '<p class="small text-muted">Creado ' . $reportsheet->created_at->diffForHumans() . '</p><p>' . str_limit($reportsheet->reportsheet_description, 78) . '</p>';
            })
            ->editColumn('reportsheet_correctiveaction', function ($reportsheet) {
                return '<p>' . str_limit($reportsheet->reportsheet_correctiveaction, 78) . '</p>';
            })
            ->editColumn('reportsheet_image', function ($reportsheet) {
                return '<div class="imageitem">
                            <ul>
                                <li><img src="images/reportsheets/thumbnail/' . $reportsheet->reportsheet_image . '"></li>
                            </ul>
                        </div>';
            })
            ->rawColumns(['action', 'created_at', 'user_username', 'reportsheet_classification', 'reportsheet_description', 'reportsheet_correctiveaction', 'reportsheet_image'])
            ->make(true);
    }

    public function all()
    {
        // view
        return view('reportsheet.all');
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
