@extends('layouts.app')
@section('content')
    <h2 class="text-center">Agregar Película</h2>
    <div class="container-fluid">
        <div class="row mt-5">
        <div class="col-lg-8 offset-lg-2">
            <form action="" method="post" enctype="multipart/formdata">
                <div class="form-group">
                    <label for="nombrePelicula">Nombre</label>
                    <input type="text" class="form-control" name="title" id="nombrePelicula">
                </div>
                <div class="form-group">
                    <label for="ratingPelicula">Rating</label>
                    <input type="number" class="form-control" name="rating" id="ratingPelicula">
                </div>
                <div class="form-group">
                    <label for="awards">Awards</label>
                    <input type="number" class="form-control" name="awards" id="awards">
                </div>
                <div class="form-group">
                    <label for="release-date">Release Date</label>
                    <input type="date" class="form-control" name="release_date" id="release-date">
                </div>
                <div class="form-group">
                    <label for="duracionPelicula">Duración</label>
                    <input type="number" class="form-control" name="length" id="duracionPelicula">
                </div>
                <div class="form-group">
                    <label for="generos">Género de la Película</label>
                    <select class="form-control" name="genre_id" id="generos">
                    </select>        
                </div>
                
                <button type="submit" class="btn btn-primary">Registrar Película</button>
            </form>
            
        </div>
    </div>
    </div>
@endsection

