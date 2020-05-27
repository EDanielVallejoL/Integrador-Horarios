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

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/alumnos', 'AlumnosController@index')->name('alumnos');
    Route::get('/horarios', 'HorariosController@index')->name('horarios');
    Route::get('/listaPrioridad', 'ListaPrioridadController@index')->name('listaPrioridad');
    Route::get('/exporta', 'ListaPrioridadController@show')->name('exporta');


    Route::get('/Tabla', function () {
        if (Request::ajax()) {
            return view('pages/Horarios/tablasHorarios');
        }
    });

    Route::get('/ResAlumnos', function () {
        if (Request::ajax()) {
            return view('pages/Alumnos/infoAlumno');
        }
    });

    Route::get('/carreras', 'CarrerasController@index')->name('carreras');
    Route::get('/carrerasShow', 'CarrerasController@store')->name('carrerasShow');
    Route::get('/funcion1/{nombre}', 'CarrerasController@funcion1')->name('funcion1');


    /* Resources */

    Route::resource('carrera', 'CarrerasController');
});
