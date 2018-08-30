<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersAddRequest extends FormRequest
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
            'name' => 'required|unique:users|regex:/[\x4E00-\x9FA5\w]{1,16}/',

            'sex' => 'required',

            'phone' => 'required|regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',

            'photo' => 'required',

            'password' => 'required|regex:/[\w]{6,}/',

            'repassword' => 'required|same:password',


            'addr'=>'required',

            'addr_phone'=>'required|regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',

            'addr_name'=>'required',


            'jibie'=>'required',

            'admin_user_id'=>'required',

            'leader_id'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => '姓名必须填写',
            'name.unique' => '该合作商已被注册',
            'name.regex' => '姓名格式不正确',

            'sex.required'  => '性别必须填写',

            'phone.required'  => '电话必须填写',
            'phone.regex'  => '手机号格式不正确',

            'photo.required'  => '头像未选择',

            'password.required'  => '密码必须填写',
            'password.regex'  => '密码格式不正确',

            'repassword.required'  => '验证密码必须填写',
            'repassword.same'  => '两次密码不一致',


            'addr.required' => '收货地址必须填写',

            'addr_phone.require' => '收货联系电话必须填写',

            'addr_phone.regex' => '收货联系电话格式不正确',

            'addr_name.require' => '收货联系人必须填写',

            'jibie.require'=>'合作商级别必须选择',

            'admin_user_id.require'=>'所属管路员必须填写',

            'leader_id.require'=>'所属小组选择',
        ];
    }
}
