<?php

namespace App\Http\Requests\Recruits;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 
use Illuminate\Http\Response;

class RecruitUserRequest extends FormRequest
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
            'recruit_id'=>'required|integer',
            'user_id'=>'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'recruit_id.required'=>'カテゴリIDが入力されていません',
            'recruit_id.integer'=>'カテゴリIDが整数になっていません',
            'user_id.required'=>'user_idが入力されていません',
            'user_id.integer'=>'user_idが整数になっていません',
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
