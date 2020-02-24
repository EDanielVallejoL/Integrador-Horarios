<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $posts = \App\Post::all();
        $authors = \App\User::all();
        return view('pages/index', ['posts' => $posts, 'authors' => $authors]);

    }

    // Recibir el nombre del foro, agregarlo como parametro abajo o en la funcion de arriba
    public function foro() {
        return view('pages/forum');
    }
    
    public function listaForos() {
        return view('pages/forum-list');
    }
    public function cuidados() {
        return view('pages/cares');
    }
    public function mensajes() {
        return view('pages/mensajes');
    }

    public function login() {
        return view('Auth/loginController.php');
    }
    public function recomendaciones() {
        return view('pages/recommendation');
    }
    public function creaPublicacion() {
        return view('pages/create-post');
    }

    public function perfilUser() {
        return view('pages/profile');
    }
    public function results() {
        $posts = \App\Post::all();
        // $posts->reverse();
        $authors = \App\User::all();
        return view('pages/posts', ['posts' => $posts, 'authors' => $authors]);
    }
    public function pets() {
         return view('pages/pet');
    }

    public function prueba() {
        return view('auth/loginPrueba');
   }


    // public function about() {
    //     return view('pages/about');
    // }
}
