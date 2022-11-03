<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Traits\HasRoles;

class Permission extends Controller
{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission=ModelsPermission::all();

        return $permission;
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {

    //     Request()->validate(Lugar::$rules);
    //     $lugar = Lugar::create($request->all());
    //     return $lugar;

    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Lugar  $lugar
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $lugar =Lugar::included()->findOrFail($id);
    //     return $lugar;
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Lugar  $lugar
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Lugar $lugar)
    // {
    //     request()->validate(Lugar::$rules);
    //     $lugar->update($request->all());
    //     return $lugar;
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Lugar  $lugar
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Lugar $lugar)
    // {


    //     $lugar->delete();
    //     return $lugar;

    }

