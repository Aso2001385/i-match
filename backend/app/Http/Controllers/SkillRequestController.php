<?php

namespace App\Http\Controllers;

use App\Models\Skills\SkillRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class SkillRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' =>SkillRequest::all()->toArray(),
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
        $response=SkillRequest::create_skill_request($request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SkillRequest $skill_request)
    {
        $response=SkillRequest::get_skill_request($skill_request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SkillRequest $skill_request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkillRequest $skill_request)
    {
        $response=SkillRequest::delete_request_skill($skill_request);

        return response()->json($response['result'],$response['status']);
    }
}
