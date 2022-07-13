<?php

namespace App\Models\Users;

use App\Models\Users\UserSkill;
use App\Models\Skills\Skill;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Exception;

class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable,softDeletes;

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

    // public function user_skills()
    // {
    //     return $this->belongsToMany(Skill::class, 'user_skill', 'user_id', 'skill_id');
    // }

    public function user_skills()
    {
        return $this->hasMany(UserSkill::class);
    }


    public static function create_user($request){
        try{
            $request['password'] = Hash::make($request->password);
            User::create($request->all());

            $result = 'success!';

            $status = Response::HTTP_OK;

        }catch(Exception $e){
            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];
        }

        return [
            'result' => $result,
            'status' => $status,
        ];
    }

    public static function get_user($user){

        try{
            $user=User::with('user_skills')->find($user->id);
            $status=Response::HTTP_OK;

            if(isset($user->user_skills)){
                foreach($user->user_skills as $user_skill){
                    $skill=Skill::where("id",$user_skill->skill_id)->select("name","category_id")->first();
                    $user_skill->name=$skill->name;
                    $user_skill->category_id=$skill->category_id;
                }
                unset($skill_id);
            }

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

    public static function update_user($user,$request){
        try{
            $user->update($request->all());
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

    public static function password_update_user($user,$request){
        $user=User::find($request->id);
        try{
            if(!Hash::check($request->old_password,$user->password)){
                throw new Exception();
            }
            $request->password = Hash::make($request->password);
            $user->password=$request->input('password');
            $user->save();
            $result = 'success!';
            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_UNAUTHORIZED
            ];
        }

        return [
            'result' => $result,
            'status' => $status
        ];
    }

    public static function delete_user($user){
        try{
            $user->delete();
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
