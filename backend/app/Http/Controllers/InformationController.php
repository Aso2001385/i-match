<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Informations\Information;
use App\Http\Requests\Informations\CreateInformationRequest;
use App\Http\Requests\Informations\UpdateInformationRequest;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'result' =>Information::all()->toArray(),
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
    public function store(CreateInformationRequest $request)
    {
        $response=Information::create_information($request);
        return response()->json($response['result'],$response['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        $response=Information::get_information($information);
        return response()->json($response['result'],$response['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInformationRequest $request,Information $information)
    {
        $response=Information::update_information($information,$request);

        return response()->json($response['result'],$response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $response=Information::delete_information($information);
        return response()->json($response['result'],$response['status']);
    }
}
