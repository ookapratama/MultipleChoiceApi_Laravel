<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::group(['prefix' => 'soal','namespace' => 'App\Http\Controllers'],function () {
    Route::get('/', 'SoalController@index')->name('index.soal');
    Route::post('/store', 'SoalController@store')->name('store.soal');
    Route::put('/jawab/{id}', 'SoalController@jawab')->name('jawab.soal');
    Route::get('/edit/{id}', 'SoalController@edit')->name('edit.soal');
    Route::put('/update/{id}', 'SoalController@update')->name('update.soal');
    Route::delete('/destroy/{id}', 'SoalController@destroy')->name('destroy.soal');
});