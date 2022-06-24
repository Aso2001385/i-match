<?php

namespace App\Http\Requests\Informations;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformationRequest extends FormRequest
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
            'read'=>'required|boolean'
        ];
    }
    public function messages()
    {   
        return[
            'read.required'=>'既読フラグが入力されていません',
            'read.boolean'=>'boolean型になっていません'
        ];
    }
}
