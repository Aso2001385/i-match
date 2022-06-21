<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recruit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RecruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $recruits=DB::table('recruits')
        ->join('users', 'recruits.user_id','=','users.id')
        ->select('recruits.*','users.name')
        ->whereNull('recruits.deleted_at')
        ->get();

        $result=[
            'recruits'=>$recruits->toArray(),
        ];

        $status=Response::HTTP_OK;
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
        $result=[
            'recruit'=>Recruit::create($request->all())->toArray(),
        ];
        $status = Response::HTTP_OK;
        return response()->json($result,$status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recruit=DB::table('recruits')
        ->join('users', 'recruits.user_id','=','users.id')
        ->select('recruits.*','users.name')
        ->where('recruits.id','=',$id)
        ->get();

        $result=[
            'recruit'=>$recruit->toArray(),
        ];
        $status = Response::HTTP_OK;
        return response()->json($result,$status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $recruit=Request::find($request->id);

        $recruit->title=$recruit->input('title');
        $recruit->contents=$recruit->input('contents');
        $recruit->purpose_id=$recruit->input('purpose_id');
        $recruit->persons=$recruit->input('persons');
        $recruit->due=$recruit->input('due');

        $recruit->save();

        $recruits=DB::table('recruits')
        ->join('users', 'recruits.user_id','=','users.id')
        ->select('recruits.*','users.name')
        ->whereNull('recruits.deleted_at')
        ->get();

        $result=[
            'recruits' => $recruits->toArray(),
        ];
        
        $status = Response::HTTP_OK;
        return response()->json($result,$status);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Recruit::find($request->id)->delete();

        $status = Response::HTTP_OK;
        return response()->json([],$status);
    }
}
