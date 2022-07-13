<?php

namespace App\Http\Requests\Skills;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 
use Illuminate\Http\Response;

class CreateSkillRequestRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:1024',
        ];
    }
    public function messages()
    {
        return [
            'user_id.required'=>'user_idが入力されていません',
            'user_id.integer'=>'user_idが整数になっていません',
            'name.required'=>'名前を入力してください',
            'name.string'=>'文字列で入力してください',
            'name.max'=>'255文字以内で入力してください',
            'message.required'=>'メッセージを入力してください',
            'message.max'=>'1024文字以内で入力してください'
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
