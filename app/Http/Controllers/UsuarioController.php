<?php

namespace inventario\Http\Controllers;

use Illuminate\Http\Request;

use inventario\Http\Requests;

use inventario\Http\Requests\UsuarioFormRequest;
use inventario\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
/* para usar funciones de Base de Datos */
use DB;

class UsuarioController extends Controller
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
    		$usuarios=DB::table('users as u')
            ->join('tipos_usuario as t','u.tipousuario','=','t.id')
            ->select('u.id','u.nombres','u.apellidos','u.usuario','u.email','t.nombre as tipousuario')
    		->where('nombres','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
    		return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
    	}
    }
    public function create()
    {
        $tipousuario=DB::table('tipos_usuario')->get();   /* Para verlos despues en un combo box */
    	return view("seguridad.usuario.create",["tipousuario"=>$tipousuario]);
    }
    public function store(UsuarioFormRequest $request)
    {
    	$usuario=new User;
    	$usuario->nombres=$request->get('nombres');
        $usuario->apellidos=$request->get('apellidos');
        $usuario->usuario=$request->get('usuario');
        $usuario->tipousuario=$request->get('tipousuario');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
                /* Para validar la Imagen que se va a grabar */
        if (Input::hasFile('imagenurl')){
            $file=Input::file('imagenurl');
            $file->move(public_path().'/imagenes/',$file->getClientOriginalName());
            $articulo->imagenurl=$file->getClientOriginalName();
        }
    	$usuario->save();
    	return Redirect::to('seguridad/usuario');
    }
    public function edit($id)
    {
        $usuario=User::findOrFail($id);
        $tipousuario=DB::table('tipos_usuario')->get();   /* Para verlos despues en un combo box */
    	return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id),"tipousuario"=>$tipousuario]);
    }
    public function update(UsuarioFormRequest $request,$id)
    {
    	$usuario=User::findOrFail($id);
    	$usuario->nombres=$request->get('nombres');
        $usuario->apellidos=$request->get('apellidos');
        $usuario->usuario=$request->get('usuario');
        $usuario->tipousuario=$request->get('tipousuario');
        $usuario->email=$request->get('email');;
        $usuario->password=bcrypt($request->get('password'));
        /* Para validar la Imagen que se va a grabar */
        if (Input::hasFile('imagenurl')){
            $file=Input::file('imagenurl');
            $file->move(public_path().'/imagenes/',$file->getClientOriginalName());
            $articulo->imagenurl=$file->getClientOriginalName();
        }        
    	$usuario->update();
    	return Redirect::to('seguridad/usuario');
    }
    
    public function destroy($id)
    {
        $usuario=DB::table('users')->where('id','=',$id)->delete();
        return Redirect::to('seguridad/usuario');
    }
}
