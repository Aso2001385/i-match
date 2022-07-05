<?php

namespace App\Models\Teachers;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function create_teacher($request){
        try{

            $request->password = Hash::make($request->password);
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

    public function get_teacher($teacher_id) {
        try{
            $teacher=Teacher::find($teacher_id);
        }catch(Exception $e){
            $result = $e;

            $status = Response::HTTP_BAD_REQUEST;
        }

        return [
            'result' => $teacher,
            'status' => $status,
        ];
    }

    public function update_teacher($teacher,$request){
        try{
            $teacher->update($request->all());
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

    public function password_update_teacher($request){
        try{
            $teacher=Teacher::find($request->id);

            if(!Hash::check($request->old_password,$user->password)){
                throw new Exception();
            }

            $teacher->password=Hash::make($request->password);

            $teacher->save();
            $teacher = Teacher::find($request->id)->toArray();
            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_UNAUTHORIZED
            ];
        }

        return [
            'result' => $teacher,
            'status' => $status
        ];
    }
}
