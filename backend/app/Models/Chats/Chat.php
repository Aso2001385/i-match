<?php

namespace App\Models\Chats;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Response;
use Exception;

class Chat extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'room_id',
        'user_id',
        'message',
    ];

    public static function create_chat($request){
        try{
            Chat::create($request->all());
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

    public static function update_chat($chat,$request){
        try{
            $chat->update($request->all());
            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }

        return [
            'result' => $chat,
            'status' => $status
        ];
    }

    // public static function delete_chat($chat){
    //     try{
    //         $chat->delete();

    //         $status=Response::HTTP_OK;
    //     }catch(Exception $e){

    //         return [
    //             'result' => [],
    //             'status' => Response::HTTP_BAD_REQUEST
    //         ];

    //     }

    //     return [
    //         'result' => $result,
    //         'status' => $status
    //     ];
    // }
}
