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

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('Documentos', 'DocumentoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registraCoordinador', 'CoordinadoresController@registro')->name('registraCoordinador');
Route::get('/coordinadores', 'CoordinadoresController@index')->name('coordinadores');
Route::get('/materias', 'MateriasController@index')->name('materias');
<<<<<<< HEAD
Route::get('/carreras', 'CarrerasController@index')->name('carreras');
Route::get('/carrerasShow', 'CarrerasController@store')->name('carrerasShow');
Route::get('/funcion1/{nombre}', 'CarrerasController@funcion1')->name('funcion1');
=======
Route::get('/plantilla', 'PlantillaController@index')->name('materias');
>>>>>>> bbad3e1ae831fbc104d8737fa40638f8a8d26b98

/* Resources */
Route::resource('coordinador', 'CoordinadoresController');
Route::resource('carrera', 'CarrerasController');

// DELETE
Route::delete('/coordinadores/{id}', 'CoordinadoresController@destroy');