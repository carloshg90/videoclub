@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar película
         </div>
         <div class="card-body" style="padding:30px">
            <form method="post">
            {{method_field('PUT')}}
            @csrf
            <div class="form-group">
               <label for="title">Nom de la pelicula</label>
               <input type="text" name="title" id="title" class="form-control" value="{{$pelicula->title}}">
            </div>
            <div class="form-group">
                <label for="year">Any</label>
               <input type="text" name="year" id="year" class="form-control" value="{{$pelicula->year}}">
            </div>
            <div class="form-group">
                <label for="director">Director</label>
               <input type="text" name="director" id="director" class="form-control" value="{{$pelicula->director}}">
            </div>
            <div class="form-group">
            <label for="poster">Poster</label>
               <input type="text" name="poster" id="poster" class="form-control" value="{{$pelicula->poster}}">
            </div>
            <div class="form-group">
            <label for="poster">Trailer</label>
               <input type="text" name="trailer" id="trailer" class="form-control" value="{{$pelicula->trailer}}">
            </div>
            <div class="form-group">
            <label for="categoria">Categoria</label><br>
            <select class="form-control form-control-lg" name="categoria" id="categoria">
            @foreach (App\Category::all() as $categoria)
               <option value="{{$categoria->id}}">{{$categoria->title}}</option>
            @endforeach
            </select>
            </div>
            <div class="form-group">
               <label for="synopsis">Resumen</label>
               <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{ $pelicula->sinopsis }}</textarea>
            </div>
            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Editar película
               </button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>

@stop
