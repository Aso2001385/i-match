<?php

namespace App\Http\Requests\Informations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 
use Illuminate\Http\Response;

class CreateInformationRequest extends FormRequest
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
            'title'=>'required|string|max:255',
            'contents'=>'required|string|max:1024',
            'category_id'=>'required|integer',
            'url'=>'required|url|active_url',
        ];
    }
    public function messages()
    {   return[
            'user_id.required' =>'user_idが入力されていません',
            'user_id.integer'=>'user_idが整数になっていません',
            'title.required' =>'タイトルを入力してください',
            'title.string' => '文字列で入力してください',
            'title.max' => '30文字以内で入力してください',
            'contents.required' =>'本文を入力してください',
            'contents.string'=>'文字列で入力してください',
            'contents.max'=>'1024文字以内で入力してください',
            'category_id.required'=>'カテゴリIDが入力されていません',
            'category_id.integer'=>'カテゴリIDが整数になっていません',
            'url.required'=>'URLを入力してください',
            'url.url'=>'URLではありません',
            'url.active_url'=>'有効なURLではありません'
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
