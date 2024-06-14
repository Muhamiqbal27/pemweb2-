<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('dashboard')->group(function () {
        Route::get('/',[AdminController::class, 'index']);

        // Kelurahan
        Route::prefix('kelurahan')->group(function () {
            Route::get('/',[KelurahanController::class, 'index']);
            Route::get('/create',[KelurahanController::class, 'create']);
            Route::post('/store',[KelurahanController::class, 'store']);
            Route::get('/show/{id}',[KelurahanController::class, 'show']);
        });        

        // Pasien
        Route::prefix('pasien')->group(function () {
            Route::get('/',[PasienController::class, 'index']);
            Route::get('/create',[PasienController::class, 'create']);
            Route::post('/store',[PasienController::class, 'store']);
            Route::get('/show/{id}',[PasienController::class, 'show']);

        });


    });

});

require __DIR__.'/auth.php';

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
//Route::get('/dashboard',[AdminController::class, 'index']);
Route::get('/contact',[ContactController::class, 'index']);
Route::get('/about',[AboutController::class, 'index']);


//Praktikum Laravel 3
//Route::get('/dashboard/kelurahan',[KelurahanController::class, 'index']);
//Route::get('/dashboard/pasien',[PasienController::class, 'index']);

//Praktikum Laravel 4
//Route::get('/dashboard/kelurahan/create',[KelurahanController::class, 'create']);
//Route::post('/dashboard/kelurahan/store',[KelurahanController::class, 'store']);
//Route::get('/dashboard/kelurahan/show/{id}',[KelurahanController::class, 'show']);

//Tugas Laravel 4
//Route::get('/dashboard/pasien/create',[PasienController::class, 'create']);
//Route::post('/dashboard/pasien/store',[PasienController::class, 'store']);
//Route::get('/dashboard/pasien/show/{id}',[PasienController::class, 'show']);