<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUsersAddRequest extends FormRequest
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
            'name' => 'required|unique:admin_users|regex:/[\x4E00-\x9FA5\w]{1,16}/',

            'sex' => 'required',

            'phone' => 'required|regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',

            'photo' => 'required',

            'password' => 'required|regex:/[\w]{6,}/',

            'repassword' => 'required|same:password',

            'date' => 'required',

            'leader_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => '姓名必须填写',
            'name.unique' => '该管理员已被注册',
            'name.regex' => '姓名格式不正确',

            'sex.required'  => '性别必须填写',

            'phone.required'  => '电话必须填写',
            'phone.regex'  => '手机号格式不正确',

            'photo.required'  => '头像未选择',
//            'photo.image'  => '头像格式不正确',

            'password.required'  => '密码必须填写',
            'password.regex'  => '密码格式不正确',

            'repassword.required'  => '确认密码必须填写',
            'repassword.same'  => '两次密码不一致',

            'date.required'  => '出生日期',

            'leader_id.required'  => '管理级别必须填写',
        ];
    }
}
