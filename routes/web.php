<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/login', 'auth\authcontroller@getlogin');
Route::post('/login', 'auth\authcontroller@postlogin');
Route::get('/dashboard', 'homecontroller@dashboard');

Route::get('/printDaftarHadir/{id}', 'API\Dosen\PrintController@printDaftarHadir');
Route::get('/printBerita/{id}', 'API\Dosen\PrintController@cetakBerita');