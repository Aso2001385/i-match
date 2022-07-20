<?php

namespace App\Models\Recruits;

use App\Models\Recruits\RecruitUser;
use App\Models\Recruits\RecruitSkill;
use App\Models\Skills\Skill;
use App\Models\Users\User;
use App\Models\Chats\Room;
use App\Models\Chats\RoomUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Example;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Exception;

class Recruit extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'user_id',
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
            $recruit = Recruit::create($request->all()->concat(['room_id'=>$room->id]));
            RoomUser::add_user($room->id,$recruit['user_id'],$recruit->title);

            $result = 'success!';

            $status = Response::HTTP_OK;

        }catch(Exception $e){

            $result = $e;

            $status = Response::HTTP_BAD_REQUEST;
        }

        return [
            'recruit'=> $recruit,
            'result' => $result,
            'status' => $status,
        ];
    }

    public static function get_other_recruits($request,$id){

        try{
            $recruits=Recruit::where('user_id','<>',$id)->whereNull('deleted_at')->get();
            foreach($recruits as $rec){
                $rec->name=User::find($rec->user_id)->name;
            }
            $status = Response::HTTP_OK;

        }catch(Example $e){

            $result = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;

        }

        return [
            'result' => $recruits,
            'status' => $status,
        ];

    }

    public static function get_recruit($recruit){

        try{

            $recruit=Recruit::with('users')->find($recruit->id)->with('skills')->find($recruit->id);
            $recruit->user_name=User::find($recruit->user_id)->name;

            if(isset($recruit->recruit_users)){
                $recruit->member=RecruitUser::where('recruit_id',$recruit->id)->whereNull('deleted_at')->count();
                foreach($recruit->recruit_users as $user){
                    $users=User::where('id',$user->user_id)->whereNull('deleted_at')->select('name')->first();
                    $user->name=$users->name;
                }
                unset($user);
            }

            if(isset($recruit->recruit_skills)){
                foreach($recruit->recruit_skills as $skill){
                    $skills=Skill::where('id',$skill->skill_id)->whereNull('deleted_at')->select('name','category_id')->first();
                    $skill->name=$skills->name;
                    $skill->category_id=$skills->category_id;
                }
                unset($skill);
            }

            $status = Response::HTTP_OK;

        }catch(Example $e){

            $result = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;

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
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }

        return [
            'result' => $recruit,
            'status' => $status
        ];
    }

    public static function delete_recruit($recruit){
        try{
            $recruit_users=RecruitUser::where('recruit_id',$recruit->id)->whereNull('deleted_at')->get();
            $recruit_skills=RecruitSkill::where('recruit_id',$recruit->id)->whereNull('deleted_at')->get();
            foreach($recruit_skills as $skill){
                RecruitSkill::delete_recruit_skill($skill);
            }
            foreach($recruit_users as $user){
                RecruitUser::delete_recruit_user($user);
            }
            $recruit->delete();
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
                'status' => 400
            ];

        }
    }

    public static function skillSearch($request)
    {

        try{
            $array = $request;
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
                },$array))->get()
            )->get();

            return [
                'result' => $recruit,
                'status' => 200
            ];
        }catch(Exception $e){
            return [
                'result' => $e,
                'status' => 400
            ];

        }
    }

}
