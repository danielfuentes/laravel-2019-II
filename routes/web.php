<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Esta es la ruta por defecto que trae laravel, ustedes la pueden borrar y crear la que deseen
//Route::get('/','HomeController@index');


Route::get('/', function () {
    return view('welcome');
});


//Esta ruta es creada automaticamente por laravel luego de hacer lo referido a la autenticación
// 1.- Deben instalar en sus equipos NODEJS
// 2.- Ejecutar el comando: composer requiere laravel/ui
// 3.- Ejecutar el comando: php artisan ui vue --auth
// 4.- Ejecutar el comando: npm install
// 5.- Ejecutar el comando npm run dev
//-------------
Auth::routes();
//-------------

Route::get('/home', 'HomeController@index')->name('home');

//Rutas para el  Administrador - Películas -

//Esta la creamos en la clase, muestra todas las películas de nuestra Base de Datos
Route::get('/administrarPelicula','AdministrarPeliculasController@index')->name('administrarPelicula');
//Estas rutas las cree para adelantar el trabajo en la clase---

//Ruta para agregar Pelicula
Route::get('/agregarPelicula','AdministrarPeliculasController@create');
//Aquí debemos crear ruta por POST para guardar la película metodo: save
Route::post('/guardarPelicula','AdministrarPeliculasController@save');
//Ruta para ver el detalle de la Película
Route::get('/detallePelicula/{id}','AdministrarPeliculasController@show');
//Ruta para Editar Películas
//Route::get('/editarPelicula','AdministrarPeliculasController@edit');
//Aquí debemos crear la ruta para guardar los cambios método update

//Ruta para buscar películas
//Route::get('/buscarPelicula','AdministrarPeliculasController@search');

