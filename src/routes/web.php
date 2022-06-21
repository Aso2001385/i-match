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
//     // デフォのファイル
    return view('login');
});
// Route::get('/register', function () {
//     // デフォのファイル
//     return view('register');
// });


// Route::get('/{any}', function() {
//     return view('app');
// })->where('any', '.*');
// Auth::routes();

// ログインしていなければlogin画面に変わるようになっている
Auth::routes();
//  ここでログインしているかの確認をしている　　一旦ログイン機能ができるまでコメントアウトにしておく
Route::auth();
// Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('app')->where('any', '.*');

