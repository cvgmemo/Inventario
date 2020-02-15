<?php

namespace inventario\Http\Controllers;

use Illuminate\Http\Request;

use inventario\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use inventario\Http\Requests\DependenciaFormRequest;
use inventario\Dependencia;
use DB;

class DependenciaController extends Controller
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
    		$dependencias=DB::table('dependencias as d')
    		->join('materia as m','d.id_materia','=','m.id_materia')
    		->select('d.id_dependencia','d.dependencia','m.area_materia as materia')
    		->where('d.dependencia','LIKE','%'.$query.'%')
            ->orderBy('d.id_dependencia','desc')
            ->paginate(7);
    		return view('dependencia.dependencia.index',["dependencias"=>$dependencias,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	$materias=DB::table('materia')->get();   /* Para verlos despues en un combo box */
    	return view("dependencia.dependencia.create",["materias"=>$materias]);
    }

    public function store(DependenciaFormRequest $request)
    {
    	$dependencia=new Dependencia;
    	$dependencia->id_materia=$request->get('id_materia');
    	$dependencia->dependencia=$request->get('dependencia');
    	$dependencia->save();
    	return Redirect::to('dependencia/dependencia');
    }
    public function show($id)
    {
    	return view("dependencia.dependencia.show",["dependencia"=>Dependencia::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$dependencia=Dependencia::findOrFail($id);
    	$materias=DB::table('materia')->get();   /* Para verlos despues en un combo box */
    	return view("dependencia.dependencia.edit",["dependencia"=>$dependencia,"materias"=>$materias]);
    }
    public function update(DependenciaFormRequest $request,$id)
    {
    	$dependencia=Dependencia::findOrFail($id);
    	$dependencia->id_materia=$request->get('id_materia');
    	$dependencia->dependencia=$request->get('dependencia');

    	$dependencia->update();
    	return Redirect::to('dependencia/dependencia');
    }
    
    public function destroy($id)
    {
        $dependencia=Dependencia::findOrFail($id);
        $dependencia->cantidad=0;
        $dependencia->update();
        return Redirect::to('dependencia/dependencia');
    }
}
