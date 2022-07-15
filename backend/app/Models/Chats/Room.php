<?php

namespace App\Models\Chats;

use App\Models\Chats\RoomUser;
use App\Models\Chats\Chat;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Exception;

class Room extends Model
{
    use HasFactory;

    public function room_users(){
        return $this->hasMany(RoomUser::class);
    }

    public function chats(){
        return $this->hasMany(Chat::class);
    }

    public static function create_room(){
        try{
            $room=Room::create();
        }catch(Exception $e){
            return false;
        }

        return $room;
    }

    public static function get_room($room){
        try{
            $room_user=RoomUser::where('room_id',$room->id)->get();
            $room->chats=Chat::where('room_id',$room->id)->get();
            
            foreach($room->room_users as $user) {
                $partner_user=RoomUser::where('user_id','<>',$user->user_id)->where('room_id',$user->room_id)->get()->first();

                $user->partner_name=User::find($partner_user->user_id)->name;
            }

            foreach($room->chats as $chat) {
                $chat->user_name=User::find($chat->user_id)->name;
            }
            $status= Response::HTTP_OK;
        }catch(Exception $e){
    
            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];
    
        }
            
        return [
            'result' => $room,
            'status' => $status
        ];
    }

    public static function delete_room($room){
        try{
            $room->delete();
            $status=Response::HTTP_OK;
        }catch(Exception $e){
    
            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];
    
        }
    
        return [
            'result' => $room,
            'status' => $status
        ];

    }
}
