<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tipolugar;
use Illuminate\Http\Request;

class TipoLugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipolugar=Tipolugar::included()
        ->filter()
        ->sort()
        ->get();
        return $tipolugar;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request()->validate(Tipolugar::$rules);
          $tipolugar = Tipolugar::create($request->all());
          return $tipolugar;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipolugar  $tipolugar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipolugar =Tipolugar::included()->findOrFail($id);
        return $tipolugar;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipolugar  $tipolugar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipolugar $tipolugar)
    {
        $request->validate([
            'nombre' => 'required|',
            'descripcion' => 'required|',
        ]);

        $tipolugar->update($request->all());

        return $tipolugar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipolugar  $tipolugar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipolugar $tipolugar)
    {


        $tipolugar->delete();
        return $tipolugar;

    }
}
