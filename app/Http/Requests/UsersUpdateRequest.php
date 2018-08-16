<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
            'name' => 'required|regex:/[\x4E00-\x9FA5\w]{1,16}/',

            'phone' => 'required|regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',

            'password' => 'required|regex:/[\w]{6,}/',

            'repassword' => 'required|same:password',


            'jibie'=>'required',

            'admin_user_id'=>'required',

            'leader_id'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => '姓名必须填写',
            'name.regex' => '姓名格式不正确',

            'phone.required'  => '电话必须填写',
            'phone.regex'  => '手机号格式不正确',

            'password.required'  => '密码必须填写',
            'password.regex'  => '密码格式不正确',

            'repassword.required'  => '验证密码必须填写',
            'repassword.same'  => '两次密码不一致',


            'jibie.require'=>'合作商级别必须选择',

            'admin_user_id.require'=>'所属管路员必须填写',

            'leader_id.require'=>'所属小组选择',
        ];
    }
}
