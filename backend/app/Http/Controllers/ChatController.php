<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chats\CreateChatRequest;
use App\Models\Chats\Chat;
use App\Models\Chats\Room;
use App\Models\Chats\RoomUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class ChatController extends Controller
{

    // ユーザーから見たルーム一覧
    public function index(Request $request){

        $response = Room::get_rooms($request->user_id);

        return response()->json($response['result'],$response['status']);
    }

    // ルーム作成
    public function store(Request $request){
        try{

            $response = Room::create();

            RoomUser::add_user($response->id,$request->sender['id'],$request->sender['room_name']);
            RoomUser::add_user($response->id,$request->receiver['id'],$request->receiver['room_name']);

            return response()->json($response,200);
        }catch(Exception $e){
            return response()->json($e,400);
        }
    }

    // ルーム名変更
    public function rename(Request $request){

    }

    // ルーム詳細
    // ルームIDから
    public function show(Request $request){

        try{
            $room_id = $request->room_id;
            $user_id = $request->user_id;
            $room = Room::with(['chats' => function ($query){
                $query->select('chats.*','users.name as user_name')->join('users', 'user_id', '=', 'users.id');
            }])->where('rooms.id',$room_id)->first();

            $room['name'] = RoomUser::select('name')->where('room_id',$room_id)->where('user_id',$user_id)->first()['name'];
            $room['users'] = RoomUser::select('users.id as id','users.name')->where('room_user.room_id',$room_id)->join('users','user_id','users.id')->get();

            return response()->json($room,200);

        }catch(Exception $e){

            return response()->json($e,400);
        }


    }

    // チャット投稿
    public function send(Request $request){

        try{

            Chat::create($request->all());
            $room = Room::get_room($request);

            return response()->json($room['result'],200);

        }catch(Exception $e){
            return response()->json($e,400);
        }


    }

    // チャット編集
    public function update(Request $request){

        try{

            Chat::where('id',$request->id)->update(['message' => $request->message]);
            $chat = Chat::where('id',$request->id)->first();
            $room = Room::get_room($chat);

            return response()->json($room['result'],200);

        }catch(Exception $e){

            return response()->json($e,400);
        }


    }





}
