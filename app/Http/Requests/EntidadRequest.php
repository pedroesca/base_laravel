<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntidadRequest extends FormRequest
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
            'nombre_entidad' => 'required',
            'rela_rubros' => 'not_in:0',
            'descripcion'=> 'required',
            'domicilio'=> 'required',
            'geo'=> 'required',
            'notas',
            'estado',
            'version',
            'fundacion',
            'historia',
            'activo',
            'logo',
            'portada',
            'pais',
            'provincia',
            'localidad',
            'tags',
        ];
    }

    public function messages()
    {
        return [
            'nombre_entidad.required' => 'Debes ingresar el nombre de la entidad.',
            'rela_rubros.not_in' => 'Debes seleccionar un rubro.',
            'descripcion.required' => 'Debes ingresar la descripcion de la entidad.',
            'domicilio.required' => 'Debes ingresar el domicilio de la entidad.',
            'geo.required' => 'Debes ingresar las coordenadas de ubicación de la entidad.',
        ];
    }
}
