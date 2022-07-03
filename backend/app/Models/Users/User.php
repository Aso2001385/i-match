<?php

namespace App\Models\Users;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Exception;
use Illuminate\Http\Response;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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

    public static function get_user($user){

        try{
            $user_skill = UserSkill::get_skills($user->id);

            if(!$user_skill['success']){
                throw new Exception();
            }
            $user->toArray();
            $user['skills'] = $user_skill['result'];
    
            $status = Response::HTTP_OK;

        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        
        return [
            'result' => $user,
            'status' => $status
        ];
    
    }

    public function update_user($user,$request){
        try{
            // $user=User::find($request->id);

            // $user->class=$request->input('class');
            // $user->name = $request->input('name');

            // $user->save();
            $user->update($request->all());
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        return [
            'result' => $user,
            'status' => $status
        ];
    }

}
