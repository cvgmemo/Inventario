<?php

namespace inventario\Http\Controllers;

use Illuminate\Http\Request;

use inventario\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use inventario\Http\Requests\ArticuloFormRequest;
use inventario\Articulo;
use DB;

class ArticuloController extends Controller
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
    		$articulos=DB::table('inventario as a')
    		->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->join('dependencias as d','a.id_dependencia','=','d.id_dependencia')
    		->select('a.idarticulo','c.nombre as categoria','a.marca','a.modelo','a.serial','a.bien_nac','a.id_dependencia','d.dependencia as dependencia','a.imagen')
    		->where('a.serial','LIKE','%'.$query.'%')
            ->orwhere('a.marca','LIKE','%'.$query.'%')
            ->orderBy('a.idarticulo','desc')
            ->paginate(7);
    		return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
    	}
    }

    public function create()
    {
        $dependencias=DB::table('dependencias')->where('dependencia','=','Almacen')->get(); 
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();   /* Para verlos despues en un combo box */
    	return view("almacen.articulo.create",["categorias"=>$categorias,"dependencias"=>$dependencias]);
    }

    public function store(ArticuloFormRequest $request)
    {
    	$articulo=new Articulo;
    	$articulo->idcategoria=$request->get('idcategoria');
    	$articulo->modelo=$request->get('modelo');
    	$articulo->marca=$request->get('marca');
    	$articulo->serial=$request->get('serial');
        $articulo->bien_nac=$request->get('bien_nac');
        $articulo->status='Activo';
        $articulo->id_dependencia=$request->get('id_dependencia');
        $articulo->nombre_equipo='';
        $articulo->id_etrabajo='0';
        $articulo->observacion='';
        /* Para validar la Imagen que se va a grabar */
        if (Input::hasFile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }
    	$articulo->save();
    	return Redirect::to('almacen/articulo');
    }
    public function show($id)
    {
    	return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$articulo=Articulo::findOrFail($id);
        $dependencias=DB::table('dependencias')->where('dependencia','=','Almacen')->get();
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();   /* Para verlos despues en un combo box */
    	return view("almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias,"dependencias"=>$dependencias]);
    }
    public function update(ArticuloFormRequest $request,$id)
    {
    	$articulo=Articulo::findOrFail($id);
    	$articulo->idcategoria=$request->get('idcategoria');
    	$articulo->modelo=$request->get('modelo');
        $articulo->marca=$request->get('marca');
        $articulo->serial=$request->get('serial');
        $articulo->bien_nac=$request->get('bien_nac');
        $articulo->status='Activo';
        $articulo->id_dependencia=$request->get('id_dependencia');
        $articulo->nombre_equipo='';
        $articulo->id_etrabajo='0';
        $articulo->observacion='';
        /* Para validar la Imagen que se va a grabar */
        if (Input::hasFile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }

    	$articulo->update();
    	return Redirect::to('almacen/articulo');
    }
    
    public function destroy($id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->status='Inactivo';
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }
}
