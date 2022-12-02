<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCheck extends FormRequest
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
            'novelname'=>'required',
            'author'=>'required',
            'status'=>'required',
            'conment'=>'required',
            'tid'=>'required',
            'img'=>'mimes:jpg,jpeg,png,gif|max:2000000',
        ];
    }
    public function messages()
    {
        return [
            'novelname.required' => '小说名称不能为空',
            'author.required' => '小说作者不能为空',
            'status.required' => '小说状态不能为空',
            'conment.required' => '小说简介不能为空',
            'tid.required' => '小说分类不能为空',
            'img.mimes' => '小说封面类型错误',
            'img.max' => '封面大小不超过2Mb',
        ];
    }
}
