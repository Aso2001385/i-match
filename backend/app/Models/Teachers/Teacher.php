<?php

namespace App\Models\Teachers;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Models\Teachers\Event;
use Illuminate\Http\Response;
use Exception;

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,softDeletes;

    protected $fillable = [
        'class',
        'name',
        'email',
        'password',
    ];

    protected $hidden =[
        'password',
        'remember_token',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public static function create_teacher($request){
        try{

            // $password = Hash::make($request->password);
            // unset($request->password);
            // $request['password'] = $password;
            $request['password']=Hash::make($request->password);
            Teacher::create($request->all());
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

    public static function get_teacher($teacher) {
        try{
            $teacher=Teacher::with('events')->find($teacher->id);

            $status= Response::HTTP_OK;
        }catch(Exception $e){
            $result = $e;

            $status = Response::HTTP_BAD_REQUEST;
        }

        return [
            'result' => $teacher,
            'status' => $status,
        ];
    }

    public static function update_teacher($teacher,$request){
        try{
            $teacher->update($request->all());
            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        return [
            'result' => $teacher,
            'status' => $status
        ];
    }

    public static function password_update_teacher($teacher,$request){
        try{
            $teacher=Teacher::find($request->id);

            if(!Hash::check($request->old_password,$teacher->password)){
                throw new Exception();
            }

            $teacher->password=Hash::make($request->password);

            $teacher->save();
            $result = 'success!';
            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_UNAUTHORIZED
            ];
        }

        return [
            'result' => $result,
            'status' => $status
        ];
    }

    public static function delete_teacher($teacher){
        try{
            $events=Event::where('teacher_id',$teacher->id)->get();
            foreach($events as $event){
                Event::delete_event($event);
            }
            $teacher->delete();
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
