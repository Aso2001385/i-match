<?php

namespace App\Models\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Users\User;

class Token extends Model
{

    protected $table = 'tokens';

    protected $fillable = [
        'id',
        'content',
    ];

    public $incrementing = false;

    //ログイン
    public static function authentication(Request $request){

        try{

            $user = User::where('email',$request->email)->first();
            if (!Hash::check($request->password, $user->password)) return ['result'=>'','status' => Response::HTTP_UNAUTHORIZED,'token' => False];
            $token = Token::createOrUpdate(['id' => $user->id],['id'=>$user->id,'content'=>Str::random(32)]);
            $user = User::get_user($user);

            return [
                'result' => [
                    'user' => $user['result'],
                    'token' => $token
                ],
                'status' => Response::HTTP_UNAUTHORIZED ,
            ];

        }catch(\Exception $e){

            return ['result' => '', 'status' => Response::HTTP_UNAUTHORIZED];

        }

    }

    //認可
    public static function authorization(Request $request){

        try{

            $tokens = explode('|',$request->headers->get('X-Auth'));

            $token = Token::find($tokens[0]);

            if($tokens[1] !== $token->content) return false;

            return true;

        }catch(\Exception $e){

            return False;

        }

    }

    public static function regeneration($user_id){

        $token = Token::updateOrCreate(['id'=>$user_id],['content' => Str::random(32)]);

        return ''.$token->id.'|'.$token->content.'|'.$token->updated_at;

    }


}
