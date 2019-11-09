@extends('layouts.app')
@section('content')
    <h2 class="text-center">Listado de Películas!!!</h2>
    <div>
    <form action="" method="get">
        <input type="submit" value="Buscar"><input type="text" name="busqueda">
        <a href="/agregarPelicula">Agregar Película</a>
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
        <?php foreach ($peliculas as $key => $value) :?>
            <tr>
            <td><?=$value['id'];?></td>
            <td><?=$value['title'];?></td>
            <td><a href="detallePelicula.php?id=<?=$value['id'];?>"><ion-icon name="eye"></ion-icon></a></td>
            <td><a href="#"><ion-icon name="create"></ion-icon></a></td>
            <td><a href="#"><ion-icon name="trash"></ion-icon></td></a>
            </tr>

        <?php endforeach;?>
        <tr>

        </tr>
        </tbody>
    </table>
    </div>    

@endsection
