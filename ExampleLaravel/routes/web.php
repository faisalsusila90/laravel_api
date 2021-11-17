<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;

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
//     return view('welcome');
// });

Route::get('/',[UserController::class, 'index'])->name('login');
Route::post('register',[UserController::class, 'store']);
Route::post('login',[UserController::class, 'login']);
Route::get('logout',[UserController::class, 'logout']);
Route::get('home',[HomeController::class, 'index'])->middleware('auth');
Route::post('create_pegawai',[PegawaiController::class, 'store'])->middleware('auth');
Route::post('create_pegawai',[PegawaiController::class, 'store'])->middleware('auth');
Route::put('edit_pegawai/{id}',[PegawaiController::class, 'update'])->middleware('auth');
Route::get('delete_pegawai/{id}',[PegawaiController::class, 'destroy'])->middleware('auth');
