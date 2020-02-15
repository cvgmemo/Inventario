<?php

namespace inventario\Http\Requests;

use inventario\Http\Requests\Request;

class UsuarioFormRequest extends Request
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
            'nombres' => 'required|max:60',
            'apellidos' => 'required|max:60',
            'usuario' => 'required|max:60',
            'tipousuario' => 'required|max:11',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'imagenurl'=>'mimes:jpeg,bmp,png'
        ];
    }
}
