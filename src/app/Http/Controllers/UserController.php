<?php

namespace App\Http\Controllers;

use App\Models\Users\User;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\PasswordUpdateUserRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

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
            $result = [
                'users' => User::all()->toArray()
            ];

            $status = Response::HTTP_OK;
            return response()->json($result,$status);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{

            $user = User::create($request->all());

            $user->fill(
                array_merge($request->all(),
                ['password' => Hash::make($request->password)]
            ))
            ->save();

            $response = [
                'result' => 'success!'
            ];

            $status = Response::HTTP_OK;

        }catch(Exception $e){
            $response = [
                'result' => $e
            ];

            $status = Response::HTTP_BAD_REQUEST;
        }

        return response()->json($response,$status);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $response = User::get_user($request);
        return response()->json($response['result'],$response['status']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $user=User::find($request->id);

        $user->class=$request->input('class');
        $user->name = $request->input('name');

        $user->save();

        $result=[
            'users' => $user->toArray(),
        ];
        
        $status = Response::HTTP_OK;
        return response()->json($result,$status);
    }

    public function passUpdate(PasswordUpdateUserRequest $request)
    {

        $user=User::find($request->id);

        if(!Hash::check($request->old_password,$user->password)){
            $status = Response::HTTP_OK;
            return response()->json([],$status);
        }

        $user->password=Hash::make($request->password);

        $user->save();
        $result=[
            'users' => User::find($request->id)->toArray,
        ];
        $status = Response::HTTP_OK;
        return response()->json($result,$status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        User::find($request->id)->delete();

        $status = Response::HTTP_OK;
        return response()->json([],$status);

    }
}