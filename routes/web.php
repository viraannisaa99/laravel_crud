<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;

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

// Route::get('/', function () {
//     return view('v_home');
// });

// Route::view('/mhs', 'v_mhs');
// Route::view('/nilai', 'v_nilai');

Route::get('/', [HomeController::class, 'index']);
Route::get('/mhs', [MahasiswaController::class, 'index'])->name('mhs');
Route::get('/mhs/show/{id}', [MahasiswaController::class, 'show']);
Route::get('/mhs/create', [MahasiswaController::class, 'create']);
Route::post('/mhs/store', [MahasiswaController::class, 'store']);
Route::get('/mhs/edit/{id}', [MahasiswaController::class, 'edit']);
Route::post('/mhs/update/{id}', [MahasiswaController::class, 'update']);
Route::get('/mhs/destroy/{id}', [MahasiswaController::class, 'destroy']);

Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
Route::get('/dosen/show/{id}', [DosenController::class, 'show']);
Route::get('/dosen/create', [DosenController::class, 'create']);
Route::post('/dosen/store', [DosenController::class, 'store']);
Route::get('/dosen/edit/{id}', [DosenController::class, 'edit']);
Route::post('/dosen/update/{id}', [DosenController::class, 'update']);
Route::get('/dosen/destroy/{id}', [DosenController::class, 'destroy']);