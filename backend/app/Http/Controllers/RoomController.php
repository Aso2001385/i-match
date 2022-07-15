<?php

namespace App\Http\Controllers;

use App\Models\Chats\Room;
use App\Models\Chats\Chat;
use App\Models\Chats\RoomUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' => Room::all()->toArray(),
            'status'=>Response::HTTP_OK
        ];
        return response()->json($response['result'],$response['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $response=Room::get_room($room);
        return response()->json($response['result'],$response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $response=Room::delete_room($room);

        return response()->json($response['result'],$response['status']);
    }
}
