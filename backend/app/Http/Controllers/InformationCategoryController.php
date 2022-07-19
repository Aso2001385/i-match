<?php

namespace App\Http\Controllers;

use App\Models\Informations\InformationCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InformationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' =>InformationCategory::all()->toArray(),
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
        $response=InformationCategory::create_information_category($request);

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
    public function update(Request $request,InformationCategory $information_category)
    {
        $response=InformationCategory::update_information_category($information_category,$request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformationCategory $information_category)
    {
        $response=InformationCategory::delete_information_category($information_category);

        return response()->json($response['result'],$response['status']);
    }
}
