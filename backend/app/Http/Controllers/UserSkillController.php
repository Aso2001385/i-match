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
    
    public function update(UpdateUserSkillRequest $request,UserSkill $user_skill)
    {
        $response = UserSkill::upsert_skills($user_skill,$request);
        return response()->json($response['result'],$response['status']);
    }

    public function delete(UserSkill $user_skill){
        $response = UserSkill::delete_skill($user_skill);
        return response()->json($response['result'],$response['status']);
    }

}
