<?php

namespace App\Models\Users;

use App\Models\Recruits\Recruit;
use App\Models\Users\UserSkill;
use App\Models\Skills\Skill;
use App\Models\Chats\RoomUser;
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
        'password',
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
        'remember_token',
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_skills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public function skills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public static function index_user(){
        try{
            $users=User::all()->toArray();

            foreach($users as $user){
                $user->skills=UserSkill::where('user_id',$user->id)->whereNull('deleted_at')->get()->toArray();
            }
        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }

        return [
            'result' => $users,
            'status' => $status,
        ];
    }


    public static function create_user($request){
        try{
            $request['password'] = Hash::make($request->password);
            $result =  User::create($request->all());
            $status = Response::HTTP_OK;
            if(isset($result->id)){
                session(['user_id'=>$result->id]);
            }else{
                abort(403);
            }
        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
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
                'result' => $e,
                'status' => $e->getCode()
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
                'result' => $e,
                'status' => $e->getCode()
            ];

        }
        return [
            'result' => $user,
            'status' => $status
        ];
    }

    public static function password_update_user($user,$request){
        try{
            $user=User::find($request->id);
            if(!Hash::check($request->old_password,$user->password)){
                abort(401);
            }
            $user->password=Hash::make($request->password);;
            $user->save();
            $result = 'success!';
            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];
        }

        return [
            'result' => $result,
            'status' => $status
        ];
    }

    public static function delete_user($user){
        try{
            $recruits= Recruit::where('user_id',$user->id)->whereNull('deleted_at')->get()->toArray();
            date_default_timezone_set("Asia/Tokyo");
            $today=date("Y-m-d H:i:s");
            if(count($recruits)>0){
                foreach($recruits as $recruit){
                    if($today<=$recruit->due){
                        Recruit::delete_recruit($recruit);

                    }
                }
            }
            
            $room_users=RoomUser::where('user_id',$user->id)->whereNull('deleted_at')->get()->toArray();
            if(count($room_users)>0){
                foreach($room_users as $user){
                    RoomUser::delete_room_user($user);
                }
            }

            $user_skills=UserSkill::where('user_id',$user->id)->whereNull('deleted_at')->get()->toArray();
            if(count($user_skills)>0){
                foreach($user_skills as $user_skill){
                    UserSkill::delete_skill($user_skill);
                }
            }
            $user->delete();
            $status= Response::HTTP_OK;

        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }
        return [
            'result' => [],
            'status' => $status
        ];
    }

    public static function userSkillSearch($users,$user_id)
    {

        try{
            $user = User::with([
                'skills'=> function ($query){
                    $query->select('user_skill.*','skills.name','skills.category_id')->join('skills', 'skill_id', '=', 'skills.id');
                },
            ])->whereIn('id',UserSkill::select('user_id')
                ->whereIn('skill_id',array_map(function($v){
                    return $v['id'];
                },$users))->get()
            )->where('user_id','<>',$user_id)->get()->toArray();

            if(count($user)==0){
                return[
                    'result' => '見つかりませんでした',
                    'status' =>200
                ];
            }

            return [
                'result' => $user,
                'status' => 200
            ];
        }catch(Exception $e){
            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }
    }
}
