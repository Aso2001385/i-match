<?php

namespace App\Http\Controllers;

use App\Models\Users\User;
use App\Http\Requests\Users\CreateUserRequest;
use App\Models\Skills\Skill;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\PasswordUpdateUserRequest;
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
            $response=User::index_user();

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

        $user= User::create_user($request)['result'];
        $user = User::get_user($user)['result'];
        $skills = Skill::get_skills()['result'];
        $response = [
            'user' => $user,
            'skills' => $skills
        ];

        return response()->json($response,200);

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

    public function passUpdate(PasswordUpdateUserRequest $request,User $user)
    {
        $response=User::password_update_user($user,$request);
        return response()->json($response['result'],$response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $response=User::delete_user($user);

        return response()->json($response['result'],$response['status']);

    }

    public function skillSearch(Request $request)
    {

        $users = $request->all();
        try{
            $response = Recruit::skillSearch($users);
        }catch(Exception $e){
            return response()->json($e,$e->getCode());
        }
        return response()->json($response['result'],200);
    }
}
