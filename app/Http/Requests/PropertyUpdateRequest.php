<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyUpdateRequest extends FormRequest
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
            'property_name' => 'required|string',//
            'street_address_1' => 'string|nullable',
            'street_address_2' => 'string|nullable',
            'country' => 'required|string',//
            'city' => 'required|string',//
            'county' => 'string|nullable',
            'property_type' => 'required|string',//
            'post_code' => 'string|nullable',
            'description' => 'max:512|string|nullable',
            'rent_price' => 'required|numeric',//
            'property_deposit' => 'required|numeric',//
            'bedrooms' => 'required|numeric',//
            'year_built' => 'required|numeric',//
        ];
        $photos = count($this->input('photos'));
        foreach(range(0, $photos) as $photo) {
            $rules['photos.'. $photo] = 'image|mimes:jpeg,bmp,png|max:2000';
        }
        $files = count($this->input('property_files'));
        foreach(range(0, $files) as $file) {
            $rules['property_files.'. $file] = 'mimes:doc,pdf,docx,zip|max:2000';
        }
        return $rules;
    }
}
