<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminLeader;
use App\Models\AdminUser;
use App\Http\Requests\AdminUsersAddRequest;
use \Hash;
use \DB;


class IndexController extends Controller
{
    //排序获取管理权限方法，封装成静态
    static function get_leaders_data()
    {

        //自定义sql语句查询，添加paths字段查询
        $sql = "select * , concat(path,',',id) as paths from admin_leaders order by paths";

        //按照级别查询数据用DB+sql语句查询
        $leaders_data = DB::select("$sql");

        foreach ($leaders_data as $key => $value) {
            //统计逗号出现次数
            $n = substr_count($value->path, ',');

            $leaders_data[$key]->leader_name = str_repeat('|------', $n) . $value->leader_name;
        }

        return $leaders_data;

    }


    //递归获取权限级别
    static function getPidLeaders($pid = 1)
    {
        $data = AdminLeader::where('pid', $pid)->get();
        //放置空数组
        $arr = [];
        foreach ($data as $key => $value) {
            //在每一个数据中加入sub，如果有子分类
            $value['sub'] = self::getPidLeaders($value->id);
            //重新生成数组
            $arr[] = $value;
        }

        return $arr;
    }

    //显示后台主页路由
    function index()
    {
        //返回视图
        return view('Admin.index');
    }

    //后台管理员创建路由
    function admin_create()
    {

        //返回视图，加上管理权限的遍历
        return view('Admin.users.admin.create', ['leaders_data' => self::get_leaders_data()]);
    }

