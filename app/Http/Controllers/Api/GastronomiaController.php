<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gastronomia;
use Illuminate\Http\Request;

class GastronomiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastronomia = Gastronomia::included()
        ->filter()
        ->sort()
        ->get();
        return $gastronomia;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request()->validate(Gatronomia::$rules);
        $gastronomia= Gastronomia::create($request->all());
        return $gastronomia;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gastronomia  $gastronomia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gastronomia = Gastronomia::included()->findOrFail($id);
        return $gastronomia;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gastronomia  $gastronomia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gastronomia $gastronomia)
    {


        Request()->validate(Gatronomia::$rules);
        $gastronomia= Gastronomia::update($request->all());
        return $gastronomia;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gastronomia  $gastronomia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gastronomia $gastronomia)
    {
        $gastronomia->delete();
        return $gastronomia;
    }
}
