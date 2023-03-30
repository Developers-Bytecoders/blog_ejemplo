<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/categoria',[CategoriasController::class,'store']);
Route::get('/categoria/{id}',[CategoriasController::class,'show']);
Route::get('/categorias',[CategoriasController::class,'show']);
Route::put('/categoria/{id}',[CategoriasController::class,'update']);
Route::delete('/categoria/{id}',[CategoriasController::class,'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
