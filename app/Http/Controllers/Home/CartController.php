<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\GoodGuige;
use App\Models\Cart;
use \DB;


class CartController extends Controller
{

    function cartsAdd(Request $request, $id)
    {
        $data = $request->all();

//        dd($data);




        $id = session('homeUser')['id'];

        $user = User::find($id);

        $userCarts = $user->carts;

        //判断相同产品是否存在购物车,如果存在只添加数量就可以
        if($userCarts){
            foreach ($userCarts as $k=>$userCart){
                if($userCart['guige_id']==$data['guige_id']  && $userCart['color_id']==$data['color_id']){

                    $userCart->number = $userCart['number']+$data['number'];

                    $res = $userCart->save();

                    if($res){
                        //用户表和购物车表一对多关系建立
                        return redirect('/home/carts/index');
                    }
                }
            }
        }

        $goodGuige = GoodGuige::find($data['guige_id']);

        $good = $goodGuige->whichGood;


        if  (session('homeUser')['jibie'] == 0) {
            $price = $goodGuige->hezuo_price;
        } elseif (session('homeUser')['jibie'] == 1) {
            $price = $goodGuige->daili_price;
        }else{
            return redirect('/home/login/');
        }



        $cart = new Cart;

        $cart->user_id = session('homeUser')['id'];

        $cart->good_id = $good->id;

        $cart->guige_id = $data['guige_id'];

        $cart->color_id = $data['color_id'];

        $cart->number = $data['number'];

        $cart->price = $price;

        $cart->price_number = $goodGuige->price_number;

        $res = $cart->save();

        if($res){
            //用户表和购物车表一对多关系建立
            return redirect('/home/carts/index');
        }

    }

    //购物车详情路由
    function index()
    {
        $id = session('homeUser')['id'];

        $user = User::find($id);

        return view('Home.carts.index',['user'=>$user]);
    }

    //删除购物车路由
    function delete(Request $request,$id)
    {
        $res = Cart::destroy($id);

        if($res){
            return back();
        }
    }

}
