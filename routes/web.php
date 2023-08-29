<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\HemodialisaController;

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

Route::get('/', [HemodialisaController::class, 'display'])->name('display');
//Login
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Akun
    Route::resource('user',UserController::class);

    //Tempat Tidur
    Route::resource('bed',BedController::class);

    //Manajemen Status
    Route::get('daftarBed', [HemodialisaController::class, 'daftarBed'])->name('hemodialisa.daftarBed');
    Route::post('storeBedUsage', [HemodialisaController::class, 'storeBedUsage'])->name('hemodialisa.storeBedUsage');
    Route::post('bedRelease', [HemodialisaController::class, 'bedRelease'])->name('hemodialisa.bedRelease');
    Route::post('finishUsage', [HemodialisaController::class, 'finishUsage'])->name('hemodialisa.finishUsage');
});

