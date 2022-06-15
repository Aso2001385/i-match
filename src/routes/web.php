<?php

use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// のちにログイン中かどうかで表示するページを変えるようにする
Route::get('/login', function () {
    // デフォのファイル
    return view('login');
});
Route::get('/register', function () {
    // デフォのファイル
    return view('register');
});


Route::get('/{any}', function() {
    return view('app');
})->where('any', '.*');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

