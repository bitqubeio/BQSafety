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
            'reportsheet_classification' => 'required',
            'reportsheet_description' => 'required|max:250',
            'reportsheet_correctiveaction' => 'max:250',
            'reportsheet_image' => 'image|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
