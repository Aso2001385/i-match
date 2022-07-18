<?php

namespace App\Http\Requests\Chats;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 
use Illuminate\Http\Response;

class CreateChatRequest extends FormRequest
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
            'room_id' =>'required|integer',
            'user_id' =>'required|integer',
            'message' =>'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'room_id.required'=>'ルームIDが入力されていません',
            'room_id.integer'=>'ルームIDが整数になっていません',
            'user_id.required'=>'ルームIDが入力されていません',
            'user_id.integer'=>'ルームIDが整数になっていません',
            'message.required'=>'メッセージが入力されていません',
            'message.string'=> '文字列で入力してください',
            'message.max'=>'255文字以内で入力してください',
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
