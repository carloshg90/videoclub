@extends('layouts.master')

@section('content')
<h1 style="text-align: center; margin-bottom: 1em;"><b><u>Categoría {{$pelicules[0]->category->title}}</u></b></h1>
<div class="row">
  @foreach( $pelicules as $pelicula)
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
      <a href="{{ url('/catalog/show/' . $pelicula->id ) }}">
        <img src="{{$pelicula->poster}}" style="height:200px"/>
        <h4 style="min-height:45px;margin:5px 0 10px 0">
            {{$pelicula->title}}
        </h4>
      </a>
  </div>
@endforeach
</div>
@stop
