<?php

namespace App\Http\Requests\Teachers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'title'=>'required|string|max:30',
            'contents'=>'required|string|max:1024',
            'due'=>'required|date|after:today',
        ];
    }
    public function messages()
    {
        return[
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
}
