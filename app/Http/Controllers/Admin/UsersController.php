<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\AdminLeader;
use App\Models\User;
use App\Models\UserAddr;
use App\Models\UserInfo;
use App\Http\Requests\UsersAddRequest;
use \Hash;
use \DB;

class UsersController extends Controller
{


    function index()
    {
        echo 222222222;
    }


    function create()
    {

        return view('Admin.users.users.create');
    }

    function add(Request $request)
    {

        $data = $request->all();
//        dd($data);


        //处理头像
        if ($request->hasFile('photo')) {

            //获取上传图片信息
            $photo = $request->file('photo');

            //获取后缀
            $ext = $photo->getClientOriginalExtension();

            //为图片起新名字
            $temp_name = time() . rand(1000, 9999) . '.' . $ext;

            //设置路径名称
            $dir_name = '/images/admin/users_photos/' . date('Ymd', time());

            //往数据库中存储的名字 拼接路径方便存储.
            $photo_path = $dir_name . '/' . $temp_name;
            //echo $name;

            //将图片移动到框架中   路径  ，  名称
            $photo->move('.' . $dir_name, $temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['photo_path'] = $photo_path;
        }

        //处理管理员名称
        $admin_user_name = $data['admin_user_name'];

        //查询管理员数据
        $sql = "select * from admin_users where name ='$admin_user_name'";

        $admin_user_data = DB::select($sql);

        //确定管理员id
        foreach ($admin_user_data as $k => $v) {
            $admin_user_id = $v->id;
        }


        //用模型方法添加数据，实例化模型

        //向主表中添加数据
        $User = new User;

        //添加姓名
        $User->name = $data['name'];

        //添加级别
        $User->jibie = $data['jibie'];

        //添加密码
        $User->password = Hash::make($data['password']);

        //添加管理员id
        $User->admin_user_id = $admin_user_id;

        //返回主表添加结果
        $res1=$User->save();

        //获取最后一条插入数据的id
        $id = DB::getPdo()->lastInsertId();

        //转换数据类型
        $user_id = intval($id);


        //向用户详情表中添加数据
        $UserInfo = new UserInfo;

        $UserInfo->user_id = $user_id;

        $UserInfo->sex = $data['sex'];

        $UserInfo->date = $data['date'];

        $UserInfo->photo_path = $photo_path;

        $UserInfo->phone = $data['phone'];

        $res2=$UserInfo->save();


        //向用户收货地址添加数据

        $UserAddr=new UserAddr();

        $UserAddr->addr = $data['addr'];

        $UserAddr->addr_phone = $data['addr_phone'];

        $res3=$UserAddr->save();




        if ($res1 && $res2 && $res3) {
            return redirect('/admin/users/index')->with('success', '添加成功');

        } else {

            return back()->with('error', '添加失败');
        }

    }

}
