<?php

namespace App\Models\Informations;

use App\Models\Users\User;
use App\Models\Informations\InformationCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Exception;

class Information extends Model
{
    use HasFactory,softDeletes;

    protected $table = "informations";

    protected $fillable = [
        'user_id',
        'title',
        'contents',
        'read',
        'category_id',
        'url',
    ];

    public function category()
    {
        return $this->hasMany(InformationCategory::class);
    }

    public static function create_information($request){
        try{

            $recruit = Information::create($request->all());
            $result = 'success!';

            $status = Response::HTTP_OK;

        }catch(Exception $e){

            $result = $e;

            $status = Response::HTTP_BAD_REQUEST;
        }

        return [
            'result' => $result,
            'status' => $status,
        ];
    }

    public static function get_information($information){
        try{
            $information->category_name=InformationCategory::find($information->category_id)->name;
            $information->user_name=User::find($information->user_id)->name;
            $status=Response::HTTP_OK;
        }catch(Example $e){

            $result = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;

        }
        
        return [
            'result' => $information,
            'status' => $status,
        ];
    }

    public static function update_information($information,$request){
        try{
            $information->update($request->all());
            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }           

        return [
            'result' => $information,
            'status' => $status
        ];
    }

    public static function delete_information($information){
        try{
            $information->delete();
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
