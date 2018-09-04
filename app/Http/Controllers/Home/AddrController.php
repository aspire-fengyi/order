<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersAddrUpdateRequest;
use App\Models\UserAddr;
use App\Models\User;



class AddrController extends Controller
{



    //增加收货地址路由
    function create(Request $request)
    {
        return view('Home.addr.create');
    }

    //添加合作商地址处理路由
    function add(UsersAddrUpdateRequest $request, $id)
    {
        $data = $request->all();

        $addr_add = new UserAddr;

        $addr_add->user_id = $id;

        $addr_add->addr_name = $data['addr_name'];

        $addr_add->addr = $data['addr'];

        $addr_add->addr_phone = $data['addr_phone'];

        $res = $addr_add->save();

        if ($res) {
            //添加成功，返回购物车页
            return redirect("/home/carts/index")->with('success', '添加收货地址成功');
        } else {
            return back()->with('error', '添加收货地址失败');
        }
    }

    function edit(Request $request,$id)
    {

        $addr = UserAddr::find($id);


        return view('Home.addr.edit',['addr'=>$addr]);
    }

    function update(UsersAddrUpdateRequest $request,$id)
    {

        $data = $request->all();

        $addr = UserAddr::find($id);

        $addr->addr_name = $data['addr_name'];

        $addr->addr_phone = $data['addr_phone'];

        $addr->addr = $data['addr'];

        $res = $addr->save();

        if($res){
            return redirect('/home/carts/index')->with('success','修改收货地址成功');
        }else{
            return back()->with('error','修改收货地址失败');
        }
    }



}
