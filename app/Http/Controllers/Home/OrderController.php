<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cart;
use App\Models\BeforeOrders;
use \DB;

class OrderController extends Controller
{

    //在加入入订单之前 储存 cart_id
    function beforeOrders(Request $request)
    {
        $user_id = session('homeUser')['id'];

        $data = $request->all();

        $arr = [];

        foreach($data['carts'] as $cart){

            $arr[] = ['user_id'=>$user_id,'cart_id'=>$cart];

        }

        //批量插入
        $res = DB::table('before_orders')->insert($arr);

        if($res){
            return redirect('/home/orders/index/');
        }


    }


    //显示订单详情页面
    function ordersIndex()
    {
        $id = session('homeUser')['id'];

        $user = User::find($id);

        $beforeOrders = $user->beforeOrders;

        $totalNumber = 0;

        $totalPrice = 0;

        foreach ($beforeOrders as $beforeOrder){

            $totalNumber += $beforeOrder->cart->number;

            $totalPrice += $beforeOrder->cart->number * $beforeOrder->cart->price_number * $beforeOrder->cart->price;

        }

//        echo $totalPrice;
//
//        dd($beforeOrders);

//        $totalNUmber = DB::table('before_orders')->where('user_id',$id)->count();
//
//        dd($totalNUmber);


        return view('Home.orders.index',['user'=>$user,'totalNumber'=>$totalNumber,'totalPrice'=>$totalPrice]);
    }

}
