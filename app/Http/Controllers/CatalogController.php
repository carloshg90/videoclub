<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Review;
use Illuminate\Support\Facades\Auth;
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
        return view('catalog.show', array('arrayPeliculas'=>Movie::findOrFail($id),'arrayReviews'=>$results=Review::where('movie_id', $id)->orderBy('created_at', 'desc')->paginate(3)));
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
        $movie->sinopsis = request('synopsis');
        $movie->trailer = request('trailer');
        $movie->category_id = request('categoria');
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
        $movie->sinopsis = $request->input('synopsis');
        $movie->trailer = $request->input('trailer');
        $movie->category_id = request('categoria');
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
    public function crearComentari(Request $request, $id){
        //Declarem review
        $review = new Review();
        //Guardem les dades a la review
        $review->title = request('titol');
        $review->review = request('comentari');
        $review->stars = request('estrelles');
        $review->movie_id = $id;
        $review->user_id = Auth::id();
        //Guardem la review i redirigim
        $review->save();
        Notify::success('Ha publicat el comentari');
        return redirect('/catalog/show/'.$id);
    }
    public function buscar(Request $request){
        $paraules = $request->input('buscador');
        $arrayPeliculas = Movie::where('title', 'LIKE', '%' . $paraules . '%')->orWhere('director', 'LIKE', '%' . $paraules . '%')->get();
        return view('catalog.index', compact('arrayPeliculas'));
      }


}
