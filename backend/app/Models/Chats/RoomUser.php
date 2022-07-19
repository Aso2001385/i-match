<?php

namespace App\Models\Chats;

use App\Models\Users\User;
use App\Models\Chats\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Response;
use Exception;

class RoomUser extends Model
{
    use HasFactory,softDeletes;
    protected $table = "room_user";

    protected $fillable = [
        'room_id',
        'user_id',
        'name',
    ];

    public static function create_room_user($request){
        try{
            $room=Room::create_room();
            $name[0]=User::find($request->users[1])->name;
            $name[1]=User::find($request->users[0])->name;

            for($i = 0; $i <2;$i++){ 
                RoomUser::create(['user_id'=>$request->users[$i],'room_id'=>$room->id,'name'=>$name[$i]]);
            }

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

    public static function get_room_user($room_user){
        try{
            $partner_id=RoomUser::where('room_id',$room_user->room_id)->where('user_id','<>',$room_user->user_id)->first()->user_id;
            $room_user->partner_name=User::find($partner_id)->name;
            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }

        return [
            'result' => $room_user,
            'status' => $status
        ];
    }

    public static function update_room_user($room_user,$request){
        try{
            $room_user->update($request->all());

            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        return [
            'result' => $room_user,
            'status' => $status
        ];
    }

    public static function delete_room_user($room_user){
        try{
            $room_user->delete();
            $status=Response::HTTP_OK;
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
