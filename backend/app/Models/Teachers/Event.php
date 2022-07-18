<?php

namespace App\Models\Teachers;

use App\Models\Teachers\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'title',
        'contents',
        'due',
    ];


    public function create_event($request){
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

    public function get_events($event){
        try{
            $event->toArray();
            $event['teacher']=Teacher::get_teacher($event->teacher_id);
            $status = Response::HTTP_OK;
        }catch(Exception $e){
            $result = $e;

            $status = Response::HTTP_BAD_REQUEST;
        }

        return [
            'result' => $teacher,
            'status' => $status,
        ];
    }

    public function update_event($event,$request){
        try{
            $event->update($request->all());
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
}
