<?php

namespace App\Http\Controllers;

use App\listaPrioridad;
use Illuminate\Http\Request;

class ListaPrioridadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages/Carreras/listaPrioridad');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\listaPrioridad  $listaPrioridad
     * @return \Illuminate\Http\Response
     */
    public function show(listaPrioridad $listaPrioridad)
    {
        return view('pages/Alumnos/exportaDatos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\listaPrioridad  $listaPrioridad
     * @return \Illuminate\Http\Response
     */
    public function edit(listaPrioridad $listaPrioridad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\listaPrioridad  $listaPrioridad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, listaPrioridad $listaPrioridad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\listaPrioridad  $listaPrioridad
     * @return \Illuminate\Http\Response
     */
    public function destroy(listaPrioridad $listaPrioridad)
    {
        //
    }
}
