<?php

namespace App\Models\Teachers;

use App\Models\Teachers\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Exception;

class Event extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'teacher_id',
        'title',
        'contents',
        'due',
    ];


    public static function create_event($request){
        try{
            Event::create($request->all());
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

    public static function get_events($event){
        try{
            $teacher=Teacher::find($event->teacher_id);
            $event->name=$teacher->name;
            $status = Response::HTTP_OK;
        }catch(Exception $e){
            $result = $e;

            $status = Response::HTTP_BAD_REQUEST;
        }

        return [
            'result' => $event,
            'status' => $status,
        ];
    }

    public static function update_event($event,$request){
        try{
            $event->update($request->all());

            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        return [
            'result' => $event,
            'status' => $status
        ];
        
    }

    public static function delete_event($event){
        try{
            $event->delete();

            $status = Response::HTTP_OK;
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
