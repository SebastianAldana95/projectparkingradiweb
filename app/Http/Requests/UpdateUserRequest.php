<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'document' => 'required',
            'email' => 'required',
            Rule::unique('users')->ignore($this->route('user')->id),
        ];

        if (empty($this->get('password'))) {
            $this->except('password');
        } elseif ($this->filled('password')) {
            $rules['password'] = 'confirmed|min:8';
        }

        if ($this->filled('plate')|$this->filled('brand')|$this->filled('type_id'))
        {
            $rules['plate'] = 'required|unique:vehicles|min:5';
            $rules['brand'] = 'required';
            $rules['type_id'] = 'required';
        }

        return $rules;
    }
}
