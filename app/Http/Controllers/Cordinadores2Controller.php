<?php

namespace App\Http\Controllers;

use App\Cordinadores2;
use Illuminate\Http\Request;

class Cordinadores2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['coordinadores'] = Cordinadores2::paginate(5);

        return view('pages/coordinadores', $datos);
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
        $datosCoordinador=request()->except('_token');
        Cordinadores2::insert($datosCoordinador);
        return redirect('coordinadores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cordinadores2  $cordinadores2
     * @return \Illuminate\Http\Response
     */
    public function show(Cordinadores2 $cordinadores2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cordinadores2  $cordinadores2
     * @return \Illuminate\Http\Response
     */
    public function edit(Cordinadores2 $cordinadores2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cordinadores2  $cordinadores2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cordinadores2 $cordinadores2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cordinadores2  $cordinadores2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cordinadores2::destroy($id);
        return redirect('coordinadores');
    }

    public function registro ()
    {
        return view('pages/coordinadores/registraCoordinador');
    }
}
