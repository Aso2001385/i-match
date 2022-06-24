<?php

namespace App\Http\Requests\Skills;

use Illuminate\Foundation\Http\FormRequest;

class SkillCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'カテゴリ名が入力されていません',
            'name.string'=>'文字列で入力してください',
            'name.max'=>'100文字以内で入力してください'
        ];
    }
}
