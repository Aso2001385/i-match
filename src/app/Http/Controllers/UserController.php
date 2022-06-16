<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\PasswordUpdateUserRequest;
use App\Http\Controllers\StatusController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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
    public function list()
    {
            $result = [
                'users' => User::all()->toArray()
            ];
            $status='HTTP_OK;';
            return response()->json($result,Response::$status);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status='HTTP_OK';
        return response()->json(Response::$status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
            // $user=User::create([
            //     'class'=>$request->class,
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password),
            // ]);

            $user->fill(array_merge($request->all(),
                ['password' => Hash::make($request->password)]
             ))->save();
            $result = [
                'users'=>$user->toArray(),
            ];
            $status='HTTP_OK';
            return response()->json($result,Response::$status);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $check=new StatusController;
        // list($view,$user,$status) = $check::show($id);

        $result =[
            'users'=>$user=User::find($id)->toArray(),
        ];
        $status='HTTP_OK';
        return response()->json($result,Response::$status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $result=[
            'users'=>User::find($request->id)->toArray(),
        ];
        $status='HTTP_OK';
        return response()->json($result,Response::$status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user=User::find($request->id);

        $user->class=$request->input('class');
        $user->name = $request->input('name');

        $user->save();

        $result=[
            'users' => $user->toArray(),
        ];
        $status='HTTP_OK';
        return response()->json($result,Response::$status);
    }

    public function passEdit(Request $request)
    {
        $user=User::find($request->id);

        $result=[
            'users' => User::find($request->id)->toArray,
        ];
        $status='HTTP_OK';
        return response()->json($result,Response::$status);
    }



    public function passUpdate(PasswordUpdateUserRequest $request)
    {

        $user=User::find($request->id);

        if(!Hash::check($request->old_password,$user->password)){
            return redirect(route('user.passEdit',['id'=>$request->id]))->with('warning','現在のパスワードが違います');
        }

        $user->password=Hash::make($request->password);

        $user->save();
        $result=[
            'users' => User::find($request->id)->toArray,
        ];
        $status='HTTP_OK';
        return response()->json($result,Response::$status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $user=User::find($request->id)->delete();
        $result=[];
        $status='HTTP_OK';
        return response()->json($result,Response::$status);

    }
}
