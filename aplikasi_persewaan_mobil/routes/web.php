<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarManagementController;
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
    return view('login');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'auth']);


Route::get('/registrasiakun', function () {
    return view('registrasi');
});
Route::post('registrasi', [LoginController::class, 'create']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);

    Route::get('/beranda', [CarManagementController::class, 'index'])->middleware('auth')->name('beranda');
    Route::get('/buatsewa', [CarManagementController::class, 'buatsewa'])->middleware('auth')->name('buatsewa');
    Route::post('/tambahsewa', [CarManagementController::class, 'create']);
});




Route::any('{url}', function(){ return redirect('/beranda'); })->where('url', '.*');