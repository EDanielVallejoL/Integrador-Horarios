<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busca las mascotas con el usuario en auth
        //$pets = Auth::user() -> pets;
        $user = \App\User::find(Auth::id());
        $pets = Auth::user() -> pets;
        return view("pages/pet", [
            'user' => $user,
            'pets' => $pets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pet-register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $pet = new \App\Pet;
        $pet->name = $request->name;
        $pet->color = $request->color;
        $pet->race = $request->race;
        $pet->user_id = Auth::id();
        $pet->save();
        // redirigir con get despues del post
        return redirect('/users/' . Auth::id());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pet = \App\Contact::find($id);
        // checar si existe o no
        // return redirect('/pet/perfil');
        // dd($id);
        $user = \App\User::find(Auth::id());
        $pets = Auth::user() -> pets;
        return view("pages/pet", [
            'user' => $user,
            'pets' => $pets
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
