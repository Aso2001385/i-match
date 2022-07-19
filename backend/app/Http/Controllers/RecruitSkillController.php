<?php

namespace App\Http\Controllers;

use App\Models\Recruits\RecruitSkill;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecruitSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' =>RecruitSkill::all()->toArray(),
            'status' => Response::HTTP_OK
        ];

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RecruitSkill $recruit_skill)
    {
        $response = RecruitSkill::get_recruit_skill($recruit_skill);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RecruitSkill $recruit_skill)
    {
        $response=RecruitSkill::update_recruit_skill($recruit_skill,$request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecruitSkill $recruit_skill)
    {
        $response=RecruitSkill::delete_recruit_skill($recruit_skill);

        return response()->json($response['result'],$response['status']);
    }
}
