<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skills\Skill;
use Illuminate\Http\Response;
use Exception;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = [
            'skills' => Skill::all()->toArray()
        ];
        
        $status = Response::HTTP_OK;
        return response()->json($result,$status);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            Skill::create($request->all());
            $response = [
                'result' => 'success!'
            ];

            $status = Response::HTTP_OK;

        }catch(Exception $e){
            $response = [
                'result' => $e
            ];

            $status = Response::HTTP_BAD_REQUEST;
        }

        return response()->json($response,$status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        $response = Skill::get_skill($skill);
        return response()->json($response['result'],$response['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Skill $skill)
    {
        $response=Skill::update_skill($skill,$request);

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
