<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class AdministrarPeliculasController extends Controller
{
    public function index(){
        $peliculas = Movie::all();
        return view('movies.listadoPeliculas')->with('peliculas',$peliculas);
    }
}
