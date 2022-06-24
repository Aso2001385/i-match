<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// データベースができたらコメントを外す
// use Illuminate\Support\Facades\Auth;
// $user = Auth::user();
// $id = Auth::id();

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    //  ここでログインしているかの確認をしている　　一旦ログイン機能ができるまでコメントアウトにしておく
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        return view('app');
    }
    // ここの書き換え
}
