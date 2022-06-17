<?php

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

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/store', [UserController::class, 'store']);
Route::get('/users/{id}',[UserController::class, 'show']);
Route::post('/users/edit',[UserController::class, 'edit']);
Route::put('/users/update',[UserController::class, 'update']);
Route::post('/users/passEdit', [UserController::class, 'passEdit']);
Route::put('/users/passUpdate',[UserController::class, 'passUpdate']);
Route::delete('/users/delete',[UserController::class, 'delete']);
