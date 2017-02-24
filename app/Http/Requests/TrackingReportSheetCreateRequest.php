<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackingReportSheetCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reportsheet_id' => 'required',
            'tracking_report_sheet_responsible' => 'required',
            'tracking_report_sheet_status' => 'required',
            'tracking_report_sheet_start_date' => 'required|date_format:d/m/Y',
            'tracking_report_sheet_end_date' => 'required|date_format:d/m/Y|after:tracking_report_sheet_start_date',
            'tracking_report_sheet_description' => 'required|min:10',
            'tracking_report_sheet_image' => 'mimes:jpeg,jpg,bmp,png',
            'tracking_report_sheet_file' => 'mimes:pdf',
        ];
    }
}
