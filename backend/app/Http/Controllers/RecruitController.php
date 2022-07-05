<?php

namespace App\Http\Controllers;

use App\Models\Recruits\Recruit;
use App\Http\Requests\Recruits\CreateRecruitRequest;
use App\Http\Requests\Recruits\UpdateRecruitRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Exception;

class RecruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' => Recruit::all()->toArray(),
            'status'=>Request::HTTP_OK
        ];
        return response()->json($response['result'],$response['status']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRecruitsRequest $request)
    {
        $response=Recruit::create_recruits($request);
        return response()->json($response['result'],$response['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recruit $recruit)
    {
        $response=Recruit::get_user_recruits($recruit);

        return response()->json($response['result'],$response['status']);
    }

    public function otherShow(Recruit $recruit)
    {
        $response=Recruit::get_user_recruits($recruit->user_id);
        return response()->json($response['result'],$response['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecruitRequest $request,Recruit $recruit)
    {
        $response=Recruit::update_recruit($recruit,$request);

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
        $response=Recruit::delete_recruit($request);
        return response()->json($response['result'],$response['status']);
    }
}