    //后台管理员创建路由AdminUsersAddRequest
    function admin_add(AdminUsersAddRequest $request)
    {

        //接收所有数据
        $data = $request->all();

        //处理照片
        if ($request->hasFile('photo')) {

            //获取上传图片信息
            $photo = $request->file('photo');

            //获取后缀
            $ext = $photo->getClientOriginalExtension();

            //为图片起新名字
            $temp_name = time() . rand(1000, 9999) . '.' . $ext;

            //设置路径名称
            $dir_name = '/images/admin/admin_users_photos/' . date('Ymd', time());

            //往数据库中存储的名字 拼接路径方便存储.
            $photo_path = $dir_name . '/' . $temp_name;
            //echo $name;

            //将图片移动到框架中   路径  ，  名称
            $photo->move('.' . $dir_name, $temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['photo_path'] = $photo_path;

        }

        //用模型方法添加数据，实例化模型
        $AdminUser = new AdminUser;

        //添加头像
        $AdminUser->photo_path = $data['photo_path'];

        //添加姓名
        $AdminUser->name = $data['name'];

        //添加性别
        $AdminUser->sex = $data['sex'];

        //添加电话
        $AdminUser->phone = $data['phone'];

        //添加密码
        $AdminUser->password = Hash::make($data['password']);

        //添加日期
        $AdminUser->date = $data['date'];

        //添加leader_id 权限级别
        $AdminUser->leader_id = $data['leader_id'];

        //保存
        $res = $AdminUser->save();

        if ($res) {
            return redirect('/admin/users/admin_index_fenji')->with('success', '添加成功');

        } else {

            return back()->with('error', '添加失败');
        }

    }


    //后台管理员分级显示列表
    function admin_index_fenji()
    {

        //获取权限中的数据，实现分类
        $data = self::getPidLeaders(1);


        return view('Admin.users.admin.index_fenji', ['users' => $data]);

    }

    //后台管理员分级显示列表
    function admin_index()
    {

        //获取权限中的数据，实现分类
        $data = self::getPidLeaders(1);


        return view('Admin.users.admin.index', ['users' => $data]);

    }


    //后台添加管理员权限
    function admin_leader_create()
    {

        //分配数据,调用封装的静态方法
        return view('Admin.users.admin.leader_create', ['leaders_data' => self::get_leaders_data()]);
    }

    //后台管理员权限显示
    function admin_leader_index()
    {

        //后台管理权限显示，
        return view('Admin.users.admin.leader_index', ['leaders_data' => self::get_leaders_data()]);

    }

    //后台添加权限处理方法
    function admin_leader_add(Request $request)
    {
        //实例化模型
        $leader_add = new AdminLeader;

        $pid = $request->input('pid', 0);

        if ($pid == 0) {
            //顶级分类
            $path = 0;
        } else {
            //子分类
            $parent_data = AdminLeader::find($pid);
            $path = $parent_data['path'] . ',' . $parent_data['id'];
        }

        $leader_add->leader_name = $request->input('leader_name');
        $leader_add->pid = $pid;
        $leader_add->path = $path;

        if ($leader_add->save()) {
            return redirect('admin/users/admin_leader_index')->with('success', '添加成功');
        } else {
            return back()->with('error', '添加失败');
        }

    }

    //修改管理员显示修改页面
    function admin_edit(Request $request, $id)
    {
        $admin_user_data = AdminUser::find($id);


        return view('Admin.users.admin.edit', ['admin_user_data' => $admin_user_data, 'leaders_data' => self::get_leaders_data()]);
    }


    //更新管理员信息处理路由
    function admin_update(Request $request, $id)
    {
        //获取所有数据
        $data = $request->all();

        $admin_update = AdminUser::find($id);

        $admin_update->name = $data['name'];

        $admin_update->sex = $data['sex'];

        $admin_update->phone = $data['phone'];

        $admin_update->password = Hash::make($data['password']);

        $admin_update->leader_id = $data['leader_id'];

        $res = $admin_update->save();

        if ($res) {
            return redirect('/admin/users/admin_index_fenji')->with('success', '修改成功');

        } else {

            return back()->with('error', '修改失败');
        }

    }


    //删除管理员路由
    function admin_delete(Request $request, $id)
    {

        //获取管理员信息
        $admin_user = AdminUser::find($id);

        //找到图片路径
        $image = $admin_user->photo_path;

        //删除管理员
        $res = AdminUser::destroy($id);

        if ($res) {
            unlink('.' . $image);
            return redirect('/admin/users/admin_index_fenji')->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }

    function admin_leader_edit(Request $request, $id)
    {

        $data = AdminLeader::find($id);

        return view('Admin.users.admin.leader_edit', ['data' => $data]);

    }

    //更新权限处理
    function admin_leader_update(Request $request, $id)
    {
        $data = $request->all();

        $leader_update = AdminLeader::find($id);

        $leader_update->leader_name = $data['leader_name'];

        $res = $leader_update->save();

        if ($res) {
            return redirect('/admin/users/admin_leader_index')->with('success', '修改成功');

        } else {

            return back()->with('error', '修改失败');
        }

    }

    //删除权限处理
    function admin_leader_delete(Request $request, $id)
    {

        $data = AdminLeader::find($id);

        $parent_data = AdminLeader::where('pid', $id)->first();

        $arr = $data->users;


        if ($arr) {
            return back()->with('error', '当前类别下存在管理员，不可以删除');
        }

        if ($parent_data) {
            return back()->with('error', '当前类别下有子分类，不可以删除');
        }

        $res = AdminLeader::destroy($id);

        if ($res) {
            return back()->with('success', '删除权限成功');
        }

    }

    //返回修改密码以及信息路由
    function rePassword(Request $request,$id)
    {
        return view ('Admin.users.admin.rePassword');
    }

    //处理修改信息
    function doRePassword(Request $request,$id)
    {
        //验证码判断
        $this->validate($request, [
            'phone' => 'required |regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',
            'password' => 'required |regex:/[\w]{6,}/',
            'repassword' => 'required|same:password',
            'yanzhengma' => 'required|captcha',
        ], [
            'phone.required' => '手机号必须填写',
            'phone.regex' => '手机号格式不正确',
            'password.required'  => '密码必须填写',
            'password.regex'  => '密码格式不正确',
            'repassword.required'  => '确认密码必须填写',
            'repassword.same'  => '两次密码不一致',
            'yanzhengma.required' => trans('验证码必须填写'),
            'yanzhengma.captcha' => trans('验证码不正确'),
        ]);

        //接收所有数据
        $data = $request->all();

        //接收的原密码
        $oldPassword = $data['oldPassword'];

        $userPassword = session('adminUser')['password'];

        $res = Hash::check($oldPassword,$userPassword);


        if(!$res)
        {
            return back()->with('error','原密码输入不正确');
        }

        $user = AdminUser::find($id);

        $user->sex = $data['sex'];

        $user->phone = $data['phone'];

        $user->date = $data['date'];

        $user->password =Hash::make($data['password']);

        $user->save();

        session()->flush();
        session(['adminFlag'=>false]);

        return redirect('admin/login');

    }


}
