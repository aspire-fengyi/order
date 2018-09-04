@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>订单详情
        <i class="fa fa-angle-right"></i>订单列表
    </li>

@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

        <title>订单详情</title>
        <style type="text/css">
            .order_number,
            .order_details {
                width: 100%;
                border-collapse: collapse;
                border-right: 1px solid #8f8f94;
                border-bottom: 1px solid #8f8f94;
                margin: 4px 0;
            }

            .order_number td,
            .order_details td{
                border: 1px solid #ACACB4;
                font-size: 14px;
                color: #000;
                padding: 4px 10px;
                line-height: 24px;
            }
            .order_number tr:first-child{
                text-align: center;
            }
            .order_number tr:nth-child(2) td:first-child{
                width: 150px;
            }
            .order_number tr:nth-child(2) td:last-child{
                width: 650px;
            }
            .order_number .back_btn{
                margin-left: 30px;
            }

            .order_details td{
                text-align: center;
            }
        </style>

    <form action="<?php echo route('admin.orders.status',['id'=>$order->id])?>" method="post">

        {{csrf_field()}}
        <table class="order_number">
            <tbody>
            <tr>
                <td colspan="2">订单编号：{{$order->order_number}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;下单日期：{{$order->created_at}}&nbsp;</td>
            </tr>

            <tr>
                <td>会员姓名：</td>
                <td>{{$order->whichUser->name}}</td>
            </tr>

            <tr>
                <td>收货人：</td>
                <td>{{$order->addr->addr_name}}</td>
            </tr>
            <tr>
                <td>收货人电话：</td>
                <td>{{$order->addr->addr_phone}}</td>
            </tr>
            <tr>
                <td>
                    送货地址：</td>
                <td>{{$order->addr->addr}}</td>
            </tr>
            <tr>
                <td>订单备注：</td>
                <td>{{$order->beizhu}}</td>
            </tr>
            <tr>
                <td>
                    订单状态：</td>
                <td>
                    @if($order->status ==5)
                        <div style="color: red">订单交易成功,用户已删除此订单</div>
                    @else
                    <select name="status">
                        <option value="0" @if($order->status == 0) selected="selected" @endif>未付款</option>
                        <option value="1" @if($order->status == 1) selected="selected" @endif>未处理</option>
                        <option value="2" @if($order->status == 2) selected="selected" @endif>已处理</option>
                        <option value="2" @if($order->status == 3) selected="selected" @endif>已收货</option>
                    </select>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;</td>
                <td>
                    @if($order->status ==5)
                        <a href="{{url()->previous()}}"  ><button type="button" >返回上一页</button></a>

                    @else
                        <input type="submit" class="submit" style="width: 95px" value="确认修改"/>

                        <a href="{{url()->previous()}}"  style="margin-left: 20px"><button type="button" >返回上一页</button></a>
                    @endif


                </td>
            </tr>
            </tbody>
        </table>

    </form>
    <br />
    <table class="order_details">
        <tbody>
        <tr>
            <td colspan="8" style="color: crimson;">
                定单明细</td>
        </tr>
        <tr>
            <td>产品名称</td>
            <td>产品编码</td>
            <td>产品规格</td>
            <td>产品基数</td>
            <td>颜色</td>
            <td>购买数量</td>
            <td>单价</td>
            <td>总价</td>
        </tr>
        @foreach($order->orderGoods as $orderGood)
        <tr>
            <td>{{$orderGood->cart->good->good_name}}</td>
            <td>{{$orderGood->cart->goodGuige->bianma}}</td>
            <td>{{$orderGood->cart->goodGuige->guige}}</td>
            <td>{{$orderGood->cart->price_number}} {{$orderGood->cart->good->goodModel->price_desc}}</td>
            <td>{{$orderGood->cart->goodColor->color}}</td>
            <td>{{$orderGood->cart->number}}</td>
            <td>￥{{$orderGood->cart->price}}</td>
            <td> ￥{{$orderGood->cart->price * $orderGood->cart->number * $orderGood->cart->price_number}}</td>
        </tr>
        @endforeach

        <tr>
            <td colspan="8" style="color: crimson;text-align: left;">
                总计数量：{{$order->total_number}}  件</td>
        </tr>
        <tr>
            <td colspan="8" style="color: crimson;text-align: left;">
                总计金额：￥{{$order->total_price}}  元</td>
        </tr>
        </tbody>
    </table>
    <a href="<?php echo route('admin.orders.info_dayin',['id'=>$order->id])?>"  style=""><button type="button" >打印</button></a>



@endsection