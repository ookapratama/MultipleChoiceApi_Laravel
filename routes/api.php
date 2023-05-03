<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// CRUD Soal
Route::group(['prefix' => 'soal','namespace' => 'App\Http\Controllers'],function () {
    Route::get('/', 'SoalController@index')->name('index.soal');
    Route::post('/store', 'SoalController@store')->name('store.soal');
    Route::put('/jawab/{id}', 'SoalController@jawab')->name('jawab.soal');
    Route::get('/edit/{id}', 'SoalController@edit')->name('edit.soal');
    Route::put('/update/{id}', 'SoalController@update')->name('update.soal');
    Route::delete('/destroy/{id}', 'SoalController@destroy')->name('destroy.soal');
});

// Show Kategori Soal
Route::group(['prefix' => 'kategori','namespace' => 'App\Http\Controllers'],function () {
    Route::get('/', 'KategoriController@index')->name('index.kategori');
});

// Login/Register
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'cek_login'])->name('cek_login');
// Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/show_user', [UserController::class, 'index']);
// Route::put('/forget_password/{id}', [UserController::class, 'forget_password']);
