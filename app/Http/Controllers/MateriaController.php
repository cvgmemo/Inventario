<?php

namespace inventario\Http\Controllers;

use Illuminate\Http\Request;

use inventario\Http\Requests;
use inventario\Materia;  /* Hace referencia al modelo */
use Illuminate\Support\Facades\Redirect;
use inventario\Http\Requests\MateriaFormRequest;  /* Hace referencia al request */
use DB;   /* Para trabajar con la clase DB de LARAVEL */

class MateriaController extends Controller
{
    public function __construct()
    {
        /* para que nadie entre directamente a una pagina sin logearse */
        $this->middleware('auth');        
    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$materias=DB::table('materia')->where('area_materia','LIKE','%'.$query.'%')
            ->orderBy('id_materia','asc')
            ->paginate(7);
    		return view('dependencia.materia.index',["materias"=>$materias,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	return view("dependencia.materia.create");
    }

    public function store(MateriaFormRequest $request)
    {
    	$materia=new Materia;
    	$materia->area_materia=$request->get('area_materia');
        $materia->descripcion=$request->get('descripcion');
    	$materia->save();
    	return Redirect::to('dependencia/materia');
    }
    public function show($id)
    {
    	return view("dependencia.materia.show",["materia"=>Materia::findOrFail($id)]);
    }
    public function edit($id)
    {
    	return view("dependencia.materia.edit",["materia"=>Materia::findOrFail($id)]);
    }
    public function update(MateriaFormRequest $request,$id)
    {
    	$materia=Materia::findOrFail($id);
    	$materia->area_materia=$request->get('area_materia');
        $materia->descripcion=$request->get('descripcion');
    	$materia->update();
    	return Redirect::to('dependencia/materia');
    }
    
    public function destroy($id)
    {
        $materia=Materia::findOrFail($id);
        $materia->condicion='0';
        $materia->update();
        return Redirect::to('dependencia/materia');
    }    

}
