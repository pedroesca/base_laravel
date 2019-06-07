<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            'apellido' => 'required|max:255',
            'nombre' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'apellido.required' => 'El campo Apellido es OBLIGATORIO',
            'apellido.max' => 'Límite del campo APELLIDO ha sido sobrepasado',
            'nombre.required' => 'El campo Nombre es OBLIGATORIO',
            'nombre.max' => 'Límite de caracteres del campo NOMBRE ha sobrepasado',

        ];
    }
}
