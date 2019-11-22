<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
    
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //Si desean que el avatar sea obligatorio subirlo en el registro
            // 'avatar' => ['required', 'image'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //Este es una nueva forma de guardar la imagen
        //Si el usuario no selecciona el archivo ya yo tengo uno por defecto
        $nombreArchivo = 'user_default.jpg';
        //Aquí les dejo una forma de guardar la imagen
        $request = request();
        //dd($request);
        $imagen = $request->file('avatar');
        //dd($imagen);
        //Aquí atrapo creo el nombre de mi archivo con uniqid() y dispongo la extensión con la función extension()
        $nombreArchivo = uniqid('img-') . '.' . $imagen->extension();
        //Aquí guardo la imagen en el servidor carpeta store/public/avatars
        $imagen->storePubliclyAs("public/avatars", $nombreArchivo);
        
        //--------------------------------------------------
        //Anteriormente como se hacia el mismo código Versión de Laravel 5.5
            //dd($data);
           // $nombreArchivo = 'user_default.jpg';
           //debemos tener en cuenta que si hay un archivo, lo subimos y le guardamos la ruta
           //if(isset($data['avatar'])){
           //Al archivo que el usuario seleccione lo voy a guardar en el filesystem de laravel     
           //$rutaArchivo = $data['avatar']->store('public/avatars');
           //Aquí es donde logro atrapar el nombre del archivo usando la función de PHP basename
           //$nombreArchivo = basename($rutaArchivo);
          //}
        //--------------------------------------------------
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $nombreArchivo,
            'role' => 1,
        ]);
    }
}
