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


/* Single pages */
Route::any('/', 'HomeController@index');
Route::get('/pruebas', 'PagesController@loginPrueba');
Route::get('/pruebasLogin', 'PagesController@loginPrueba');
Route::get('/registraCoordinador', 'Cordinadores2Controller@registro');
Route::get('/coordinadores', 'Cordinadores2Controller@index');
Route::get('/registro', 'UserController@registro')->name('registro');

/* Resources */

Route::resource('users', 'UsersController');
Route::resource('coordinador', 'CoordinadorController');
Route::resource('cordinador2', 'Cordinadores2Controller');

Route::delete('/coordinadores/{id}', 'Cordinadores2Controller@destroy');

Auth::routes();
