<?php

namespace App\Models\Chats;

use App\Models\Chats\RoomUser;
use App\Models\Chats\Chat;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Exception;
use Throwable;

class Room extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'deleted_at'
    ];

    public function users(){
        return $this->hasMany(RoomUser::class);
    }

    public function chats(){
        return $this->hasMany(Chat::class);
    }

    public static function get_rooms($request){

        try{
            $user_id = $request->user_id;
            $room = Room::with([
                'users'=> function ($query){
                    $query->select('room_user.*','users.name as user_name')->join('users', 'user_id', '=', 'users.id');
                },
            ])->whereIn('id',RoomUser::select('room_id as id')->where('user_id',$user_id)->get())->get()->toArray();

            if (is_array($room) && empty($room)) {

                return [
                    'result' => false,
                    'status' => 200
                ];

            }
            $room = array_map(function($v)use($user_id){

                // ルーム名取得
                $v['name'] = $v['users'][array_search($user_id,array_map(function($e){
                    return $e['id'];
                },$v['users']))]['name'];

                // ルームユーザー内のルーム名削除
                $v['users'] = array_map(function($e){
                    unset($e['name']);
                    return $e;
                },$v['users']);

                $v['new_message'] = Chat::select('message','created_at')->where('room_id',$v['id'])->orderBy('id','desc')->first()->message;

                return $v;

            },$room);



            return [
                'result' => $room,
                'status' => 200
            ];

        }catch(Throwable $e){
            return [
                'result' => $e,
                'status' => $e->getCode()
            ];
        }
    }

    public static function get_room($request){

        try{
            $room_id = $request->room_id;
            $user_id = $request->user_id;
            $room = Room::with([
                'users'=> function ($query){
                    $query->select('room_user.*','users.name as user_name')->join('users', 'user_id', '=', 'users.id');
                },
                'chats' =>function ($query){
                    $query->select('chats.*')->orderBy('created_at','desc');
                },
            ])->where('id',$room_id)->first()->toArray();

            $room['name'] = $room['users'][array_search($user_id,array_map(function($e){
                return $e['id'];
            },$room['users']))]['name'];

            // ルームユーザー内のルーム名削除
            $room['users'] = array_map(function($e){
                unset($e['name']);
                return $e;
            },$room['users']);

            return [
                'result' => $room,
                'status' => 200
            ];

        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];
        }

    }

    public static function delete_room($room){
        try{
            $room_users=RoomUser::where('room_id',$room->id)->whereNull('deleted_at')->get()->toArray();

            if(xouser($room_users)>0){
                foreach($room_users as $user){
                    RoomUser::delete_room_user($user);
                }
            }
            $chats=Chat::where('room_id',$room->id)->whereNull('deleted_at')->get()->toArray();
            if(count($chats)>0){
                foreach($chats as $chat){
                    Chat::delete_chat($chat);
                }
            }
            $room->delete();
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
