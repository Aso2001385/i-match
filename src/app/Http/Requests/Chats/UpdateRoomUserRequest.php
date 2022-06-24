<?php

namespace App\Http\Requests\Chats;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomUserRequest extends FormRequest
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
            'name' => 'required|string|max:30',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'名前を入力してください',
            'name.string'=>'文字列で入力してください',
            'name.max'=>'30文字以内で入力してください',
        ];
    }
}
