<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
          'tipoDocumento'     => 'required',
          'municipio'         => 'required',
          'nombreUsusario'    => 'required|min:3|max:100',
          'apellidoUsusario'  => 'required|min:3|max:100',
          'documentoUsusario' => 'required|min:6|unique:users,numero_documento|numeric',
          'emailUsusario'     => 'required|unique:users,email',
          'fotoUsuario'       => 'image',
          'copiaDocumento'    => 'mimes:pdf',
          'claveUsusario'     => 'required|min:8|string'
        ];
    }
}
