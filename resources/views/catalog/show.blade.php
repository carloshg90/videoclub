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
        <p><b>Resumen:</b> {{ $arrayPeliculas->sinopsis }}</p>
        <p><b>Categoria:</b> {{ $arrayPeliculas->category->title }}</p>
        @if($arrayPeliculas->rented)
        <p><b>Estado:</b> Pelicula NO disponible</p>
        @else
        <p><b>Estado:</b> Pelicula disponible</p>
        @endif
        </p>
        <div>
        <!-- Boto per afegir a favorits -->
        <form action="{{action('CatalogController@putReturn', $arrayPeliculas->id)}}" method="POST" style="display:inline">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary" style="display:inline">
        <span class="glyphicon glyphicon-heart"></span>Afegir a favorits
        </button>
        </form>
        @if($arrayPeliculas->rented)
        <!-- Boto per retornar la pelicula -->
        <form action="{{action('CatalogController@putReturn', $arrayPeliculas->id)}}" method="POST" style="display:inline">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-success" style="display:inline">
        <span class="glyphicon glyphicon-upload"></span>Retornar película
        </button>
        </form>
        @else
        <!-- Boto per llogar la pelicula -->
        <form action="{{action('CatalogController@putRent', $arrayPeliculas->id)}}" method="POST" style="display:inline">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-info" style="display:inline">
        <span class="glyphicon glyphicon-download"></span>Llogar película
        </button>
        </form>
        @endif
        <!-- Boto per eliminar la pelicula -->
        <form action="{{action('CatalogController@deleteMovie', $arrayPeliculas->id)}}" method="POST" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger" style="display:inline">
        <span class="glyphicon glyphicon-remove"></span>Eliminar película
        </button>
        </form>
        <!-- Boto per editar la pelicula -->
        <a href="{{url('catalog/edit/'.$arrayPeliculas->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span>Editar pelicula</a>
        <!-- Boto per tornar al llistat -->
        <a href="{{url('/catalog')}}"class="btn btn-dark"><span class="glyphicon glyphicon-chevron-left"></span> Volver al listado</a>
        </div>
    </div>

    <h2 style="width: 100%"><b><u>Trailer</u></b></h2>
    <!--Modal per el trailer-->
    <div class="col-8 mx-auto border border-danger">
    <div class="modal fade " id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content ">
        <div class="modal-body mb-0 p-0 ">
            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
            <iframe class="embed-responsive-item" src="{{ $arrayPeliculas->trailer }}"
                allowfullscreen></iframe>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="icon glyphicon glyphicon-remove-sign"></span> Close</button>
          </div>
    </div>

    </div>
    </div>
    <a><img class="img-fluid z-depth-1" src="https://i.pinimg.com/originals/f9/9c/9b/f99c9b255df71def17931dba7e5521e8.png" alt="video"
        data-toggle="modal" data-target="#modal1"></a>
    </div>

    <h2 style="width: 100%"><b><u>Comentaris</u></b></h2>
    <!-- Div per cada comentari -->
    @foreach($arrayReviews as $comentari)
    <div class="col-12" style="border-left: 1px solid; margin: 0.5em">
            <b>{{$comentari->title}}</b>
            <p>{{$comentari->stars}} Estrelles</p>
            <p>{{$comentari->review}}</p>
            <p>{{$comentari->created_at}} - <b>{{$comentari->user->name}}</b></p>
        </div>
    @endforeach
    <div>{{$arrayReviews->links()}}</div>


    <!-- Div per posar comentaris -->
    <div class="col-12">
    <h3><b>Deixa la teva opinió:</b></h3>
    <form action="{{action('CatalogController@crearComentari', $arrayPeliculas->id)}}" method="POST">
        @csrf
        <p>Enviar comentari:</p>
        <input  class="col-12" type="text" name="titol" placeholder="Resum del teu comentari">
        <p style="margin-top: 1em">Valoració:</p>
        <select class="col-12" name="estrelles">
            <option value="1" selected>1 estrella</option>
            <option value="2">2 estrelles</option>
            <option value="3">3 estrelles</option>
            <option value="4">4 estrelles</option>
            <option value="5">5 estrelles</option>
        </select>
        <textarea  style="margin-top: 1em" class="col-12" name="comentari" rows="10" cols="20" placeholder="Deixa la teva opinió"></textarea>
        <button type="submit" class="btn btn-success">Enviar</button>
        <button type="reset" class="btn btn-dark">Cancel·lar</button>
    </form>
    </div>
</div>
@stop
