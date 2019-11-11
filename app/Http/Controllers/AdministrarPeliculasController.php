<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;

class AdministrarPeliculasController extends Controller
{
    public function index(){
        $peliculas = Movie::paginate(10);
        return view('movies.listadoPeliculas')->with('peliculas',$peliculas);
    }
    public function create(){
        $generos = Genre::all();
        return view('movies.agregarPelicula')->with('generos',$generos);
    }
    public function save(Request $request){
        $reglas = [
            'title'=> 'required',
            'rating' => 'required|numeric',
            'awards' => 'required|numeric',
            'release_date' => 'date',
            'length' => 'required|numeric'
        ];
        $mensajes = [
            'title.required' => 'Este campo :attribute es requerido...',
            'required' => 'Este campo :attribute es requerido...',
            'numeric' => 'Ingrese en este campo :attribute sólo números...',
            'date' => 'Debe indicar una fecha...'
        ];

        $this->validate($request,$reglas,$mensajes);
        $pelicula = new Movie($request->all());
        $pelicula->save();
        return  redirect('/administrarPelicula');
    }
    public function show(Movie $id){
        //dd($id);
        //$pelicula = Movie::find($id);
        return view('movies.detallePelicula')->with('pelicula',$id);
    }

}
