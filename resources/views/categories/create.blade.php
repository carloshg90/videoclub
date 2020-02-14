@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Afegir categoria
            </div>
                <div class="card-body" style="padding:30px">
                  <form method="post" action="{{action('CategoryController@store')}}">
                      @csrf
                      <div class="form-group">
                          <label for="title">Nom de la categoria</label>
                          <input type="text" name="title" id="title" class="form-control">
                      </div>

                      <div class="form-group">
                          <label for="synopsis">Descripció</label>
                          <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                      </div>

                      <div class="form-group">
                          <label for="title">Marcar com pelicula per adults?</label>
                          <select class="form-control form-control-lg" name="adult">
                            <option value="0">NO</option>
                            <option value="1">SI</option>
                          </select>
                      </div>

                      <div class="form-group text-center">
                          <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                              Crear categoria
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
@stop