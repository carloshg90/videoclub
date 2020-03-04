<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;

class APICatallogController extends Controller
{
    //Funcio per tornar per Json totes les pelicules
    public function index()
    {
        return response()->json(Movie::all());
    }

    //Funcio per crear un pelicula
    public function store(Request $request)
    {
        //---------------------------------------------------//
        //Per fer-ho camp per camp ho farem de la seguent manera,
        //hem de tenir en compte que no ens podem
        //deixar cap camp al crear la pelicula:
        //Declarem pelicula
            $movie = new Movie();
        //Comporvem si existeixen els camps a la base de dades
        if($request->has('title') && $request->has('year') && $request->has('director') && $request->has('poster') && $request->has('synopsis')){
            //Si existeixen guardem les dades a la pelicula
            $movie->title = $request->input('title');
            $movie->year = $request->input('year');
            $movie->director = $request->input('director');
            $movie->poster = $request->input('poster');
            $movie->sinopsis = $request->input('synopsis');
            $movie->trailer = $request->input('trailer');
            $movie->category_id = $request->input('categoria');

            //Guardem la pelicula
            $movie->save();
            //Retornem el missatge de que hem creat la pelicula correctament
            return response()->json( [$movie,'msg' => 'Ha creat la pelicula' ]);
        }else{
            //Retornem el missatge de que falta algun camp
            return response()->json( ['msg' => 'Falta algun camp de la bases de dades' ]);
        }

        //---------------------------------------------------//
        //De la seguent manera és més optim, però fa el mateix que lo anterior,
        //i hem de tenir en compte que no podem comprovar els camps:
        //$movie = Movie::create($request->all());
        //---------------------------------------------------//

    }

    //Funcio per retornar per Json només una pelicula
    public function show($id)
    {
        $m = Movie::findOrFail( $id );
        return response()->json($m);
    }

    //Metode per modificar una pelicula
    public function update(Request $request, $id)
    {
        //Modificacio de la pelicula actual
        $m = new Movie();
		$p = $m -> findOrFail($id);
		$p->update($request->all());
        return response()->json( [$p,'msg' => 'Has modificat la pelicula' ] );
    }

    //Metode per esborrar una pelicula
    public function destroy($id)
    {
        $movie = new Movie();
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return response()->json( [$movie,'msg' => 'Has esborrat la pelicula' ] );
    }

    //Métode per llogar una pelicula
    public function putRent($id) {
        $m = Movie::findOrFail( $id );
        if($m->rented == true)
        {
            return response()->json( ['msg' => 'La película ja està llogada, no es pot llogar' ] );
        }
        else
        {
            $m->rented = true;
            $m->save();
            return response()->json( ['msg' => 'La película se ha marcado como alquilada' ] );
        }

    }

    //Métode per retornar una pelicula
    public function putReturn($id) {
        $m = Movie::findOrFail( $id );
        if($m->rented == false)
        {
            return response()->json( ['msg' => 'La pelicula ja està retornada, no la pots retornar' ] );
        }
        else
        {
            $m->rented = false;
            $m->save();
            return response()->json( ['msg' => 'La película se ha marcado como devuelta' ] );
        }

    }

}
