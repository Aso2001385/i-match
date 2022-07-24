<?php

namespace App\Models\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use App\Models\Users\User;
use DateTime;
use Exception;
class Token extends Model
{

    protected $table = 'tokens';

    protected $fillable = [
        'id',
        'content',
    ];

    public $incrementing = false;


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

    // トークン再生成
    public static function regeneration($user_id){

        $token = Token::find($user_id);

        if(is_null($token)){
            $token = Token::updateOrCreate(['id'=>$user_id],['content' => Str::random(32)]);
            return ''.$token->id.'|'.$token->content.'|'.$token->updated_at;
        }

        $date_before = $token->updated_at;
        $date_after  = time();
        $interval = floor(($date_after-strtotime($date_before))/60);

        if($interval > 2){
            $token = Token::updateOrCreate(['id'=>$user_id],['content' => Str::random(32)]);
        }

        return ''.$token->id.'|'.$token->content.'|'.$token->updated_at;

    }


}
