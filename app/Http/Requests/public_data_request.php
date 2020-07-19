<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class public_data_request extends FormRequest
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
            'business_type_id' => 'required',
            'company_firm_name' => 'required',
            'contact_person_name' => 'nullable',
            'contact_person_number' => 'nullable',
            'owner_name' => 'nullable',
            'owner_contact_number' => 'nullable',
            'website' => 'nullable',
            'source' => 'required',
            'gst_number' => 'nullable',
            'remark' => 'nullable',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'district' => 'required',
            'pin_code' => 'required',
        ];
    }
}
