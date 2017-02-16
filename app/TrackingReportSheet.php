<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingReportSheet extends Model
{
    //
    protected $fillable = [
        'tracking_report_sheet_responsible',
        'tracking_report_sheet_status',
        'tracking_report_sheet_start_date',
        'tracking_report_sheet_end_date',
        'tracking_report_sheet_description',
        'reportsheet_id',
        'user_id'
    ];
}
