<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calificasione;
use Illuminate\Http\Request;

class CalificasioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calificasione = Calificasione::included()
        ->filter()
        ->sort()
        ->get();
        return $calificasione;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Request()->validate(Calificasione::$rules);
        $calificasione = Calificasione::create($request->all());
        return $calificasione;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificasione  $calificasione
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calificasione =Calificasione::included()->findOrFail($id);
        return $calificasione;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calificasione  $calificasione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calificasione $calificasione)
    {
        Request()->validate(Calificasione::$rules);
        $calificasione = Calificasione::update($request->all());
        return $calificasione;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificasione  $calificasione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificasione $calificasione)
    {
        $calificasione->delete();
        return $calificasione;
    }
}
