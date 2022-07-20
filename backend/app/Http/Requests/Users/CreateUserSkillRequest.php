<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 
use Illuminate\Http\Response;

class CreateUserSkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'=>'required|integer',
            'skill_id'=>'required|integer',
            'level'=>'required|integer',
        ];
    }
    public function messages()
    {
        return[
            'user_id.required'=>'user_idが入力されていません',
            'user_id.integer'=>'user_idが整数になっていません',
            'skill_id.required'=>'skill_idが入力されていません',
            'skill_id.integer'=>'skill_idが整数になっていません',
            'level.required'=>'レベルが入力されていません',
            'level.integer'=>'レベルが整数になっていません',
        ];
    }

    protected function failedValidation( Validator $validator )
    {
        $response['result'] = $validator->errors()->toArray();
        $response['status']=Response::HTTP_UNPROCESSABLE_ENTITY;

        throw new HttpResponseException(
            response()->json($response['result'],$response['status'])
        );
    }
}
