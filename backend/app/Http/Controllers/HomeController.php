<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Cookie;

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
        // $user = Auth::user()->name;
        // $user_email = \Auth::user()->email;
        // $script = "<script> sessionStorage.setItem('user','$user') </script>";
        // $script_email = "<script> sessionStorage.setItem('user_email','$user_email') </script>";
        // echo $script;
        // echo $script_email;
        
        // return view('home');
        return view('app');
    }
    // ここの書き換え
}
