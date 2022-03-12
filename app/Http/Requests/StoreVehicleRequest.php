<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
            'plate' => 'required|unique:vehicles|min:5',
            'brand' => 'required',
            'type_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'document' => 'required|numeric|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'plate.required' => 'El campo placa es obligatorio.',
            'brand.required' => 'El campo marca es obligatorio.',
            'type.required' => 'El campo tipo de vehiculo es obligatorio.',
            'document.required' => 'El campo cedula es obligatorio'
        ];
    }
}
