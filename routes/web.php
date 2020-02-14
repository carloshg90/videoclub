<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Ruta simple
Route::get('/hola', function () {
    return ('Hola mundo!');
});
//Ruta amb paràmetre
Route::get('/hola/{id}', function ($id) {
    return 'Hola ' . $id;
});
//Ruta simple que mostra una vista
Route::get('/inici', function () {
    return view("inici");
});
//Vista amb Blade (S'ha de crear "inici2.blade.php")
Route::get('/inici2/{nom}', function ($nom) {
    return view('inici2',array('nom' => $nom));
});

/*Route::get('/', function () {
    return ('Pantalla pricipal');
});
Route::get('/login', function () {
    return ('Login usuario');
});
Route::get('/logout', function () {
    return ('Logout usuario');
});
Route::get('/catalog', function () {
    return ('Listado peliculas');
});
Route::get('/catalog/show/{id}', function ($id) {
    return 'Vista detalle pelicula ' . $id;
});
Route::get('/catalog/create', function () {
    return ('Añadir pelicula');
});
Route::get('/catalog/edit/{id}', function ($id) {
    return 'Modificar pelicula ' . $id;
});*/

/*Route::get('/', function () {   //Ruta que posarem al navegador "localhost/videoclub/public"
    return view("home");        //Ruta de la nostra vista "/views/home.blade.php"
});
Route::get('/login', function () {  //Ruta que posarem al navegador "localhost/videoclub/public/login"
    return view("auth.login");      //Ruta de la nostra vista "views/auth/login.blade.php"
});
Route::get('/catalog', function () {//Ruta que posarem al navegador "localhost/videoclub/public/catalog"
    return view("catalog.index");   //Ruta de la nostra vista "views/catalog/index.blade.php"
});
Route::get('/catalog/create', function () { //Ruta que posarem al navegador "localhost/videoclub/public/catalog/create"
    return view("catalog.create");          //Ruta de la nostra vista "views/catalog/create.blade.php"
});
Route::get('/catalog/show/{peli}', function ($peli) {   //Ruta que posarem al navegador "localhost/videoclub/public/catalog/show/paràmetre"
    return view("catalog.show",array('peli' => $peli)); //Ruta de la nostra vista "views/catalog/show.blade.php"
});
Route::get('/catalog/edit/{peli}', function ($peli) {   //Ruta que posarem al navegador "localhost/videoclub/public/catalog/edit/parametre"
    return view("catalog.edit",array('peli' => $peli)); //Ruta de la nostra vista "views/catalog/edit.blade.php"
});*/

//Route::get('/', 'HomeController@getHome');
Route::get('/', 'HomeController@index')->name('home');
Route::get('catalog', 'CatalogController@getIndex')->middleware('auth');
Route::get('catalog/show/{id}', 'CatalogController@getShow')->middleware('auth');
Route::get('catalog/create', 'CatalogController@getCreate')->middleware('auth');
Route::get('catalog/edit/{id}', 'CatalogController@getEdit')->middleware('auth');
Route::post('catalog/create', 'CatalogController@postCreate')->middleware('auth');
Route::put('catalog/edit/{id}', 'CatalogController@putEdit')->middleware('auth');
Route::put('/catalog/rent/{id}','CatalogController@putRent')->middleware('auth');
Route::put('/catalog/return/{id}','CatalogController@putReturn')->middleware('auth');
Route::delete('/catalog/delete/{id}','CatalogController@deleteMovie')->middleware('auth');
Route::post('/catalog/coment/{id}','CatalogController@crearComentari')->middleware('auth');
Route::resource('/category','CategoryController')->middleware('auth');
Route::get('/catalog','CatalogController@buscar')->middleware('auth');
Auth::routes();


