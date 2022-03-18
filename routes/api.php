<?php

use App\Http\Controllers\IlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//ilan endpoint
Route::get('/ilanlar',[IlanController::class,'index'])->middleware('web');;

Route::put('/ilanlar/guncelle/{id}',[IlanController::class,'update'])->middleware('web');


//ilan filtrelerim | bu kismi gruplamak mümkündü fakat tercih etmedim
Route::get('/ilanlar/sehir/{sehir}',[ IlanController::class,'sehirFiltre']);
Route::get('/ilanlar/ilce/{ilce}',[ IlanController::class,'ilceFiltre']);

