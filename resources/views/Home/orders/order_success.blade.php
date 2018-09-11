@extends('Home.layouts.index')

@section('content')


    <div class="wt1080">
        <!--------------标题----------->
        <div class="my_order1">
            <h1>提交订单</h1>
            <div class="place">

            </div>
        </div>
        <!-----------订单提交-------------->
        <div class="finish">
            <div class="rr">
                <span class="one">订单提交成功，请尽快付款！</span>
            </div>
            <div class="dd">
                <p style="width: 900px;">
                    @foreach($order->orderGoods as $orderGood)
                        {{$orderGood->cart->good->good_name}}{{$orderGood->cart->goodGuige->guige}}{{$orderGood->cart->goodColor->color}}&nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach
                    等{{$order->total_number}}件商品。。。
                </p>
                <p>收货信息：{{$order->addr->addr}} &nbsp; &nbsp; &nbsp;{{$order->addr->addr_name}} &nbsp;&nbsp;&nbsp;{{$order->addr->addr_phone}}</p>
                <a href="/home/orders/index">我的订单&gt;&gt;</a>
            </div>
        </div>
        <!----------------支付信息------------------->
        <div class="pay">
            <div class="roo">支付信息<span></span></div>
            <div class="kk">
                <div class="tt">
                    商品金额：<span>￥{{$order->total_price}}</span>
                </div>

            </div>
        </div>
    </div>


@endsection