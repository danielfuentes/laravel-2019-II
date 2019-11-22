<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use App\Actor;

class AdministrarPeliculasController extends Controller
{
    //Método creado para mostrar todos las películas en mi vista home
    public function indexHome(){
        $peliculas = Movie::all();
        return view('home')->with('peliculas',$peliculas);
    }


    //Método creado para mostrar todos las películas de mi tabla movies
    public function index(){
        $peliculas = Movie::paginate(10);
        return view('movies.listadoPeliculas')->with('peliculas',$peliculas);
    }
    //Método para invocar al formulario de Agregar Película, el mismo viaja por el método get
    public function create(){
        $generos = Genre::all();
        return view('movies.agregarPelicula')->with('generos',$generos);
    }
    //Método para guardar la película
    public function save(Request $request){
        
        $reglas = [
            'title'=> 'required',
            'rating' => 'required|numeric',
            'awards' => 'required|numeric',
            'release_date' => 'date',
            'length' => 'required|numeric',
            'poster' => 'required | image'
        ];
        $mensajes = [
            'title.required' => 'Este campo :attribute es requerido...',
            'required' => 'Este campo :attribute es requerido...',
            'numeric' => 'Ingrese en este campo :attribute sólo números...',
            'date' => 'Debe indicar una fecha...'
        ];
        

        $this->validate($request,$reglas,$mensajes);
        $pelicula = new Movie($request->all());
		// Obtengo el archivo que viene en el formulario (Objeto de Laravel) que tiene a su vez el archivo de la imagen
		$imagen = $request->file('poster'); // El value del atributo name del input file

		if ($imagen) {
			// Armo un nombre único para este archivo
			$imagenFinal = uniqid("img_") . "." . $imagen->extension();

			// Subo el archivo en la carpeta elegida
			$imagen->storePubliclyAs("public/posters", $imagenFinal);

			// Le asigno la imagen a la película que guardamos
			$pelicula->poster = $imagenFinal;
		}

        $pelicula->save();
        return  redirect('/administrarPelicula');
    }
        //Amigas y amigos, Todo lo que está en comentarios es otra forma que pueden encontrar para efectuar la validación de los datos y luego la incorporación de los mismos a la base de datos.
		/*$request->validate([
			// input_name => reglas,
			'title' => 'required | max:15',
			'rating' => 'required | numeric | min:0 | max:10',
			'awards' => 'required | numeric',
			'release_date' => 'required|date',
			'length' => 'required | numeric',
			'genre_id' => 'required'

		], [
			// input_name.rule => message
			'title.required' => 'El campo título es obligatorio',
			// 'rating.required' => 'El campo rating es obligatorio',
			'required' => 'El campo :attribute es obligatorio',
			'numeric' => 'El campo :attribute debe ser numérico',
			'title.max' => 'El :attribute debe contener máximo 15 carácteres',
			'rating.min' => 'El mínimo permitido es 0',
			'rating.max' => 'El máximo permitido es 10'
		]);

		// Guardo la película en la Base de Datos para ello creo un objeto de mi módelo, en este caso Mobie
		$movie = new Movie; // Objeto de tipo Movie Vacio

		// Ahora le incorporo cada atributo el valor indicado por el usuario
		$movie->title = $request->input('title');
		$movie->rating = $request->input('rating');
		$movie->awards = $request->input('awards');
		$movie->release_date = $request->input('release_date');
		$movie->length = $request->input('length');
		$movie->genre_id = $request->input('genre_id');
		$movie->save();
		// 3. Redireccionamos al usuario a una ruta
		return redirect('/administrarPelicula');*/
	
        

        //Esto que les dejo en comentarios es otra forma de programar el método show, para buscar y devolver los detalles de un elemento de mi tabla en la Base de Datos - ersto lo programo Uriel        
        //public function show(Movie $id){
        //Aquí pueden hacer un dd(), para ver que trae el id    
        //dd($id);
        //$pelicula = Movie::find($id);
        //return view('movies.detallePelicula')->with('pelicula',$id);
        //}    
    
    //Función que busca el detalle de un registro en la Base de Datos        
    public function show($id){
        //dd($id);
        $pelicula = Movie::find($id);
        
        //dd($pelicula->genre->name);
        return view('movies.detallePelicula')->with('pelicula',$pelicula);
    }
    //Aquí dispongo el método para mi buscador
    public function search(Request $request){
        //dd($request);
        $buscar = $request->busqueda;
        //dd($buscar);
        $peliculas = Movie::where('title','like','%'.$buscar.'%')->paginate(10);
        return view('movies.listadoPeliculas')->with('peliculas',$peliculas);

        //$vac = compact('peliculas',$peliculas);
        //return view('listadoPeliculas',compact('peliculas','otrosDatos','masDatos'));
        //Otras formas de enviar datos a la vista
        //return view('listadoPeliculas')->with(['peliculas' => $peliculas], ['otrosDatos' => $otrosDatos]);

        //return view('listadoPeliculas')->with('peliculas',$peliculas)
                                      // ->with('mensaje','Los datos fueron encontrados...') ;

    }
    public function delete($id){
      $pelicula =  Movie::find($id);
      $pelicula->delete();
      return redirect('administrarPelicula');

    }


    //Aquí les dejo una de las tantas formas que podemos usar para editar registros de nuestras tablas

    //Primero creo el método para mostrar mi formulario de Películas, teniendo en cuenta que también debo pasarle el genero que ya posee
	public function edit($id)
	{
		// Busco la Pelicula que seleccionó el usuario de la lista
		$peliculaEditar = Movie::find($id);

        // Busco los géneros
        //-----------------
        //Si los quisiera enviar a la vista de una vez ordenados,puedo hacer
        //$genres = Genre::orderBy('name')->get();
        //-----------------
        $generos = Genre::all();
        $generoEditado = Genre::find($peliculaEditar->genre_id);
        
        return view('movies.editarPelicula', compact('peliculaEditar', 'generos','generoEditado'));
        
        //Otra forma de enviar varios resultados a la vista
        //-------------------------
        //return view('movies.editarPelicula')->with(['peliculaEditar' => $PeliculaEditar]),['generos' => $generos ]);

	}

    public function update(Request $request, $id){
        
	
		$peliculaEditar = Movie::find($id);
        
		$peliculaEditar->title = $request->input('title');
		$peliculaEditar->rating = $request->input('rating');
		$peliculaEditar->awards = $request->input('awards');
		$peliculaEditar->release_date = $request->input('release_date');
		$peliculaEditar->length = $request->input('length');
		$peliculaEditar->genre_id = $request->input('genre_id');
        //dd($peliculaEditar);

        //Aquí guardo mis datos tal como el usuario los modifico
		$peliculaEditar->save();

		// Redireccionamos a una RUTA
		return redirect('/administrarPelicula');
    }
    
    public function addFavoritas($id){
        $peliculaFavorita = Movie::find($id);
        //dd($peliculaFavorita['title']);
        $misPeliculas = [
           'id' => $peliculaFavorita['id'],
           'title' => $peliculaFavorita['title'],
           'rating' => $peliculaFavorita['rating'],
           'awards' => $peliculaFavorita['awards'],
            'poster' => $peliculaFavorita['poster']
        ];
        session()->put('favoritas.'.$id,$misPeliculas);
        return view('movies.misPeliculasFavoritas');

    }
   
}
