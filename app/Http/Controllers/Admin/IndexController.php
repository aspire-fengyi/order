<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin_leader;
use App\Models\Admin_user;
use App\Http\Requests\AdminUsersAddRequest;
use \Hash;
use \DB;


class IndexController extends Controller
{
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
            $dir_name = '/users_photos/' . date('Ymd', time());

            //往数据库中存储的名字 拼接路径方便存储.
            $photo_path = $dir_name . '/' . $temp_name;
            //echo $name;

            //将图片移动到框架中   路径  ，  名称
            $photo->move('.' . $dir_name, $temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['photo_path'] = $photo_path;

        }

        //用模型方法添加数据，实例化模型
        $admin_user = new Admin_user;

        //添加头像
        $admin_user->photo_path = $data['photo_path'];

        //添加姓名
        $admin_user->name = $data['name'];

        //添加性别
        $admin_user->sex = $data['sex'];

        //添加电话
        $admin_user->phone = $data['phone'];

        //添加密码
        $admin_user->password = Hash::make($data['password']);

        //添加日期
        $admin_user->date = $data['date'];

        //添加leader_id 权限级别
        $admin_user->leader_id = $data['leader_id'];

        //保存
        $res = $admin_user->save();

        if ($res) {
            return redirect('/admin/users/admin_index')->with('success', '添加成功');

        } else {

            return back()->with('error', '添加失败');
        }

    }

    //后台管理员显示列表
    function admin_index()
    {
        //获取数据
        $users = Admin_user::all();

        return view('Admin.users.admin.index', ['users' => $users]);

    }

    //递归获取权限级别
    static function getPidLeaders($pid = 1)
    {
        $data = Admin_leader::where('pid', $pid)->get();
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


    //后台管理员分级显示列表
    function admin_index_fenji()
    {

        //获取权限中的数据，实现分类
        $data = self::getPidLeaders(1);

        return view('Admin.users.admin.index_fenji', ['users' => $data]);

    }


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

            $leaders_data[$key]->leader_name = str_repeat('|----', $n) . $value->leader_name;
        }

        return $leaders_data;

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
        $leader_add = new Admin_leader;

        $pid = $request->input('pid', 0);

        if ($pid == 0) {
            //顶级分类
            $path = 0;
        } else {
            //子分类
            $parent_data = Admin_leader::find($pid);
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
}
