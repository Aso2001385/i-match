<?php

namespace App\Http\Controllers;

use App\Models\Chats\RoomUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class RoomUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' => RoomUser::all()->toArray(),
            'status'=>Response::HTTP_OK
        ];
        return response()->json($response['result'],$response['status']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response=RoomUser::create_room_user($request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RoomUser $room_user)
    {
        $response=RoomUser::get_room_user($room_user);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RoomUser $room_user)
    {
        $response=RoomUser::update_room_user($room_user,$request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomUser $room_user)
    {
        $response=RoomUser::delete_room_user($room_user);

        return response()->json($response['result'],$response['status']);
    }
}
