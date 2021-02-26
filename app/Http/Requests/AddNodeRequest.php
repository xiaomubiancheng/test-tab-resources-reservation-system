<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNodeRequest extends FormRequest
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
            'name' => 'required',
            'route_name' => 'required'
        ];
    }

    public function message(){
        return [
            'name.required'=> '节点名称一定要写',
//            'route_name.required' => '路由别名一定'
        ];
    }
}
