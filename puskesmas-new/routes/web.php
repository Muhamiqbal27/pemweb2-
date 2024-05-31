<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PasienController;



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

Route::get('/beranda', function () {
    return "Halaman Beranda";
});

Route::get('/profil/iqbal', function () {
    return "Halaman profil";
});

Route::get('/salam', function () {
    return "Selamat Datang Iqbal di Laravel 11";
});




//Praktikum Laravel 2
Route::get('/dashboard',[AdminController::class, 'index']);
Route::get('/contact',[ContactController::class, 'index']);
Route::get('/about',[AboutController::class, 'index']);


//Praktikum Laravel 3
Route::get('/dashboard/kelurahan',[KelurahanController::class, 'index']);
Route::get('/dashboard/pasien',[PasienController::class, 'index']);

//Praktikum Laravel 4
Route::get('/dashboard/kelurahan/create',[KelurahanController::class, 'create']);
Route::post('/dashboard/kelurahan/store',[KelurahanController::class, 'store']);
Route::get('/dashboard/kelurahan/show/{id}',[KelurahanController::class, 'show']);

