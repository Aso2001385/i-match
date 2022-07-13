<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\Token;

class AuthController extends Controller
{

    public function signIn(Request $request){

        $response = Token::authorization($request);

        return response()->json(['result'=>$response['result']],$response['status']);

    }

}