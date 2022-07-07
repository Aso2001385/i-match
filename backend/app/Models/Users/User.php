<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public static function get_user(Request $request){

        try{

            $user = User::where('id',$request->id)->first()->toArray();
            $user_skill = UserSkill::get_skills($request->id);

            if(!$user_skill['success']){
                throw new \Exception();
            }

            $user['skills'] = $user_skill['result'];
    
            $status = Response::HTTP_OK;

        }catch(\Exception $e){

            return [
                'result' => [],
                'stasus' => Response::HTTP_BAD_REQUEST
            ];

        }
        
        return [
            'result' => $user,
            'status' => $status
        ];
    
    }

}
