<?php

namespace App\Http\Controllers;

use App\Models\Recruits\RecruitUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecruitUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' =>RecruitUser::all()->toArray(),
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
        $response= RecruitUser::create_recruit_user($request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RecruitUser $recruit_user)
    {
        $response=RecruitUser::get_recruit_user($recruit_user);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecruitUser $recruit_user)
    {
        $response = RecruitUser::delete_recruit_user($recruit_user);

        return response()->json($response['result'],$response['status']);
    }
}
