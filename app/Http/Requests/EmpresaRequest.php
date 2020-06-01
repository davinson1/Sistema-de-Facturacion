<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
          'id_tipo_tributario' => 'required|numeric',
          'id_municipio' => 'required|numeric',
          'nombre' => 'required|min:3|max:100|unique:empresa,nombre|regex:/^[\pL\s\-]+$/u',
          'numero' => 'required|numeric',
          'direccion' => 'required|min:3',
          'telefono' => 'required|numeric',
          'celular' => 'required|numeric',
          'nombre_jefe' => 'required|min:3|max:100|regex:/^[\pL\s\-]+$/u',
          'celular_jefe' => 'required|numeric',
          'fecha_creacion' => 'required|date',
          'descripcion' => 'required',
        ];
    }
}
