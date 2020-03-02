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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registraCoordinador', 'CoordinadoresController@registro')->name('registraCoordinador');
Route::get('/coordinadores', 'CoordinadoresController@index')->name('coordinadores');

/* Resources */
Route::resource('coordinador', 'CoordinadoresController');

// DELETE
Route::delete('/coordinadores/{id}', 'CoordinadoresController@destroy');