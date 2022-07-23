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
            'result' => Recruit::with([
                'users' => function ($query) {
                    $query->select('recruit_user.*','users.name')
                    ->join('users','recruit_user.user_id','users.id');
                },
                'skills' => function ($query) {
                    $query->select('recruit_skill.*','skills.category_id','skills.name','skill_categories.name as category_name')
                    ->join('skills','recruit_skill.skill_id','skills.id')
                    ->join('skill_categories','skills.category_id','skill_categories.id');
                }
            ])->get(),
            'status' => Response::HTTP_OK
        ];
        return response()->json($response['result'],$response['status']);
    }



    public function otherIndex(Request $request,$id)
    {
        $response=Recruit::get_other_recruits($request,$id);
        return response()->json($response['result'],$response['status']);
    }


    public function user_index(Request $request)
    {
        $response=Recruit::get_user_recruits($request);

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
        $response=Recruit::get_recruit($recruit);

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

    public function history(Request $request)
    {
        try{

            $response = Recruit::get_history($request->id);

        }catch(\Exception $e){

            return response()->json($e,$e->getCode());

        }

        return response()->json($response['result'],200);
    }


    public function skillSearch(Request $request)
    {

        $res = $request->all();
        try{
            $response = Recruit::skillSearch($res);
        }catch(Exception $e){
            return response()->json($e,$e->getCode());
        }
        return response()->json($response['result'],200);
    }

}
