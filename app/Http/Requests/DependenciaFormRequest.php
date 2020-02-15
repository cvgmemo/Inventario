<?php

namespace inventario\Http\Requests;

use inventario\Http\Requests\Request;

class DependenciaFormRequest extends Request
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
            'dependencia'=>'required|max:256',
            'id_materia'=>'required',
            'cantidad'
        ];
    }
}
