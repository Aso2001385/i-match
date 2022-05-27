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
// 下記使わないかも
// Route::get('/signup', function () {
//     return view('signup');
// });
// // 値渡しを行っている
// Route::post('/signupConfirmation', [SignupConfirmation::class, 'write'])->name('signupConfirmation.write');
// // ユーザー登録
// Route::post('/signupComp', [SignupConfirmation::class, 'userSave'])->name('signupComp.userSave');

Route::get('/register', function () {
    // デフォのファイル
    return view('register');
});
Route::get('/{any}', function() {
    return view('app');
})->where('any', '.*');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

