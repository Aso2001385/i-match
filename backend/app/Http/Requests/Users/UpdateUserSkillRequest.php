<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserSkillRequest extends FormRequest
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
            'practical_flag'=>'required|boolean',
            'learning_flag'=>'required|boolean',
            'level'=>'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'practical_flag.required'=>'実務フラグが入力されていません',
            'practical_flag.boolean'=>'boolean型になっていません',
            'learning_flag.required'=>'学習フラグが入力されていません',
            'learning_flag.boolean'=>'boolean型になっていません',
            'level.required'=>'レベルが入力されていません',
            'level.integer'=>'レベルが整数になっていません',
        ];
    }
}
