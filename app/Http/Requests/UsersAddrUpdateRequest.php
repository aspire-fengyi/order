<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersAddrUpdateRequest extends FormRequest
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

            'addr'=>'required',

            'addr_phone'=>'required|regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',

            'addr_name'=>'required',




        ];
    }

    public function messages()
    {
        return [

            'addr.required' => '收货地址必须填写',

            'addr_phone.require' => '收货联系电话必须填写',

            'addr_phone.regex' => '收货联系电话格式不正确',

            'addr_name.require' => '收货联系人必须填写',

        ];
    }
}
