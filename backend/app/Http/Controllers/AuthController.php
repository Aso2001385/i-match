<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\Token;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    // ログイン
    public function login(Request $request){

        $response = Token::authentication($request);

        return response()->json(['result'=>$response['result']],$response['status']);

    }

    // 復元
    public function restore(Request $request){

        if(!Token::authorization($request)) return response()->json('',Response::HTTP_UNAUTHORIZED);

        $response =  explode('|',$request->headers->get('X-Auth'));

        $token = $response['token'][0].'|'.$response['token'][1].'|'.$response['token'][2];

        return response()->json($response['user'],Response::HTTP_OK)->header('x-auth',$token);

    }

}

