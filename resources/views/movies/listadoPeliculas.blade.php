@extends('layouts.app')
@section('content')
    <h2 class="text-center">Listado de Películas!!!</h2>
    <div>
        <form class="form-inline" action="/buscarPelicula" method="GET" >
            @csrf
            <input class="btn btn-primary " type="submit" value="Buscar"><input class="form-control mx-sm-3" type="text" name="busqueda">
            <a class="btn btn-success " href="/agregarPelicula">Agregar Película</a>
          </form>
    </div>
   
    <div class="spacer">
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
           
            @foreach ($peliculas as $key => $value)
                <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->title}}</td>
                <td><a href="/detallePelicula/{{$value->id}}"><ion-icon name="eye"></ion-icon></a></td>
                <td><a href="/editarPelicula/{{$value->id}}"><ion-icon name="create"></ion-icon></a></td>
                <td><a href="/eliminarPelicula/{{$value->id}}"><ion-icon name="trash"></ion-icon></td></a>
                </tr>

            @endforeach
        <tr>

        </tr>
        </tbody>
    </table>
    <div>
        {{$peliculas->links()}}
    </div>
    
    </div>    

@endsection
