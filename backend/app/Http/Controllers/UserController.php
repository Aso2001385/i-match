<?php

namespace App\Http\Controllers;

use App\Models\Users\User;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\PasswordUpdateUserRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function access(){
        return response()->json(['result' => true],Response::HTTP_OK);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $response=[
                'result' =>User::all()->toArray(),
                'status' => Response::HTTP_OK
            ];

            return response()->json($response['result'],$response['status']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {

        $response=User::create_user($request);

        return response()->json($response['result'],$response['status']);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $response = User::get_user($user);

        return response()->json($response['result'],$response['status']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request,User $user)
    {
        
        $response=User::update_user($user,$request);

        return response()->json($response['result'],$response['status']);
    }

    public function passUpdate(PasswordUpdateUserRequest $request)
    {

        User::password_update_user($request);
        return response()->json($response['result'],$response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $response=User::delete_user($request);

        return response()->json($response['result'],$response['status']);

    }
}