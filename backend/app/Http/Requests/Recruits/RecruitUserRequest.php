<?php

namespace App\Http\Requests\Recruits;

use Illuminate\Foundation\Http\FormRequest;

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
}
