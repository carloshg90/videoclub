@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
      <div class="offset-md-3 col-md-6">
          <div class="card">
              <div class="card-header text-center">
                  Modificar categoría
              </div>
              <div class="card-body" style="padding:30px">
                  <form method="post" action="{{action('CategoryController@update', $categoria->id)}}">
                      {{method_field('PUT')}}
                      @csrf
                      <div class="form-group">
                          <label for="title">Nom de la categoria</label>
                          <input type="text" name="title" id="title" class="form-control" value="{{$categoria->title}}" >
                      </div>
                      <div class="form-group">
                          <label for="synopsis">Descripció</label>
                          <textarea name="description" id="description" class="form-control" rows="4">{{$categoria->description}}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="title">Marcar com pelicula per adults?</label>
                          <select class="form-control form-control-lg" name="adult">
                            <option {{($categoria->adult)?'selected="selected"':''}} value="1">Si</option>
                            <option {{($categoria->adult)?'selected="selected"':''}} value="0">No</option>
                          </select>
                      </div>
                      <div class="form-group text-center">
                          <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                              Editar categoría
                          </button>
                      </div>
                  </form>

              </div>
          </div>
      </div>
  </div>
  @stop