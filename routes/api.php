<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\GoldController;
use App\Http\Controllers\CuciController;
use App\Http\Controllers\LampuController;
use App\Http\Controllers\PdamController;
use App\Http\Controllers\WalletController;


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
    Route::put('/update/{id}', [AuthController::class, 'update']);
});
Route::post('sendNotificationrToUser/{id}', [AuthController::class, 'sendNotificationrToUser']);



Route::get('/pesan', [PesanController::class, 'index']);
//Route::get('/pesan/{id}', [PesanController::class, 'show']);
Route::delete('/pesan/{id}', [PesanController::class, 'destroy']);
Route::post('/pesan', [PesanController::class, 'store']);

Route::get('/gold', [GoldController::class, 'index']);
//Route::get('/pesan/{id}', [PesanController::class, 'show']);
Route::delete('/gold/{id}', [GoldController::class, 'destroy']);
Route::post('/gold', [GoldController::class, 'store']);


Route::get('/cuci', [CuciController::class, 'index']);
Route::delete('/cuci/{id}', [CuciController::class, 'destroy']);
Route::post('/cuci', [CuciController::class, 'store']);


Route::get('/lampu', [LampuController::class, 'index']);
Route::delete('/lampu/{id}', [LampuController::class, 'destroy']);
Route::post('/lampu', [LampuController::class, 'store']);


Route::get('/pdam', [PdamController::class, 'index']);
Route::delete('/pdam/{id}', [PdamController::class, 'destroy']);
Route::post('/pdam', [PdamController::class, 'store']);


Route::get('/wallet', [WalletController::class, 'index']);
Route::delete('/wallet/{id}', [WalletController::class, 'destroy']);
Route::post('/wallet', [WalletController::class, 'store']);