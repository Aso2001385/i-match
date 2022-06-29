<?php

namespace App\Http\Requests\Skills;

use Illuminate\Foundation\Http\FormRequest;

class CreateSkillRequest extends FormRequest
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
            'category_id'=>'required|integer',
            'name'=>'required|string|max:100',
            'depth'=>'required|integer',
        ];
    }
    public function messages()
    {
        return[
            'category_id.required'=>'カテゴリIDが入力されていません',
            'category_id.integer'=>'カテゴリIDが整数になっていません',
            'name.required'=>'名前を入力してください',
            'name.string'=>'文字列で入力してください',
            'name.max'=>'100文字以内で入力してください',
            'depth.required'=>'深度を入力してください',
            'depth.integer'=>'整数で入力してください'
        ];
    }
}
