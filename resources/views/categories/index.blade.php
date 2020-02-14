@extends('layouts.master')

@section('content')
<h1>Llista de categories</h1>
<a href="{{url('/category/create')}}"><button type="submit" class="btn btn-success">Afegir categoria</button></a>
<table style="margin: 1em; text-align: center; width:100%">
  <thead>
    <tr>
      <th style="padding: 0.5em; border-bottom:1pt solid grey; text-align: center;">ID</th>
      <th style="padding: 0.5em; border-bottom:1pt solid grey; text-align: center;">Títol</th>
      <th style="padding: 0.5em; border-bottom:1pt solid grey; text-align: center;">Descripció</th>
      <th style="padding: 0.5em; border-bottom:1pt solid grey; text-align: center;">Només per adults</th>
      <th style="padding: 0.5em; border-bottom:1pt solid grey; text-align: center;">Accions</th>
    </tr>
  </thead>
  <tbody>
    @foreach (App\Category::all() as $categoria)
      <tr>
        <td style="padding: 0.5em; border-bottom:1pt solid grey;">{{$categoria->id}}</td>
        <td style="padding: 0.5em; border-bottom:1pt solid grey; ">{{$categoria->title}}</td>
        <td style="padding: 0.5em; border-bottom:1pt solid grey;">{{$categoria->description}}</td>
        <td style="padding: 0.5em; border-bottom:1pt solid grey;">{{($categoria->adult)?'Si':'No'}}</td>
        <td style="padding: 0.5em; border-bottom:1pt solid grey;">
          <a href="{{url('/category/'.$categoria->id)}}"><button type="button" class="btn" style="background-color: #611BBD; color: white">Mostrar</button></a>
          <a href="{{url('/category/'.$categoria->id.'/edit')}}"><button type="button" class="btn btn-warning">Editar</button></a>
          <form action="{{action('CategoryController@destroy', $categoria->id)}}" method="post" style="display: inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@stop