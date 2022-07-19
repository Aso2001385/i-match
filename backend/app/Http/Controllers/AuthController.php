<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Skills\Skill;
use App\Models\Users\Token;
use App\Models\Users\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{

    // ログイン
    public function login(Request $request){

        try{

            $user = User::where('email',$request->email)->first();
            session(['user_id' => $user['id']]);
            if (!(Hash::check($request->password, $user->password))) throw new Exception;
            $user = User::get_user($user)['result'];
            $skills = Skill::get_skills()['result'];
            $response = [
                'user' => $user,
                'skills' => $skills
            ];

        }catch(Exception $e){
            return response()->json($e,404);
        }
        return response()->json($response,200);
    }

    // 復元
    public function restore(Request $request){

        $response =  explode('|',$request->headers->get('X-Auth'));

        $user = User::get_user(User::find($response[0]))['result'];
        $skills = Skill::get_skills()['result'];
        $response = [
            'user' => $user,
            'skills' => $skills
        ];
        return response()->json( $response,Response::HTTP_OK);

    }

}

