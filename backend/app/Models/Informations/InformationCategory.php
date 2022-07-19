<?php

namespace App\Models\Informations;

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
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
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
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        return [
            'result' => $information_category,
            'status' => $status,
        ];
    }

    public static function delete_information_category($information_category){
        try{
            $information_category->delete();
            
            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        return [
            'result' => [],
            'status' => $status,
        ];
    }
}
