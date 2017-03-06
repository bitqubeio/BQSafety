<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportsheetCreateRequest extends FormRequest
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
            'location_id' => 'required',
            'reportsheet_datetime' => 'required|date_format:d/m/Y H:i',
            'reportsheet_classification' => 'required',
            'reportsheet_description' => 'required|max:500',
            'reportsheet_correctiveaction' => 'max:500',
            'reportsheet_image' => 'image|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
