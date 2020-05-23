<?php

namespace App\Http\Controllers;

use App\horarios;
use Illuminate\Http\Request;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/Horarios/opcionesHorarios');
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
        return view('pages/Horarios/tablasHorarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function show(horarios $horarios)
    {
        return view('pages/Horarios/tablasHorarios');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function edit(horarios $horarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, horarios $horarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(horarios $horarios)
    {
        //
    }
}
