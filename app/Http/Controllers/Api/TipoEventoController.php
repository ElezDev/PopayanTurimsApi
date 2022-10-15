<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tipoevento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoevento = Tipoevento::included()
        ->filter()
        ->sort()
        ->get();
        return $tipoevento;

        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request()->validate(Tipoevento::$rules);
        $tipoevento= Tipoevento::create($request->all());
        return $tipoevento;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipoevento  $tipoevento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoevento = Tipoevento::included()->findOrFail($id);
        return $tipoevento;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipoevento  $tipoevento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipoevento $tipoevento)
    {
        Request()->validate(Tipoevento::$rules);
        $tipoevento= Tipoevento::update($request->all());
        return $tipoevento;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipoevento  $tipoevento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipoevento $tipoevento)
    {
        $tipoevento->delete();
        return $tipoevento;
    }
}
