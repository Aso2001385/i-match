<?php

namespace App\Http\Controllers;

use App\Models\Users\UserSkill;
use App\Http\Requests\Users\CreateUserSkillRequest;
use App\Http\Requests\Users\UpdateUserSkillRequest;
use Illuminate\Http\Request;

class UserSkillController extends Controller
{

    public function store(CreateUserSkillRequest $request)
    {
        $response = UserSkill::store_skills($request);
        return response()->json($response['result'],$response['status']);
    }
    
    public function update(UpdateUserSkillRequest $request)
    {
        $response = UserSkill::upsert_skills($request);
        return response()->json($response['result'],$response['status']);
    }

    public function delete(Request $request){
        $response = UserSkill::delete_skill($request);
        return response()->json($response['result'],$response['status']);
    }

}
