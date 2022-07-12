<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\Token;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    public function signIn(Request $request){

        $response = Token::authorization($request);

        return response()->json(['result'=>$response['result']],$response['status']);

    }

    public function test(Request $request){

        $response = $request->headers->get('X-Auth');

        return response()->json('success',Response::HTTP_OK)->header('x-auth','1|tttttoooookkkkeeennn|2020-12-10 14:30:22');

    }

}