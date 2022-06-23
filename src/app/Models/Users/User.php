<?php

namespace App\Models\Users;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'class',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function get_user(Request $request){

        try{

            $user = User::where('id',$request->id)->first()->toArray();
            $user_skill = UserSkill::get_skills($request->id);

            if(!$user_skill['success']){
                throw new Exception();
            }

            $user['skills'] = $user_skill['result'];
    
            $status = Response::HTTP_OK;

        }catch(Exception $e){

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
