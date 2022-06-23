<?php

namespace App\Http\Requests\Recruits;

use Illuminate\Foundation\Http\FormRequest;

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
            'title'=>'required|string|max:30',
            'content'=>'required|string|max:1024',
            'persons'=>'required|integer|max:2',
            'due'=>'required|date|after:today',
        ];
    }
    public function messages()
    {
        return[
            'user_id.required'=>'user_idが入力されていません',
            'user_id.integer'=>'user_idが整数になっていません',
            'title.required' => 'タイトルを入力してください',
            'title.string' => '文字列で入力してください',
            'title.max' => '30文字以内で入力してください',
            'content.required' => '本文を入力してください',
            'content.max' => '1024文字以内で入力してください',
            'persons.required' => '学校用のメールアドレスを入力してください',
            'persons.integer' => '整数で入力してください',
            'persons.max'=> '2桁以内で入力してください',
            'due.required'=> '募集期間を入力してくさい',
            'due.date'=>'日付を入力してください',
            'due.after'=>'今日以降の日付を設定してください',
        ];
    }
}
