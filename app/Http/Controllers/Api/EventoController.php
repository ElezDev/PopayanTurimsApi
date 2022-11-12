<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evento = Evento::included()
        ->filter()
        ->sort()
        ->get();

       return $evento;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $evento = $request->all();
        $file=$request->file("foto_url");
        $nombreArchivo = "img_".time().".".$file->guessExtension();
        $request->file('foto_url')->storeAs('public/Fotos_Evento', $nombreArchivo );
        $evento['foto_url']= "$nombreArchivo";
        Evento::create($evento);
         return $evento;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::included()->findOrFail($id);
        return $evento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {

        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'horarios' => 'required',
            'fechainicio' => 'required',
            'fechafin' => 'required',
            'tipoeventos_id' => 'required',
           ' foto_url'=>'required'
        ]);

        $evento->update($request->all());
        return $evento;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $Evento)

    {
        $Evento->delete();
        return $Evento;
    }
}
