<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SkillCategory extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'name',
    ];

    public function skills()
    {
        return $this->hasMany('App\Models\Skills\Skill');
    }


    public static function create_skill_category($request){
        try{
            SkillCategory::create($request->all());
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

    public static function update_skill_category($skill_category,$request){
        try{
            $skill_category->update($request->all());
            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }
        return [
            'result' => $skill_category,
            'status' => $status
        ];
    }

    public static function delete_skill_category($skill_category){
        try{
            $skills=Skill::where('category_id',$skill_category->id)->get();
            foreach($skills as $skill){
                Skill::delete_skill($skill);
            }
            $skill_category->delete();
            
            $status = Response::HTTP_OK;
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
}
