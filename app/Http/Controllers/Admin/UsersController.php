<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\AdminLeader;
use App\Models\User;
use App\Models\UserAddr;
use App\Models\Order;
use App\Models\UserInfo;
use App\Http\Requests\UsersAddRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Http\Requests\UsersAddrUpdateRequest;
use App\Http\Requests\AdminUsersAddRequest;
use \Hash;
use \DB;

class UsersController extends Controller
{



    //排序获取管理权限方法，封装成静态
    static function get_leaders_data()
    {

        //自定义sql语句查询，添加paths字段查询
        $sql = "select * , concat(path,',',id) as paths from admin_leaders where (leader_name != '组员' and id != 1)  order by paths";

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


    //后台管理员分级显示列表
    function index_fenzu()
    {

        //获取权限中的数据，实现分类
        $data = self::getPidLeaders(1);


        return view('Admin.users.users.index_fenzu', ['users' => $data]);

    }

    //后台管理员显示列表
    function index()
    {

        //获取权限中的数据，实现分类
        $data = self::getPidLeaders(1);


        return view('Admin.users.users.index', ['users' => $data]);

    }

    //显示创建管理员页面
    function create()
    {

        $admin_users = AdminUser::all();

        return view('Admin.users.users.create', ['leaders_data' => self::get_leaders_data(), 'admin_users' => $admin_users]);
    }


    //创建管理员处理
    function add(UsersAddRequest $request)
    {

        $data = $request->all();

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

        DB::beginTransaction();


        //用模型方法添加数据，实例化模型

        //向主表中添加数据
        $User = new User;

        //添加姓名
        $User->name = $data['name'];

        //添加级别
        $User->jibie = $data['jibie'];

        //添加电话
        $User->phone = $data['phone'];

        //添加密码
        $User->password = Hash::make($data['password']);

        //添加管理员id
        $User->admin_user_id = $data['admin_user_id'];

        //添加权限级别id
        $User->leader_id = $data['leader_id'];

        //返回主表添加结果
        $res1 = $User->save();

        //获取最后一条插入数据的id
        $id = DB::getPdo()->lastInsertId();

        //转换数据类型
        $user_id = intval($id);


        //向用户详情表中添加数据
        $UserInfo = new UserInfo;

        $UserInfo->user_id = $user_id;

        $UserInfo->sex = $data['sex'];

        $UserInfo->photo_path = $photo_path;

        $UserInfo->phone = $data['phone'];

        $res2 = $UserInfo->save();


        //向用户收货地址添加数据

        $UserAddr = new UserAddr();

        $UserAddr->user_id = $user_id;

        $UserAddr->addr = $data['addr'];

        $UserAddr->addr_name = $data['addr_name'];

        $UserAddr->addr_phone = $data['addr_phone'];

        $res3 = $UserAddr->save();


        if ($res1 && $res2 && $res3) {

            DB::commit();
            return redirect('/admin/users/index')->with('success', '添加成功');

        } else {

            DB::rollBack();
            return back()->with('error', '添加失败');
        }


    }

    //后台显示合作商详情方法
    function show_info(Request $request, $id)
    {

        $user_data = User::find($id);

        $user_id = $user_data->id;

        $orders = Order::where('user_id',$user_id)->orderBy('id','desc')->get();

        //一对多，返回数组
        $user_addrs = $user_data->userAddrs;

        return view('Admin.users.users.user_info', ['user_data' => $user_data, 'user_addrs' => $user_addrs,'orders'=>$orders]);
    }

    //后台修改合作路由
    function edit(Request $request, $id)
    {

        $user_data = User::find($id);

        $user_info = $user_data->userInfo;

        $user_addrs = $user_data->userAddrs;

        $admin_users = AdminUser::all();

        return view('Admin.users.users.edit', ['user_data' => $user_data, 'user_addrs' => $user_addrs, 'leaders_data' => self::get_leaders_data(), 'admin_users' => $admin_users]);
    }

    //修改合作商处理路由
    function update(UsersUpdateRequest $request, $id)
    {

        $data = $request->all();

//        dd($data);

        $user_update = User::find($id);

        $user_update->name = $data['name'];

        $user_update->phone = $data['phone'];

        $user_update->password = Hash::make($data['password']);

        $user_update->jibie = $data['jibie'];

        $user_update->leader_id = $data['leader_id'];

        $user_update->admin_user_id = $data['admin_user_id'];

        $res = $user_update->save();

        if ($res) {
            return redirect('/admin/users/index')->with('success', '修改成功');

        } else {

            return back()->with('error', '修改失败');
        }

    }


    //添加合作商地址路由
    function addr_create(Request $request, $id)
    {
        return view('Admin.users.users.addrs.addr_create', ['user_id' => $id]);
    }

    //添加合作商地址处理路由
    function addr_add(UsersAddrUpdateRequest $request, $id)
    {
        $data = $request->all();

        $addr_add = new UserAddr;

        $addr_add->user_id = $id;

        $addr_add->addr_name = $data['addr_name'];

        $addr_add->addr = $data['addr'];

        $addr_add->addr_phone = $data['addr_phone'];

        $res = $addr_add->save();

        if ($res) {
            //添加成功，返回用户详情页
            return redirect("/admin/users/show_info/$id")->with('success', '添加收货地址成功');
        } else {

            return back()->with('error', '添加收货地址失败');
        }

    }

    //修改收货地址路由
    function addr_edit(Request $request, $userId, $id)
    {
        $addr = UserAddr::find($id);

        return view('Admin.users.users.addrs.addr_edit', ['addr' => $addr, 'userId' => $userId]);
    }

    //修改收货地址处理路由                            $userId返回视图时返回到指定用户详情也面
    function addr_update(UsersAddrUpdateRequest $request, $userId, $id)
    {


        $data = $request->all();

//        dd($data);

        $user_addr_update = UserAddr::find($id);

        $user_addr_update->addr_name = $data['addr_name'];

        $user_addr_update->addr_phone = $data['addr_phone'];

        $user_addr_update->addr = $data['addr'];

        $res = $user_addr_update->save();

        if ($res) {
            return redirect("/admin/users/show_info/$userId")->with('success', '修改成功');

        } else {

            return back()->with('error', '修改失败');
        }


    }


    //删除收货地址路由
    function addr_delete(Request $request, $userId, $id)
    {

        $res = UserAddr::destroy($id);

        if ($res) {
            return back()->with('success', '删除收货地址成功');
        }


    }

    //删除合作商路由
    function delete(Request $request, $id)
    {
        $data = User::find($id);

        //判断是否存在收货地址
        $arr = UserAddr::where('user_id',$id)->first();

        //存在收货地址不允许删除
        if ($arr) {
            return back()->with('error', '请先删除合作商收货地址');
        }


        //获取用户详情
        $userInfo = UserInfo::where('user_id',$id)->first();

        //获取图片位置
        $image = $userInfo->photo_path;

        $res1 = $userInfo->delete();

        if($res1){
            unlink('.' . $image);
        }

        $res2 = User::destroy($id);

        if($res1 && $res2){
            return redirect('/admin/users/index')->with('success', '删除成功');

        }else{

            return back()->with('error', '删除失败');
        }









    }


}
