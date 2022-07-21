<?php

namespace App\Http\Requests\Recruits;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 
use Illuminate\Http\Response;

class CreateRecruitRequest extends FormRequest
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
            'room_id'=>'required|integer',
            'title'=>'required|string|max:30',
            'contents'=>'required|string|max:1024',
            'purpose'=>'required|string',
            'persons'=>'required|integer|max:99',
            'due'=>'required|date|after:today'
        ];
    }
    public function messages()
    {
        return[
            'user_id.required'=>'user_idが入力されていません',
            'user_id.integer'=>'user_idが整数になっていません',
            'room_id.required'=>'room_idが入力されていません',
            'room_id.integer'=>'room_idが整数になっていません',
            'title.required' => 'タイトルを入力してください',
            'title.string' => '文字列で入力してください',
            'title.max' => '30文字以内で入力してください',
            'contents.required' => '本文を入力してください',
            'contents.max' => '1024文字以内で入力してください',
            'purpose.required' => '開発目的を入力してください',
            'purpose.string' => '文字列で入力してください',
            'persons.required' => '学校用のメールアドレスを入力してください',
            'persons.integer' => '整数で入力してください',
            'persons.max'=> '2桁以内で入力してください',
            'due.required'=> '募集期間を入力してくさい',
            'due.date'=>'日付を入力してください',
            'due.after'=>'今日以降の日付を設定してください'
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
