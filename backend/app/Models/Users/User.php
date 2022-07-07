<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;

class User extends Model
=======
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
>>>>>>> 537702f581821ece23326b17b78e0f7d999714fb
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

<<<<<<< HEAD
    public static function get_user(Request $request){
=======
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

    public function create_user($request){
        try{
            $request->password = Hash::make($request->password);
            User::create($request->all());

            $result = 'success!';

            $status = Response::HTTP_OK;
>>>>>>> 537702f581821ece23326b17b78e0f7d999714fb

        }catch(Exception $e){
            $result = $e;

            $status = Response::HTTP_BAD_REQUEST;
        }

        return [
            'result' => $result,
            'status' => $status,
        ];
    }

    public static function get_user($user){

        try{
            $user_skill = UserSkill::get_skills($user->id);

            if(!$user_skill['success']){
                throw new \Exception();
            }
            $user->toArray();
            $user['skills'] = $user_skill['result'];
    
            $status = Response::HTTP_OK;

        }catch(\Exception $e){

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

    public function password_update_user($request){
        try{
            $user=User::find($request->id);

            if(!Hash::check($request->old_password,$user->password)){
                throw new Exception();
            }

            $user->password=Hash::make($request->password);

            $user->save();
            $user = User::find($request->id)->toArray();
            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_UNAUTHORIZED
            ];
        }

        return [
            'result' => $user,
            'status' => $status
        ];
    }

    public function delete_user($request){
        try{
            User::find($request->id)->delete();
            $status= Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        return [
            'result' => [],
            'status' => $status
        ];
    }

}
