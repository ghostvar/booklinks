<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::get('/login', function () {
    return view('login');
});

// Table Export to Excel
Route::get('/export/kereta/excel', 'ExcelController@exportKereta');
Route::get('/export/stasiun/excel', 'ExcelController@exportStasiun');
Route::get('/export/jurusan/excel', 'ExcelController@exportJurusan');
Route::get('/export/bandara/excel', 'ExcelController@exportBandara');
Route::get('/export/pesawat/excel', 'ExcelController@exportPesawat');
Route::get('/export/penerbangan/excel', 'ExcelController@exportPenerbangan');