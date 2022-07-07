<?php

namespace App\Models\Users;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Token extends Model
{

    protected $table = 'tokens';

    protected $fillable = [
        'id',
        'content',
    ];


    //ログイン
    public static function authentication(Request $request){

        try{

            $user = User::where('email',$request->email)->first();
            if (!Hash::check($request->password, $user->password)) return ['result'=>'','status' => Response::HTTP_UNAUTHORIZED,'token' => False];
            $token = Token::createOrUpdate(['id' => $user->id],['id'=>$user->id,'content'=>str_random(32)]);            
            $user = User::get_user($user);

            return [$user=>marge(['token'=> $token->content])];

        }catch(\Exception $e){
            
            return ['result' => '', 'status' => Response::HTTP_UNAUTHORIZED , 'token' => False];     

        }
        
    }

    //認可
    public static function authorization($header){

        try{

            $headers = explode('|',$header['']);
            $user = User::where('email',$request->email)->first();
            if (!Hash::check($request->password, $user->password)) return ['result'=>'','status' => Response::HTTP_UNAUTHORIZED,'token' => False];
            $token = Token::createOrUpdate(['id' => $user->id],['id'=>$user->id,'content'=>str_random(32)]);            
            $user = User::get_user($user);
            return ['result' => '', 'status' => Response::HTTP_UNAUTHORIZED , 'token' => False];
            return [$user=>marge(['token'=> $token->content])];

        }catch(\Exception $e){
            
            return ['result' => '', 'status' => Response::HTTP_UNAUTHORIZED , 'token' => False];     

        }
        
    }


}
