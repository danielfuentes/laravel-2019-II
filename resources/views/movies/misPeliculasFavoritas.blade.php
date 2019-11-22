@extends('layouts.app')
@section('content')
    <h1 class="text-center text-danger">Mis Películas Favoritas</h1>
    <ul>
        @foreach (session()->get('favoritas') as $favorita)
            <li>{{$favorita['title']}}</li>
        @endforeach
    </ul>
@endsection