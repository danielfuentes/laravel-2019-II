<?php

namespace App\Http\Middleware;

use Closure;

class Administrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Este es el middleware que desarrolle para controlar el acceso al administrador  -- luego de ejecutar comado php artisan make:middleware  
        if($request->user()->role !=9){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
