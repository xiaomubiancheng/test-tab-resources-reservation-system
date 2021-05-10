<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPcrRequest extends FormRequest
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
            'project' => 'required',
            'const' => 'required',
            'content' => 'required'
        ];
    }

    //自定义验证错误信息
    public function message(){
        return [
          'project.required' => '项目必填',
          'cost.required'  => '费用必填',
          'content.required' => 'PCR需求必填'
        ];
    }
}
