<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
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
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'street_address_1' => 'required|string',
            'street_address_2' => 'required|string',
            'city' => 'required|string',
            'county' => 'required|string',
            'post_code' => 'required|string',
            'countries' => 'required|string',
            'adult_number' => 'required|numeric',
            'children_number' => 'required|numeric',
            'occupant_names' => 'required|string',
            'deposit' => 'required|numeric',
            'paid' => 'required|numeric',
            'contract_length' => 'required|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:tenant',
            'property' => 'nullable|string',
            'moved_in_date' => 'required|string',
            'payment_date' => 'required|string',
            'next_of_kin_full_name' => 'required|string',
            'next_of_kin_email' => 'required|email|unique:tenant',
            'next_of_kin_phone' => 'required|numeric',
        ];
        $photos = count($this->input('tenant_image'));
        foreach (range(0, $photos) as $photo) {
            $rules['tenant_image.'.$photo] = 'required|image|mimes:jpeg,bmp,png|max:2000';
        }
        $files = count($this->input('supporting_files'));
        foreach(range(0, $files) as $file) {
            $rules['supporting_files.'.$file] = 'required|mimes:doc,pdf,docx,zip|max:2000';
        }
        return $rules;
    }
}
