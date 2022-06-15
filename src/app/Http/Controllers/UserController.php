<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\PasswordUpdateUserRequest;
use App\Http\Controllers\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user=User::create([
            'number' => $request->number,
            'class'=>$request->class,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $check=new StatusController;
        list($view,$user,$status) = $check::show($id);
        return response()->view($view,compact('user'),$status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($request->id);
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
    }

    public function passEdit(Request $request)
    {
        $user=User::find($request->id);

        return view('user/passEdit',compact('user'));
    }



    public function passUpdate(PasswordUpdateUserRequest $request)
    {

        $user=User::find($request->id);

        if(!Hash::check($request->old_password,$user->password)){
            return redirect(route('user.passEdit',['id'=>$request->id]))->with('warning','現在のパスワードが違います');
        }

        $user->password=Hash::make($request->password);

        $user->save();

        return view('user.editComplete');
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
    }
}
