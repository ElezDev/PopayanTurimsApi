<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tiposervicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tiposervicio=Tiposervicio::included()
        ->filter()
        ->sort()
        ->get();
        return $tiposervicio;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Tiposervicio::$rules);
        $tiposervicio = Tiposervicio::create($request->all());
        return $tiposervicio;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiposervicio  $tiposervicio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiposervicio = Tiposervicio::included()->findOrFail($id);
        return $tiposervicio;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tiposervicio  $tiposervicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiposervicio $tiposervicio)
    {
        request()->validate(Tiposervicio::$rules);
        $tiposervicio->update($request->all());
        return $tiposervicio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiposervicio  $tiposervicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tiposervicio $tiposervicio)
    {



        $tiposervicio->delete();
        return $tiposervicio;
    }
}
