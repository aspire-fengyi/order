<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrdersController extends Controller
{
    //

    //全部订单列表
    function index(Request $request)
    {

        $data = $request->all();

        if(isset($data['order_number'])){
            $orders = Order::where('order_number',$data['order_number'])->orderBy('id','desc')->get();
            return view('Admin/orders/index',['orders'=>$orders]);

        }

        $orders = Order::orderBy('id','desc')->get();

        return view('Admin/orders/index',['orders'=>$orders]);
    }

    //订单列表详情
    function info(Request $request,$id)
    {
        $order = Order::find($id);
       return view('Admin.orders.info',['order'=>$order]);
    }

    //改变订单状态
    function status(Request $request,$id)
    {
        $data = $request->all();

        $order = Order::find($id);

        $order->status = $data['status'];

        $res = $order->save();

        if($res){
            return back()->with('success','修改订单状态成功');
        }
    }

    //新增订单列表
    function new()
    {
        $orders = Order::where('status','0')->orderBy('id')->get();


        return view('Admin/orders/new',['orders'=>$orders]);
    }

    //待发货订单列表
    function daifahuo()
    {
        $orders = Order::where('status','1')->orderBy('id')->get();

        return view('Admin/orders/daifahuo',['orders'=>$orders]);
    }

    //已经发货订单列表
    function yifahuo()
    {
        $orders = Order::where('status','2')->orderBy('id')->get();

        return view('Admin/orders/daifahuo',['orders'=>$orders]);
    }


    //打印订单
    function info_dayin(Request $request ,$id)
    {
        $order = Order::find($id);

        return view('Admin/orders/dayin',['order'=>$order]);
    }
}
