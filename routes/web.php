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
Route::any('/', 'PostsController@index');
Route::get('/cares', 'PagesController@cuidados');
Route::get('/recommendation', 'PagesController@recomendaciones');
Route::get('/pruebas', 'PagesController@loginPrueba');
Route::get('/pruebasLogin', 'PagesController@loginPrueba');
/*Route::get('/auth/register')->name('registro');*/
Route::get('/registro', 'UserController@registro')->name('registro');

/* Resources */

Route::resource('users', 'UsersController');
Route::resource('pet', 'PetsController');
Route::resource('pets', 'PetsController');
Route::resource('posts', 'PostsController');
Route::resource('forums', 'ForumsController');
Route::resource('comments', 'CommentsController');

Auth::routes();
