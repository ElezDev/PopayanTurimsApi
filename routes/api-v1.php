<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TipoLugarController;
use App\Http\Controllers\Api\TipoServicioController;
use App\Http\Controllers\Api\LugarController;

////////////////////////////////////////////////////////////////////////////
use App\Http\Controllers\Api\CalificasioneController;
use App\Http\Controllers\Api\EventoController;
use App\Http\Controllers\Api\GastronomiaController;
use App\Http\Controllers\Api\MapaController;
use App\Http\Controllers\Api\RutaController;
use App\Http\Controllers\Api\ServicioController;
use App\Http\Controllers\Api\TipoEventoController;
use App\Http\Controllers\Api\PostController;







 Route::post('register', [RegisterController::class,'store'])->name('api.v1.register');
 Route::apiResource('user',UserController::class)->names('api.v1.users');
 Route::apiResource('lugar',LugarController::class)->names('api.v1.lugar');
 Route::apiResource('tipolugar',TipoLugarController::class)->names('api.v1.tipolugar');
 Route::apiResource('servicio',ServicioController::class)->names('api.v1.servicio');
 Route::apiResource('tiposervicio',TipoServicioController::class)->names('api.v1.tiposervicio');

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////
 Route::apiResource('calificasiones',CalificasioneController::class)->names('api.v1.calificasiones');
 Route::apiResource('Evento',EventoController::class)->names('api.v1.eventos');
 Route::apiResource('tipoevento',TipoEventoController::class)->names('api.v1.tipoevento');
 Route::apiResource('gastronomia',GastronomiaController::class)->names('api.v1.gastronomia');
 Route::apiResource('mapa',MapaController::class)->names('api.v1.mapa');
 Route::apiResource('ruta',RutaController::class)->names('api.v1.ruta');
 Route::apiResource('post',PostController::class)->names('api.v1.post');


