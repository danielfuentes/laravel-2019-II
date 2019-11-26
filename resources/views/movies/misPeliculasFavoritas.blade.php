@extends('layouts.app')

@section('content')

<div class="container col-10">
    <section class="row">
    @if (session()->get('favoritas'))

        <article class="col-12">
            <br>
            <section class="table-responsive">
                <table class="table table-striped">
                    <thead>

                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Calificación </th>
                            <th scope="col" class="text-center">Premios</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session()->get('favoritas') as $favorita)
                            <tr>
                                <td><img src="{{asset('storage/posters/'.$favorita['poster'])}}" width="10%"/> </td>
                                <td class="initialism">{{$favorita['title']}}</td>
                                <td class="">{{$favorita['rating']}}</td>
                                <td class="text-right"> {{$favorita['awards']}}</td>
                                <td><a href="/peliculasFavoritas/remove/{{$favorita['id']}}"><ion-icon name="trash"></ion-icon></a></td>
                               
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </article>
        <section class="col mb-2">
            <article class="row">
                <section class="col-sm-12  col-md-6">
                <a href="{{route('home')}}" class="btn btn-block btn-light">Continue Seleccionando</a>
                </section>
                <section class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Orden de Compra</button>
                </section>
            </article>
            <br>
        </section>
            
    @else
        <div class='container mb-5 mt-5'>
           <h2 class='text-center mb-5 mt-5'> HERMANO QUERIDO, AUN NO HA SELECCIONADO SUS PELÍCULAS FAVORITAS </h2>
        </div>
    @endif  

</section>
</div>
@endsection
