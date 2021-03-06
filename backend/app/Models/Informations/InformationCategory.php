<?php

namespace App\Models\Informations;

use App\Models\Informations\Information;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Exception;

class InformationCategory extends Model
{
    use HasFactory,softDeletes;

    protected $table = "information_categories";

    protected $fillable = [
        'name',
    ];

    public static function create_information_category($request){
        try{
            InformationCategory::create($request->all());
            $result='success!';
            $status=Response::HTTP_OK;
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

    public static function update_information_category($information_category,$request){
        try{
            $information_category->update($request->all());

            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }
        return [
            'result' => $information_category,
            'status' => $status,
        ];
    }

    public static function delete_information_category($information_category){
        try{
            $informations=Information::where('category_id',$information_category->id)->whereNull('deleted_at')->get()->toArray();

            $information_category->delete();
            
            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }
        return [
            'result' => [],
            'status' => $status,
        ];
    }
}
