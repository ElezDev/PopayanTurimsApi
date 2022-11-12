<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugar=Lugar::included()
        ->filter()
        ->sort()
        ->get();
        return $lugar;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lugar = $request->all();
        $file=$request->file("foto_url");
        $nombreArchivo = "img_".time().".".$file->guessExtension();
        $request->file('foto_url')->storeAs('public/Fotos', $nombreArchivo );
        $lugar['foto_url']= "$nombreArchivo";
        Lugar::create($lugar);
        return $lugar;
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lugar =Lugar::included()->findOrFail($id);
        return $lugar;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lugar $lugar)
    {

        
        $lugar = $request->all();
        $file=$request->file("foto_url");
        $nombreArchivo = "img_".time().".".$file->guessExtension();
        $request->file('foto_url')->storeAs('public/Fotos', $nombreArchivo );
        $lugar['foto_url']= "$nombreArchivo";
        Lugar::Update($lugar);
        return $lugar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lugar $lugar)
    {


        $lugar->delete();
        return $lugar;

    }
}
