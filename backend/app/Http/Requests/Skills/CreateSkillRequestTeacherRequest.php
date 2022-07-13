<?php

namespace App\Http\Requests\Skills;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 
use Illuminate\Http\Response;

class CreateSkillRequestTeacherRequest extends FormRequest
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
            'skill_request_id'=>'required|integer',
            'skill_id'=>'required|integer',
            'teacher_id'=>'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'skill_request_id.required'=>'skill_request_idが入力されていません',
            'skill_request_id.integer'=>'skill_request_idが整数になっていません',
            'skill_id.required'=>'skill_idが入力されていません',
            'skill_id.integer'=>'skill_idが整数になっていません',
            'teacher_id.required'=>'teacher_idが入力されていません',
            'teacher_id.integer'=>'teacher_idが整数になっていません',
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
