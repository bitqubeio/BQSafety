<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class TrackingReportSheet extends Model
{
    //
    use DatesTranslator;

    protected $fillable = [
        'tracking_report_sheet_responsible',
        'tracking_report_sheet_status',
        'tracking_report_sheet_start_date',
        'tracking_report_sheet_end_date',
        'tracking_report_sheet_description',
        'tracking_report_sheet_image',
        'tracking_report_sheet_file',
        'reportsheet_id',
        'user_id'
    ];
}
