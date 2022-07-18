<?php

namespace App\Http\Controllers;

use App\Models\Recruits\Recruit;
use App\Models\Recruits\RecruitSkill;
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
    public function store(CreateRecruitRequest $request)
    {
        $request1=collect(
            ['user_id' => $request->user_id, 'title' =>$request->title, 'contents' => $request->contents, 'purpose'=>$request->purpose, 'persons'=>$request->persons, 'due'=>$request->due]
        );
        $response=Recruit::create_recruits($request1);

        if($response['result']=='success!'){
            $response=RecruitSkill::create_rec_skill($request,$response['recruit']);
        }
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

    public function otherIndex(Request $request)
    {
        $response=Recruit::get_other_recruits($request);
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
    public function destroy(Recruit $recruit)
    {
        $response=Recruit::delete_recruit($recruit);
        return response()->json($response['result'],$response['status']);
    }
}
