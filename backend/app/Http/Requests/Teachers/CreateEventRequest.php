<?php

namespace App\Http\Requests\Teachers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 
use Illuminate\Http\Response;

class CreateEventRequest extends FormRequest
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
            'teacher_id'=>'required|integer',
            'title'=>'required|string|max:30',
            'contents'=>'required|string|max:1024',
            'due'=>'required|date|after:today',
        ];
    }
    public function messages()
    {
        return [
            'teacher_id.required'=>'teacher_idが入力されていません',
            'teacher_id.integer'=>'teacher_id整数になっていません',
            'title.required'=>'タイトルを入力してください',
            'title.string' => '文字列で入力してください',
            'title.max' =>'30文字以内で入力してください',
            'contents.required'=>'本文を入力してください',
            'contents.max' => '1024文字以内で入力してください',
            'due.required'=> '募集期間を入力してくさい',
            'due.date'=>'日付を入力してください',
            'due.after'=>'今日以降の日付を設定してください',
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
