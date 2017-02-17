<?php

namespace App\Http\Controllers;

use App\Reportsheet;
use App\TrackingReportSheet;
use App\Http\Requests\TrackingReportSheetCreateRequest;
use Carbon\Carbon;
use File;
use Intervention\Image\Facades\Image;

class TrackingReportSheetController extends Controller
{
    public function store(TrackingReportSheetCreateRequest $request)
    {
        if ($request->ajax()) {
            // update report sheet status
            $id = $request->input('reportsheet_id');
            $report_sheet = Reportsheet::find($id);
            $report_sheet->reportsheet_status = $request->input('tracking_report_sheet_status');
            $report_sheet->save();

            // save tracking
            $tracking = new TrackingReportSheet($request->all());
            $tracking->tracking_report_sheet_start_date = Carbon::createFromFormat('d/m/Y', $request->input('tracking_report_sheet_start_date'))->format('Y-m-d');
            $tracking->tracking_report_sheet_end_date = Carbon::createFromFormat('d/m/Y', $request->input('tracking_report_sheet_end_date'))->format('Y-m-d');

            // if exist image
            if ($request->hasFile('tracking_report_sheet_image')) {
                $image = $request->file('tracking_report_sheet_image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/images/trackingreportsheets/thumbnail/' . $filename));
                Image::make($image)->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/images/trackingreportsheets/700px/' . $filename));
                $tracking->tracking_report_sheet_image = $filename;
            }

            $tracking->user_id = auth()->user()->id;
            $tracking->save();

            // title for notification
            $title = 'Reporte N° #' . $id;

            // response
            return response()->json([
                'title' => $title,
                'message' => '¡Agregado correctamente!'
            ]);
        }
    }

    public function edit($id)
    {
        $tracking = TrackingReportSheet::where('reportsheet_id', $id)
            ->select(
                'id',
                'tracking_report_sheet_responsible',
                'tracking_report_sheet_status',
                'tracking_report_sheet_start_date',
                'tracking_report_sheet_end_date',
                'tracking_report_sheet_description',
                'reportsheet_id'
            )->get()
            ->first();

        return response()->json($tracking->toArray());
    }

    public function update(TrackingReportSheetCreateRequest $request, $id)
    {
        // report sheet save
        $reportID = $request->input('reportsheet_id');

        $reportSheet = Reportsheet::find($reportID);

        $reportSheet->reportsheet_status = $request->input('tracking_report_sheet_status');

        $reportSheet->save();

        // tracking save
        $tracking = TrackingReportSheet::find($id);

        $tracking_report_sheet_image = $tracking->tracking_report_sheet_image;

        $tracking->fill($request->all());

        $tracking->tracking_report_sheet_start_date = Carbon::createFromFormat('d/m/Y', $request->input('tracking_report_sheet_start_date'))->format('Y-m-d');
        $tracking->tracking_report_sheet_end_date = Carbon::createFromFormat('d/m/Y', $request->input('tracking_report_sheet_end_date'))->format('Y-m-d');

        // if exist image
        if ($request->hasFile('tracking_report_sheet_image')) {
            // delete
            $pathToImage1 = public_path('/images/trackingreportsheets/thumbnail/' . $tracking_report_sheet_image);
            $pathToImage2 = public_path('/images/trackingreportsheets/700px/' . $tracking_report_sheet_image);
            File::delete($pathToImage1, $pathToImage2);
            // update
            $image = $request->file('tracking_report_sheet_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/trackingreportsheets/thumbnail/' . $filename));
            Image::make($image)->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/trackingreportsheets/700px/' . $filename));
            $tracking->tracking_report_sheet_image = $filename;
        }

        $tracking->save();

        // title for notification
        $title = 'Reporte N° #' . $reportID;

        // response
        return response()->json([
            'title' => $title,
            'message' => '¡Actualizado correctamente!'
        ]);
    }
}
