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

    public static function add_user($room_id,$user_id,$room_name){
        try{

            RoomUser::create([
                'room_id' => $room_id,
                'user_id' => $user_id,
                'room_name' => $room_name
            ]);

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
            'status' => $status,
        ];
    }

    public static function get_room_user($room_user){
        try{
            $partner_ids=RoomUser::where('room_id',$room_user->room_id)->where('user_id','<>',$room_user->user_id)->whereNull('deleted_at')->get()->toArray();

            if(count($partner_ids)>0){
                for($i=0;$i<count($partner_ids);$i++){
                    $room_user->partner_names[$i]=User::find($partner_ids[$i])->name;
                }
            }

            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
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
                'result' => $e,
                'status' => $e->getCode()
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
