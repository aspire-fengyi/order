<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PaiDan;
class PaiDanController extends Controller
{

    function index(Request $request)
    {
        $paidans = PaiDan::orderBy('id','desc')->get();

        return view('Admin.paidan.index',['paidans'=>$paidans]);
    }

    //显示创建管理员页面
    function create()
    {
        $users = User::all();

        return view('Admin.paidan.create',['users'=>$users]);
    }

    //处理添加派单
    function add(Request $request)
    {
        $data = $request->all();

        $paidan = new PaiDan();

        $paidan->user_id = $data['user_id'];

        $paidan->name = $data['name'];

        $paidan->phone = $data['phone'];

        $paidan->info = $data['info'];

        $res = $paidan->save();

        if ($res) {

            return redirect('/admin/paidan/index')->with('success', '派单成功');

        } else {

            return back()->with('error', '派单失败');
        }
    }


    //显示创建管理员页面
    function delete(Request $request,$id)
    {
        $res = PaiDan::destroy($id);

        if ($res) {
            return back()->with('success', '删除派单成功');
        }
    }
}
