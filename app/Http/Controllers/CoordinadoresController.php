<?php

namespace App\Http\Controllers;

use App\Coordinadores;
use Illuminate\Http\Request;

class CoordinadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['coordinadores'] = Coordinadores::paginate(5);

        return view('pages/coordinadores/listaC', $datos);
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
        $datosCoordinador=request()->except('_token');
        Coordinadores::insert($datosCoordinador);
        return redirect('coordinadores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coordinadores  $coordinadores
     * @return \Illuminate\Http\Response
     */
    public function show(Coordinadores $coordinadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coordinadores  $coordinadores
     * @return \Illuminate\Http\Response
     */
    public function edit(Coordinadores $coordinadores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coordinadores  $coordinadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coordinadores $coordinadores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coordinadores  $coordinadores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Coordinadores::destroy($id);
        return redirect('coordinadores');
    }

    public function registro()
    {
        return view('pages/coordinadores/registraCoordinador');
    }

}
