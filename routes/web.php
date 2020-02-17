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

/*Route::get('/', function () {
    return view('welcome');
});*/

// PARA PASAR DATOS POR MEDIO DEL URL
/*Route::get('user/{name?}', function ($name = null) {
    return 'Bienvenido: ' . $name;
});*/

// POR CONTROLADORES
Route::get('user/{id}', 'UserController@show');

// PARA VISTAS y CONTROLADOR
Route::get('/', 'UserController@saluda');