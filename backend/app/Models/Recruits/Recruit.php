<?php

namespace App\Models\Recruits;

use App\Models\Chats\Room;
use App\Models\Chats\RoomUser;
use App\Models\Recruits\RecruitUser;
use App\Models\Recruits\RecruitSkill;
use App\Models\Users\UserSkill;
use App\Models\Skills\Skill;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Exception;

class Recruit extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'user_id',
        'room_id',
        'title',
        'contents',
        'purpose',
        'persons',
        'due',
    ];
    public function users()
    {
        return $this->hasMany(RecruitUser::class);
    }

    public function skills()
    {
        return $this->hasMany(RecruitSkill::class);
    }

    public static function create_recruits($request){

        try{

            $room = Room::create();

            $recruit = Recruit::create([
                'user_id' => $request->user_id,
                'room_id' => $room->id,
                'title' =>$request->title,
                'contents' => $request->contents,
                'purpose'=>$request->purpose,
                'persons'=>$request->persons,
                'due'=>$request->due
            ]);

            RoomUser::create([
                'room_id' => $room->id,
                'user_id' => $request->user_id,
                'name' => $request->title
            ]);

            $insert_check = RecruitSkill::bulk_insert_skills($request->skills,$recruit->id);

            if(!$insert_check['result']) throw new Exception($insert_check['result']);

            $result = [
                'room_id' => $room->id,
                'recruit_id' => $recruit->id,
                'name' => $request['title']
            ];

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

    public static function get_other_recruits($id){

        try{

            $recruits = Recruit::with([
                'users' => function ($query) {
                    $query->select('recruit_user.*','users.name')
                    ->join('users','recruit_user.user_id','users.id');
                },
                'skills' => function ($query) {
                    $query->select('recruit_skill.*','skills.category_id','skills.name','skill_categories.name as category_name')
                    ->join('skills','recruit_skill.skill_id','skills.id')
                    ->join('skill_categories','skills.category_id','skill_categories.id');
                }
            ])->where('user_id','<>',$id)->orderby('created_at','desc')->get();


        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }

        return [
            'result' => $recruits,
            'status' => 200,
        ];

    }

    public static function get_recruit($recruit_model){

        try{

            $recruit = Recruit::with(['users','skills'=>function($query){
                $query->select('recruit_skill.*','skills.name','skills.category_id','skill_categories.name as category_name')
                    ->join('skills','recruit_skill.skill_id','=','skills.id')
                    ->join('skill_categories','skills.category_id','=','skill_categories.id');
            }])->find($recruit_model->id);

            $status = Response::HTTP_OK;

        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }

        return [
            'result' => $recruit,
            'status' => $status,
        ];

    }

    public static function update_recruit($recruit,$request)
    {
        try{
            $recruit->update($request->all());
            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }

        return [
            'result' => $recruit,
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

    public static function get_history($user_id){

        try{
            $recruit = Recruit::with([
                'skills'=> function ($query){
                    $query->select('recruit_skill.*','skills.name','skills.category_id')->join('skills', 'skill_id', '=', 'skills.id');
                },
                'users'=> function ($query){
                    $query->select('recruit_user.*','users.name')->join('users', 'user_id', '=', 'users.id');
                },
            ])->whereIn('id',RecruitUser::select('recruit_id as id')->where('user_id',$user_id)->get())->get();
            return [
                'result' => $recruit,
                'status' => 200
            ];
        }catch(Exception $e){
            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }
    }

    public static function skillSearch($skills,$user_id)
    {

        try{
            $recruit = Recruit::with([
                'skills'=> function ($query){
                    $query->select('recruit_skill.*','skills.name','skills.category_id')->join('skills', 'skill_id', '=', 'skills.id');
                },
                'users'=> function ($query){
                    $query->select('recruit_user.*','users.name')->join('users', 'user_id', '=', 'users.id');
                },
            ])->whereIn('id',RecruitSkill::select('recruit_id')
                ->whereIn('skill_id',array_map(function($v){
                    return $v['id'];
                },$skills))->get()
            )->where('user_id','<>',$user_id)->get()->toArray();

            if(count($recruit)==0){
                return[
                    'result' => '見つかりませんでした',
                    'status' =>200
                ];
            }

            return [
                'result' => $recruit,
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
