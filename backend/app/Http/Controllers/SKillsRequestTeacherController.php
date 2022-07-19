<?php

namespace App\Http\Controllers;

use App\Models\Skills\SkillReuestTeacher;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SKillsRequestTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' =>SkillReuestTeacher::all()->toArray(),
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
    public function store(Request $request)
    {
        $response=SkillReuestTeacher::create_skill_request_teacher($request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SkillReuestTeacher $skill_request_teacher)
    {
        $response=SkillReuestTeacher::get_skill_request_teacher($skill_request_teacher);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SkillReuestTeacher $skill_request_teacher)
    {
        $response=SkillReuestTeacher::update_skill_request_teacher($skill_request_teacher,$request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkillRequestTeacher $skill_request_teacher)
    {
        $response=SkillReuestTeacher::delete_skill_request_teacher($skill_request_teacher);

        return response()->json($response['result'],$response['status']);
    }
}
