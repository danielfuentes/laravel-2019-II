@extends('layouts.app')
@section('content')
<h2 class="text-center">Editar Película</h2>
<div class="container-fluid">
<div class="row mt-5">
     <div class="col-lg-8 offset-lg-2">
     <!--Aquí colocar los errores tal como se mostraron en el programa de agragarPelicula.php-->
         <form action="" method="post" enctype="multipart/formdata">
             <div class="form-group">
                 <label for="nombrePelicula">Nombre</label>
                 <input type="text" class="form-control" name="title" id="nombrePelicula" value="">
             </div>
             <div class="form-group">
                 <label for="ratingPelicula">Rating</label>
                 <input type="number" class="form-control" name="rating" id="ratingPelicula" value="">
             </div>
             <div class="form-group">
                 <label for="awards">Awards</label>
                 <input type="number" class="form-control" name="awards" id="awards" value="">
             </div>
             <div class="form-group">
                 <label for="release-date">Release Date</label>
                 <input type="date" class="form-control" name="release_date" id="release-date" value="">
                 <?php
                 /*Atentos Aquí pueden encontrar ayuda:
                 https://www.php.net/manual/es/function.date.php
                 https://www.php.net/manual/es/function.strtotime.php
                 */
                 ?>
             </div>
             <div class="form-group">
                 <label for="duracionPelicula">Duración</label>
                 <input type="number" class="form-control" name="length" id="duracionPelicula" value="">
             </div>
             <div class="form-group">
                 <label for="generos">Género de la Película</label>
                 <select class="form-control" name="genre_id" id="generos">
                   <option value=""></option>
                   
                 </select>
             </div>
             <button type="submit" class="btn btn-primary">Actualizar Película</button>
         </form>
         
     </div>
</div>
</div>
@endsection