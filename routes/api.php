<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\EmasController;
use App\Http\Controllers\CuciController;

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
Route::get('/barang/{id}', [BarangController::class, 'show']);
Route::delete('/barang/{id}', [BarangController::class, 'destroy']);
Route::put('/barang/{id}', [BarangController::class, 'update']);
Route::post('/barang', [BarangController::class, 'store']);



Route::get('/pertanyaan', [PertanyaanController::class, 'index']);
Route::get('/pertanyaan/{id}', [PertanyaanController::class, 'show']);
Route::delete('/pertanyaan/{id}', [PertanyaanController::class, 'destroy']);
Route::put('/pertanyaan/{id}', [PertanyaanController::class, 'update']);
Route::post('/pertanyaan', [PertanyaanController::class, 'store']);


// tabungan

//Route api 
Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::get('/tabungan/show', [TabunganController::class, 'index']);
    Route::post('/tabungan/store', [TabunganController::class, 'store']);
});

// insert tabungan





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::post('/register', [AuthController::class, 'register']);
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::post('sendNotificationrToUser/{id}', [AuthController::class, 'sendNotificationrToUser']);



Route::get('/pesan', [PesanController::class, 'index']);
//Route::get('/pesan/{id}', [PesanController::class, 'show']);
Route::delete('/pesan/{id}', [PesanController::class, 'destroy']);
Route::post('/pesan', [PesanController::class, 'store']);

Route::get('/emas', [EmasController::class, 'index']);
//Route::get('/pesan/{id}', [PesanController::class, 'show']);
Route::delete('/emas/{id}', [EmasController::class, 'destroy']);
Route::post('/emas', [EmasController::class, 'store']);


Route::get('/cuci', [CUciController::class, 'index']);

Route::delete('/cuci/{id}', [CuciController::class, 'destroy']);

Route::post('/cuci', [CuciController::class, 'store']);
