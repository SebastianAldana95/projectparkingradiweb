<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVehicleRequest extends FormRequest
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
            'plate' => 'required',
            'brand' => 'required',
            'type_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'plate.required' => 'El campo placa es obligatorio.',
            'brand.required' => 'El campo marca es obligatorio.',
            'type_id.required' => 'El campo tipo de vehiculo es obligatorio.',
        ];
    }
}
