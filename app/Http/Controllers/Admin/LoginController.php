<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use \Hash;


class LoginController extends Controller
{
    //显示后台登录页路由
    function login()
    {
        return view('Admin.login.login');
    }

    //显示后台登录页路由
    function doLogin(Request $request)
    {
        //验证码判断
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'yanzhengma' => 'required|captcha',
        ], [
            'yanzhengma.required' => trans('验证码必须填写'),
            'yanzhengma.captcha' => trans('验证码错误'),
        ]);

        //获取提交数据
        $data = $request->all();

        //获取用户名
        $name = $data['name'];

        $password = $data['password'];

        //查找用户名
        $user = AdminUser::where('name', $name)->first();

        if (!$user) {
            return back()->withErrors('没有这个用户')->withInput();
        }

        //检查密码
        $res = Hash::check($password, $user['password']);

        if (!$res) {
            return back()->withErrors('用户密码错误')->withInput();
        }

        //session加入session
        session(['adminFlag' => true]);

        session(['adminUser' => $user]);

        return redirect()->route('admin.index');
    }

    //管理员退出路由
    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('admin/login');
    }
}
