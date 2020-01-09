<?php

namespace App\Http\Controllers;
use App\Movie;
use Coderatio\Laranotify\Facades\Notify;

use Illuminate\Http\Request;

class CatalogController extends Controller
{


    public function getIndex()
    {
        return view('catalog.index',array('arrayPeliculas'=>Movie::all()));
    }
    public function getShow($id)
    {
        return view('catalog.show', array('arrayPeliculas'=>Movie::findOrFail($id)));
    }
    public function getCreate()
    {
        return view('catalog.create');
    }
    public function getEdit($id)
    {
        return view('catalog.edit', array('pelicula'=>Movie::findOrFail($id)));
    }
    public function postCreate(Request $request){
        //Declarem pelicula
        $movie = new Movie();
        //Guardem les dades a la pelicula
        $movie->title = request('title');
        $movie->year = request('year');
        $movie->director = request('director');
        $movie->poster = request('poster');
        $movie->synopsis = request('synopsis');
        //Guardem la pelicula i redirigim
        $movie->save();
        Notify::success('Ha guardat la pelicula');
        return redirect('/catalog');
      }
      public function putEdit(Request $request, $id){
        //Modificacio de la pelicula actual
        $movie = new Movie();
		$movie = Movie::findOrFail($id);
		$movie->title = $request->input('title');
		$movie->year = $request->input('year');
		$movie->director = $request->input('director');
		$movie->poster = $request->input('poster');
		$movie->synopsis = $request->input('synopsis');
		$movie->save();
        Notify::success('Ha modificat la pelicula');
        return redirect('/catalog/show/'.$id);
      }
      public function putRent($id){
        $movie = new Movie();
        $movie = Movie::findOrFail($id);
        $movie->rented = true;
        $movie->save();
        Notify::success('Ha llogat la pelicula');
        return redirect('/catalog/show/'.$id);
      }
      public function putReturn($id){
        $movie = new Movie();
        $movie = Movie::findOrFail($id);
        $movie->rented = false;
        $movie->save();
        Notify::success('Ha tornat la pelicula');
        return redirect('/catalog/show/'.$id);
    }
    public function deleteMovie($id){
        $movie = new Movie();
        $movie = Movie::findOrFail($id);
        $movie->delete();  
        Notify::success('Ha eliminat la pelicula');
        return redirect('/catalog');
    }
}
