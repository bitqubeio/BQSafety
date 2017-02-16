<?php

namespace App\Http\Controllers;

use App\Reportsheet;
use App\TrackingReportSheet;
use App\Http\Requests\TrackingReportSheetCreateRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrackingReportSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
