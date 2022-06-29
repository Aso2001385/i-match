<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD:src/app/Http/Controllers/HomeController.php
=======
// use Illuminate\Support\Facades\Auth;
// use Cookie;
>>>>>>> origin/develop:backend/app/Http/Controllers/HomeController.php

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD:src/app/Http/Controllers/HomeController.php
        return view('home');
=======
        // $user = Auth::user()->name;
        // $user_email = \Auth::user()->email;
        // $script = "<script> sessionStorage.setItem('user','$user') </script>";
        // $script_email = "<script> sessionStorage.setItem('user_email','$user_email') </script>";
        // echo $script;
        // echo $script_email;
        
        // return view('home');
        return view('app');
>>>>>>> origin/develop:backend/app/Http/Controllers/HomeController.php
    }
}
