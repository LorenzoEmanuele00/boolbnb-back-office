<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'            => ['required', 'min:5', 'max:150', 'unique:apartments'],
            'price'            => ['required', 'numeric', 'decimal:0, 2', 'digits_between:1, 8'],
            'address'          => ['required'],
            'dimension_mq'     => ['required', 'numeric'],
            'rooms_number'     => ['required', 'numeric'],
            'beds_number'      => ['required', 'numeric'],
            'bathrooms_number' => ['required', 'numeric'],
            'is_visible'       => ['required']
        ];
    }
}
