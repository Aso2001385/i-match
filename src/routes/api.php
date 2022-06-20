<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/ac',[UserController::class,'access']); //T
Route::get('/users', [UserController::class, 'list']); //R
Route::post('/users', [UserController::class, 'store']); //C 
Route::get('/user/{id}',[UserController::class, 'show']); //R
Route::put('/user',[UserController::class, 'update']); // U
Route::delete('/user',[UserController::class, 'delete']); // D

Route::put('/user/password',[UserController::class, 'passwordUpdate']); // U