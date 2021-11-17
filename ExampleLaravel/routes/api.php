<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware => auth:sanctum'], function(){
//     Route::get('/form',[FormController::class,'index'])->middleware(['auth:sanctum', 'ability:check-status,place-orders']);
// });

//Route::middleware('auth:sanctum')->get('/form', [FormController::class,'index']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/form',[FormController::class,'index']);
    Route::get('/pegawai',[FormController::class,'search']);
    Route::post('/form/create',[FormController::class,'new']);
    Route::post('/contacts',[FormController::class,'post']);
    Route::get('/contacts',[FormController::class,'view']);
});

Route::post('/login',[AuthController::class, 'login']);
Route::post('/create',[AuthController::class, 'create']);