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


//Route::get('/', function () {
//    return view('home');
//});

//Esta ruta la cambie para poder trabajarlo de forma organizada, envío al controlador y de allí me comunico con el modelo y luego envio datos a la vista
Route::get('/','AdministrarPeliculasController@indexHome');

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

//Ojo, estos una manera de crear grupos de rutas filtradas pun middleware
//Route::middleware('admin')->group(function(){

//});


Route::get('/administrarPelicula','AdministrarPeliculasController@index')->name('administrarPelicula')->middleware('admin');
//Estas rutas las cree para adelantar el trabajo en la clase---

//Ruta para agregar Pelicula
Route::get('/agregarPelicula','AdministrarPeliculasController@create');
//Aquí debemos crear ruta por POST para guardar la película metodo: save
Route::post('/guardarPelicula','AdministrarPeliculasController@save');
//Ruta para ver el detalle de la Película
Route::get('/detallePelicula/{id}','AdministrarPeliculasController@show')->middleware('auth');
//Ruta para Editar Películas
Route::get('/editarPelicula/{id}','AdministrarPeliculasController@edit');
//Ruta para guardar los cambios método update
Route::post('/guardarPeliculaEditada/{id}', 'AdministrarPeliculasController@update');

//Ruta para buscar películas
Route::get('/buscarPelicula','AdministrarPeliculasController@search');
//Ruta para eliminar una película 
Route::get('/eliminarPelicula/{id}','AdministrarPeliculasController@delete');


//Rutas donde controlo lo de mis películas Favoritas, simulo como un carrito de compras

//Ruta para agregar peliculas favoritas, aquí me estoy valiendo del middleware auth que me ofrece Laravel de forma tal que si el usuario no está registrado, no podrá agregar películas a favoritas
Route::get('/peliculasFavoritas/{id}','AdministrarPeliculasController@addFavoritas')->middleware('auth');

//Elimino alguna de mis peliculas favoritas, simulo eliminar productos seleccionados de mi carrito de compras 
Route::get('/peliculasFavoritas/remove/{id}', "AdministrarPeliculasController@removeFavortita")->middleware('auth');

//Muestro lo que tengo en mis películas Favoritas - Aquí simulo mostrar lo que tengo en mi carrito de compras
Route::get('/peliculasFavoritas', 'AdministrarPeliculasController@showFavoritas')->name('favoritas')->middleware('auth');



//--------------------------------- AYUDA - CULTURA GENERAL LARAVEL -----------------------------
//Ayuda para mis alunos y para todo aquel que chequee mi repositorio
// Esto es sólo para que sepan que los llamados a las rutas existen otras formas de hacerlas
//Rutas declaradas en base a un prefijo: Significa que todas las rutas de ese grupo van a tener asignadas el mismo prefijo y para poder llamarlas deben anteponer el mismo
//Route::prefix('admin')->middleware('admin')->group(funtion(){
    //Aquí deben colocar todas las rutas que desen 
    //Route::get('/buscarPelicula','AdministrarPeliculasController@search');
    //Route::get('/editarPelicula','AdministrarPeliculasController@edit');
//});

//Forma de llamar las rutas,  filtradas por un middleware

//Route::get('perfil','PaginaController@perfil)->middleware('admin);


//Otra forma de llamar las rutas, llamadas en grupo y ademas filtradas por un middleware
//Route::middleware('auth')->group(function(){
// Route::get('/detallePelicula/{id}','AdministrarPeliculasController@show');    
//Route::get('/buscarPelicula','AdministrarPeliculasController@search');
//Route::get('/editarPelicula','AdministrarPeliculasController@edit');

//});
