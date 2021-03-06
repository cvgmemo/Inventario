<?php

namespace inventario\Http\Controllers\Auth;
use inventario\User;
use Validator;
use inventario\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    //login

    protected function getLogin()
    {
        return view("login");
    }


    public function postLogin(Request $request)
    {
        $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
        ]);



        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {

        $usuarioactual=\Auth::user();
        return view('home')->with("usuario",  $usuarioactual);
        }

        return "credenciales incorrectas";

    }


    //login

    //registro   


    protected function getRegister()
    {
        return view("registro");
    }

      

    protected function postRegister(Request $request)

    {
        $this->validate($request, [
        'nombres' => 'required',
        'apellidos' => 'required',
        'email' => 'required',
        'password' => 'required',
        ]);

        $data = $request;

        $user=new User;
        $user->nombres=$data['nombres'];
        $user->apellidos=$data['apellidos'];
        $user->email=$data['email'];
        $user->password=bcrypt($data['password']);


        if($user->save()){
         return "se ha registrado correctamente el usuario";               
        }
    }

    //registro

    protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

        return redirect ('login');
    }


    /**
    * OOJJJOOO
    * para que nadie mas se registre en el sistema 
    * es decir desabilitar la opcion de Register
    */
    public function showRegistrationForm()
    {
        return redirect('login');
    }
}
