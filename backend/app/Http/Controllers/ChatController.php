<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chats\CreateChatRequest;
use App\Models\Chats\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' => Chat::all()->toArray(),
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
    public function store(CreateChatRequest $request)
    {
        $response=Chat::create_chat($request);

        return response()->json($response['result'],$response['status']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Chat $chat)
    {
        $response=Chat::update_chat($chat,$request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        $response=Chat::delete_chat($chat);

        return response()->json($response['result'],$response['status']);
    }
}
