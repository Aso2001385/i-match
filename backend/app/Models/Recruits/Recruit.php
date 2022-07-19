<?php

namespace App\Models\Recruits;

use App\Models\Recruits\RecruitUser;
use App\Models\Recruits\RecruitSkill;
use App\Models\Skills\Skill;
use App\Models\Users\User;
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

            $recruit = Recruit::create($request->all());
            $result = 'success!';

            $status = Response::HTTP_OK;

        }catch(Exception $e){

            $result = $e;

            $status = Response::HTTP_BAD_REQUEST;
        }

        return [
            'recruit'=>$recruit,
            'result' => $result,
            'status' => $status,
        ];
    }

    public static function get_user_recruits($request){
        try{
            
        }catch(Example $e){

            $result = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;

        }
        
        return [
            'result' => $recruit,
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

            $recruit=Recruit::with('recruit_users')->find($recruit->id)->with('recruit_skills')->find($recruit->id);
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

}
