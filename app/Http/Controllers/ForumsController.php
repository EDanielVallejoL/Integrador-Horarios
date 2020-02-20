<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = \App\Forum::all();
        return view('pages/forum-list', ['forums' => $forums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/create-forum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $forum = new \App\Forum;
        $forum->name = $request->name;
        $forum->description = $request->description;
        $forum->save();

        // redirigir con get despues del post
        return redirect('/forums/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = \App\Post::all()->where('id', $id);
        $authors = \App\User::all();
        // dd($posts);
        return view('pages/index', ['posts' => $posts, 'authors' => $authors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forum = \App\Forum::find($id); /* Nos regresa un contacto */
        return view('pages/edit-forum', ['forum' => $forum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $forum = \App\Forum::find($id);
        $forum->name = $request->name;
        $forum->description = $request->description;
        $forum->save();
        return redirect('/forums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Hacer un dialogo de confirmacion aqui */
        $forum = \App\Forum::find($id);
        /* Buscar que el contacto exista */
        $posts = \App\Forum::all();
        // $posts->delete();
        foreach ($posts as $post) {
            if($post->forum_id == $id) {
                $post->delete();
            }
        }
        $forum->delete();
        return redirect('/forums');
    }
}
