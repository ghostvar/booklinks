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

Route::group(['middleware' => 'cors'], function () {
    Route::post('/auth/login', 'AuthController@login');
    Route::post('/auth/register', 'AuthController@register');
    Route::group(['middleware' => 'jwt'], function () {
        // Protected routes
        // Costumer Routes
        Route::get('/pelanggan', 'CostumerController@getAllCostumers');
        Route::post('/pelanggan', 'CostumerController@insertCostumer');
        Route::put('/pelanggan', 'CostumerController@updateCostumer');
        Route::delete('/pelanggan/{id}', 'CostumerController@deleteCostumer');
    });
});