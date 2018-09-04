@extends('Home.layouts.index')

@section('content')



    <!-----------------内容------------------>
    <div class="wt1080 middle">
        <div class="fl">
            <div style="padding: 0 24px;"><h1>用户名称</h1></div>
            <ul>
                <li class="current"><a href="/home/orders/index/">我的订单</a></li>

                <li><a href="/home/carts/index/">我的购物车</a></li>
            </ul>
        </div>
        <div class="fr">
            <div class="c_r_t">
                <ul>
                    <li class="current"><a href="#">回收站</a></li>

                </ul>
                <div class="clear"></div>
            </div>

            <!----------------搜索---------------->
            @if (session('success'))
                <div class="alert alert-success"style="color: green;font-size: 18px;margin-top: 10px" >
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" style="color: red;font-size: 18px;margin-top: 10px">
                    {{ session('error') }}
                </div>
            @endif



        <!---------------订单列表----------------->
            <div class="c_r_o">
                <!------------表单------------->
                @foreach($laJiOrders as $order)
                    @if($order->status !=100 )

                    <div style="background-color: #ebebeb">
                    <div class="ttt" style="margin-left: 20px;">
                        <span style="font-size: 13px;">订单号：{{$order->order_number}}</span>
                        <span style="font-size: 13px">下单时间：{{$order->created_at}}</span>
                    </div>
                    <table>
                        <tr>
                            <th style="width: 200px;">商品</th>
                            <th style="width: 90px;">产品基数</th>
                            <th style="width: 90px;">售价（元）</th>
                            <th style="width: 90px;">数量</th>
                            <th style="width: 90px;">价格</th>
                        </tr>


                        @foreach($order->orderGoods as $k=>$orderGood)

                            <tr>
                                <td>
                                    <div class="ff_one">
                                        <div class="pic"><img style="width: 75px;height: 75px"
                                                              src="{{$orderGood->cart->good->goodModel->image_path}}">
                                        </div>
                                        <div class="miaoshu"><a href="#">{{$orderGood->cart->good->good_name}} &nbsp;
                                                &nbsp; {{$orderGood->cart->goodGuige->guige}} &nbsp;
                                                &nbsp;{{$orderGood->cart->goodColor->color}}  </a></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="ff_two">
                                        <p>{{$orderGood->cart->price_number}} {{$orderGood->cart->good->goodModel->price_desc}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="ff_two">
                                        <p>{{$orderGood->cart->price}}
                                            / {{$orderGood->cart->good->goodModel->price_desc}} </p>
                                    </div>
                                </td>
                                <td>
                                    <div class="ff_three">{{$orderGood->cart->number}}</div>
                                </td>
                                <td>
                                    <div class="ff_two">
                                        <p>{{$orderGood->cart->price*$orderGood->cart->number*$orderGood->cart->price_number}}</p>

                                    </div>
                                </td>

                            </tr>

                        @endforeach


                        <tr>
                            <th style="float: left;text-align: left;margin-left: 20px;">总计（元）:{{$order->total_price}}</th>
                        </tr>
                        <tr>
                            <th style="float: left;text-align: left;margin-left: 20px;">商品总数:{{$order->total_number}}</th>
                        </tr>
                        <tr>
                            <th style="float: left;text-align: left;margin-left: 20px;">订单状态:
                                @if($order->status == 0)
                                    <span style="color: red">未发货</span>
                                @elseif($order->status == 1)
                                    <span style="color: green">已发货</span>
                                @elseif($order->status == 2)
                                    <span style="color: blue">已收货</span>
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th style="float: left;text-align: left;margin-left: 20px;">
                                操作:
                                <a href="<?php echo route('home.order.huiFuOrder',['id'=>$order->id]);?>" style="color: darkgreen" >恢复订单</a>
                                <a href="<?php echo route('home.order.delete',['id'=>$order->id]);?>" style="color: red;margin-left: 20px"  onclick="return confirm('确认要删除该订单吗?删除不可找回!!!');">永久删除</a>
                            </th>

                        </tr>


                    </table>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    @endif

                @endforeach

            </div>
            <!------------------热销推荐--------------------->
        </div>
        <div class="clear"></div>

    </div>










@endsection