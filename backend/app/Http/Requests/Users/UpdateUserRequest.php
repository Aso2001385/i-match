<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'class' => 'required|string|max:30',
            'name' => 'required|string|max:30',
        ];
    }

    public function messages()
    {
        return[
            'class.required' => 'クラスを入力してください',
            'class.max' => '30文字以内で入力してください',
            'name.required' => '名前を入力してください',
            'name.max' => '30文字以内で入力してください',
        ];
    }
}
