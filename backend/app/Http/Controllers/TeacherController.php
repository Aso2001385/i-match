<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teachers\Teacher;
use App\Http\Requests\Teachers\CreateTeacherRequest;
use App\Http\Requests\Teachers\UpdateTeacherRequest;
use App\Http\Requests\Teachers\PasswordUpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' => Teacher::all()->toArray(),
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
    public function store(CreateTeacherRequest $request)
    {
        $response=Teacher::create_teacher($request);
        return response()->json($response['result'],$response['status']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $response=Teacher::get_teacher($teacher->id);
        return response()->json($response['result'],$response['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request,Teacher $teacher)
    {
        $response=Teacher::update_teacher($teacher,$request);
        return response()->json($response['result'],$response['status']);
    }

    public function passUpdate(PasswordUpdateTeacherRequest $request)
    {
        Teacher::password_update_teacher($request);
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
        //
    }
}
