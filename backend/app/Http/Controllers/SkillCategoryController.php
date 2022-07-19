<?php

namespace App\Http\Controllers;

use App\Models\Skills\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SkillCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' =>SkillCategory::all()->toArray(),
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
        $response=SkillCategory::create_skill_category($request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SkillCategory $skill_category)
    {
        $response=SkillCategory::update_skill_category($skill_category,$request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkillCategory $skill_category)
    {
        $response=SkillCategory::delete_skill_category($skill_category);

        return response()->json($response['result'],$response['status']);
    }
}
