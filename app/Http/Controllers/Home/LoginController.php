<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use \Hash;

class LoginController extends Controller
{
    //返回登录页面
    function login()
    {
        return view('Home.login.login');
    }

    //登陆处理
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

        $data = $request->all();

        $user = User::where('name',$data['name'])->first();

        if(!$user)
        {
            return back()->withErrors('没有这个用户') -> withInput();
        }

        $res =  Hash::check($data['password'],$user->password);

        if($res){

            session(['homeFlag'=>true]);

            session(['homeUser'=>$user]);

            return redirect('/');
        }


    }

    function logout()
    {
        session()->flush();
        session(['homeFlag'=>false]);
        return redirect('/');
    }

}
