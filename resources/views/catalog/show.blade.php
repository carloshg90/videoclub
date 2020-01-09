@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">

    <img src="{{ $arrayPeliculas->poster }}" class="w-100" />

    </div>
    <div class="col-sm-8">

        <h1>{{ $arrayPeliculas->title }}</h2>
        <h3>Any: {{ $arrayPeliculas->year }}</h3>
        <h3>Director: {{ $arrayPeliculas->director }}</h3><br>
        <p><b>Resumen:</b> {{ $arrayPeliculas->synopsis }}</p>
        @if($arrayPeliculas->rented)
        <p><b>Estado:</b> Pelicula NO disponible</p>
        @else
        <p><b>Estado:</b> Pelicula disponible</p>
        @endif
        </p>
        <div>
        
        @if($arrayPeliculas->rented)
        <!-- Boto per retornar la pelicula -->
        <form action="{{action('CatalogController@putReturn', $arrayPeliculas->id)}}" method="POST" style="display:inline">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-success" style="display:inline">
            Retornar película
        </button>
        </form>
        @else
        <!-- Boto per llogar la pelicula -->
        <form action="{{action('CatalogController@putRent', $arrayPeliculas->id)}}" method="POST" style="display:inline">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-info" style="display:inline">
            Llogar película
        </button>
        </form>
        @endif
        <!-- Boto per eliminar la pelicula -->
        <form action="{{action('CatalogController@deleteMovie', $arrayPeliculas->id)}}" method="POST" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger" style="display:inline">
            Eliminar película
        </button>
        </form>
        <!-- Boto per editar la pelicula -->
        <a href="{{url('catalog/edit/'.$arrayPeliculas->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span>Editar pelicula</a>
        <!-- Boto per tornar al llistat -->
        <a href="{{url('/catalog')}}"class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Volver al listado</a>
        </div>
    </div>
</div>
@stop