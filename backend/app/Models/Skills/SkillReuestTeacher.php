<?php

namespace App\Models\Skills;

use App\Models\Teachers\Teacher;
use App\Models\Skills\SkillRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Http\Response;

class SkillReuestTeacher extends Model
{
    use HasFactory,softDeletes;

    protected $table = "skill_request_teacher";

    protected $fillable = [
        'skill_request_id',
        'skill_id',
        'teacher_id',
    ];

    public static function create_skill_request_teacher($request){
        try{
            SkillReuestTeacher::create($request->all());

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
            'status' => $status
        ];
    }

    public static function get_skill_request_teacher($skill_request_teacher){
        try{
            $skill_request_teacher->skill_request=SkillRequest::find($skill_request_teacher->skill_request_id)->get();
            $skill_request_teacher->teacher_name=Teacher::find($skill_request_teacher->teacher_id)->name;
            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }

        return [
            'result' => $skill_request_teacher,
            'status' => $status
        ];
    }

    public static function update_skill_request_teacher($skill_request_teacher,$request){
        try{
            $skill_request_teacher->update($request->all());

            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }

        return [
            'result' => $skill_request_teacher,
            'status' => $status
        ];
    }

    public static function delete_skill_request_teacher($skill_request_teacher){
        try{
            $skill_request_teacher->delete();

            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }

        return [
            'result' =>[],
            'status' => $status
        ];
    }
}
