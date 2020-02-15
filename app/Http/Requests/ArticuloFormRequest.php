<?php

namespace inventario\Http\Requests;

use inventario\Http\Requests\Request;

class ArticuloFormRequest extends Request
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
            'idcategoria'=>'required',
            'modelo'=>'required|max:45',
            'marca'=>'required|max:45',
            'serial'=>'max:45',
            'bien_nac'=>'max:45',
            'imagen'=>'mimes:jpeg,bmp,png',
            'status'=>'max:45',
            'id_dependencia'=>'max:11',
            'nombre_equipo'=>'max:45',
            'id_etrabajo'=>'max:11',
            'observacion'=>'max:50',
        ];
    }
}
