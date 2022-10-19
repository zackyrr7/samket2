<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PertanyaanController;

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

Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/{id}',[BarangController::class, 'show']);
Route::delete('/barang/{id}', [BarangController::class, 'destroy']);
Route::put('/barang/{id}', [BarangController::class, 'update']);
Route::post('/barang', [BarangController::class, 'store']);



Route::get('/pertanyaan', [PertanyaanController::class, 'index']);
Route::get('/pertanyaan/{id}',[PertanyaanController::class, 'show']);
Route::delete('/pertanyaan/{id}', [PertanyaanController::class, 'destroy']);
Route::put('/pertanyaan/{id}', [PertanyaanController::class, 'update']);
Route::post('/pertanyaan', [PertanyaanController::class, 'store']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'api','prefix'=>'auth'],function($router){
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);
    Route::get('/profile',[AuthController::class,'profile']);
    Route::post('/logout',[AuthController::class,'logout']);

});
