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
    });
});