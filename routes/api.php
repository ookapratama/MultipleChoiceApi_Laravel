<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'soal','namespace' => 'App\Http\Controllers'],function () {
    Route::get('/', 'SoalController@index')->name('index.soal');
    Route::post('/store', 'SoalController@store')->name('store.soal');
    Route::put('/jawab/{id}', 'SoalController@jawab')->name('jawab.soal');
    Route::get('/edit/{id}', 'SoalController@edit')->name('edit.soal');
    Route::put('/update/{id}', 'SoalController@update')->name('update.soal');
    Route::delete('/destroy/{id}', 'SoalController@destroy')->name('destroy.soal');
});
