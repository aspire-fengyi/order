<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cart;
use App\Models\BeforeOrders;
use App\Models\Order;
use App\Models\OrderGood;
use \DB;

class OrderController extends Controller
{

    //生成定安路由
    function orderAdd(Request $request)
    {

        $data = $request->all();


//        dd($data);
        if (!isset($data['carts'])) {
            return back()->with('error', '请至少选择一种商品');
        }

        if (!isset($data['addr_id'])) {
            return back()->with('error', '请选择一个收货地址');
        }

        //接收购物车信息和地址信息
        $data = $request->all();

        $user_id = session('homeUser')['id'];

        //生成订单编号
        $order_number = date('Ymd') . time() . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);

        $total_price = 0;

        $total_number = 0;

        foreach ($data['carts'] as $cart_id) {

            $cart = Cart::find($cart_id);

            //订单商品总价格
            $total_price += $cart->number * $cart->price_number * $cart->price;

            //订单商品总数量
            $total_number += $cart->number;

        }

        $order = new Order();

        $order->user_id = $user_id;

        $order->order_number = $order_number;

        $order->beizhu = $data['beizhu'];

        $order->addr_id = $data['addr_id'];

        $order->total_price = $total_price;

        $order->total_number = $total_number;

        $res1 = $order->save();

        //获取订单id
        $order_id = DB::getPdo()->lastInsertId();


        //设置空数组,为了存储购物车id
        $arr = [];

        foreach ($data['carts'] as $cart_id) {

            //储存批量插入信息
            $arr[] = ['order_id' => $order_id, 'cart_id' => $cart_id];

            //改变购物车status值
            $cart_update = Cart::find($cart_id);
            $cart_update->status = 1;
            $cart_update->save();
        }

        //批量插入
        $res = DB::table('order_goods')->insert($arr);

        if ($res) {
            return redirect("/home/order/success/$order_id");
        }


    }

    //显示生成订单成功页路由
    function success(Request $request, $id)
    {
        $order = Order::find($id);

        return view('Home.orders.order_success', ['order' => $order]);
    }


    //显示订单详情页面
    function index()
    {
        $id = session('homeUser')['id'];

        $user = User::find($id);

        $orders = Order::where('user_id',$id)->orderBy('id','desc')->get();

        return view('Home.orders.index', ['user' => $user,'orders'=>$orders]);
    }


    //确认付款路由
    function fukuan(Request $request, $id)
    {
        $order = Order::find($id);

        $order->status = 1;

        $res = $order->save();

        if ($res) {
            return back()->with('success', '已付款');
        }


    }

    //收货路由
    function shouhuo(Request $request, $id)
    {
        $order = Order::find($id);

        $order->status = 3;

        $res = $order->save();

        if ($res) {
            return back()->with('success', '确认收货成功');
        }


    }

    //软删除订单路由
    function softDelete(Request $request, $id)
    {
        $res = Order::destroy($id);

        if ($res) {
            return back()->with('success', '删除订单成功');
        }
    }

    //订单回收站路由
    function laJiOrders()
    {

        $user_id = session('homeUser')['id'];

        $laJiOrders = Order::onlyTrashed()->where('user_id', $user_id)->get();

        return view('Home.orders.huishouzhan', ['laJiOrders' => $laJiOrders]);

    }

    //恢复订单路由
    function huiFuOrder(Request $request, $id)
    {
        $huiFuOrder = Order::withTrashed()->find($id);


        $res = $huiFuOrder->restore();

        if ($res) {
            return back()->with('success', '恢复订单成功,您可以在订单列表中查看');
        }

    }

    //彻底删除订单路由
    function delete(Request $request, $id)
    {
        $order = Order::withTrashed()->find($id);

        if ($order->status == 3) {
            $order->deleted_at=null;
            $order->status=5;
            $res = $order->save();

            return back()->with('success', '永久删除订单成功');

        } else {
            $orderGoods = OrderGood::where('order_id', $id)->get();

            $orderGoods_id = [];

            $carts_id = [];

            foreach ($orderGoods as $orderGood) {
                $orderGoods_id[] = $orderGood->id;
                $carts_id[] = $orderGood->cart_id;
            }


            $res = $order->forceDelete();

            if ($res) {
                $res2 = OrderGood::destroy($orderGoods_id);

                $res3 = Cart::destroy($carts_id);

                return back()->with('success', '永久删除订单成功');
            }
        }

    }

}
