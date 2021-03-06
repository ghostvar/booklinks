<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'cors'], function () { // Handler Cors
    Route::post('/auth/login', 'AuthController@login');
    Route::post('/auth/register', 'AuthController@register');
    Route::group(['middleware' => 'jwt'], function () { // Protected routes

        Route::get('/log', function () {
            return [ 'status' => 'success', 'messages' => 'you are has login!' ];
        });
        
        Route::get('/total', function () {
            return [
                'penerbangan' => App\Penerbangan::get()->count(),
                'bandara' => App\Bandara::get()->count(),
                'pesawat' => App\Pesawat::get()->count(),
                'kereta' => App\Kereta::get()->count(),
                'rute' => App\RuteKereta::get()->count(),
                'stasiun' => App\Stasiun::get()->count(),
                'pelanggan' => App\Pelanggan::get()->count(),
                'admin' => App\User::get()->count()
            ];
        });

        // Costumer Routes
        Route::get('/pelanggan', 'CostumerController@getAllCostumers');
        Route::post('/pelanggan', 'CostumerController@insertCostumer');
        Route::put('/pelanggan', 'CostumerController@updateCostumer');
        Route::delete('/pelanggan/{id}', 'CostumerController@deleteCostumer');

        // Trains Routes
        Route::get('/kereta', 'KeretaController@getTrains');
        Route::post('/kereta', 'KeretaController@insertTrain');
        Route::put('/kereta', 'KeretaController@updateTrain');
        Route::delete('/kereta/{id}', 'KeretaController@deleteTrain');

        // Tarif Kereta Routes
        Route::get('/kereta/tarif', 'KeretaController@getAllTarif');

        // Stasiun Routes
        Route::get('/stasiun', 'KeretaController@getStasiun');
        Route::post('/stasiun', 'KeretaController@insertStasiun');
        Route::put('/stasiun', 'KeretaController@updateStasiun');
        Route::delete('/stasiun/{id}', 'KeretaController@deleteStasiun');

        // Jurusan Kereta Routes
        Route::get('/jurusan', 'KeretaController@getAllJurusan');
        Route::post('/jurusan', 'KeretaController@insertJurusan');
        Route::put('/jurusan', 'KeretaController@updateJurusan');
        Route::delete('/jurusan/{id}', 'KeretaController@deleteJurusan');

        // Bandara Route
        Route::get('/bandara', 'PenerbanganController@getAllBandara');
        Route::post('/bandara', 'PenerbanganController@insertBandara');
        Route::put('/bandara', 'PenerbanganController@updateBandara');
        Route::delete('/bandara/{id}', 'PenerbanganController@deleteBandara');

        // Pesawat Route
        Route::get('/pesawat', 'PenerbanganController@getAllPesawat');
        Route::post('/pesawat', 'PenerbanganController@insertPesawat');
        Route::put('/pesawat', 'PenerbanganController@updatePesawat');
        Route::delete('/pesawat/{id}', 'PenerbanganController@deletePesawat');

        // Penerbangan Route
        Route::get('/penerbangan', 'PenerbanganController@getAllPenerbangan');
        Route::post('/penerbangan', 'PenerbanganController@insertPenerbangan');
        Route::put('/penerbangan', 'PenerbanganController@updatePenerbangan');
        Route::delete('/penerbangan/{id}', 'PenerbanganController@deletePenerbangan');

        // Pemesanan Route
        Route::get('/pemesanan', 'CostumerController@getAllPemesanan');
    });
});