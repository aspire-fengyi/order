@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>订单管理
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




    <div class="clearfix text-center"></div>

    <div style="margin-top: -50px">
        <div class="agile-grids">
            <!-- tables -->

            <div class="agile-tables">


                <table id="table-two-axis" class="two-axis text-center">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">订单id</th>
                        <th class="text-center">订单编号</th>
                        <th class="text-center">合作商名</th>
                        <th class="text-center">所属管理员</th>
                        <th class="text-center">查看详情</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order )
                    <tr>
                        <td class="text-center">{{$order->id}}</td>
                        <td class="text-center">{{$order->order_number}}</td>
                        <td class="text-center">{{$order->whichUser->name}}</td>
                        <td class="text-center">{{$order->whichUser->admin_user_who->name}}</td>
                        <td class="text-center">
                            <a href="<?php echo route('admin.orders.info',['id'=>$order->id])?>">
                                <button class="btn btn-info">查看详情</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>


            </div>
            <!-- //tables -->
        </div>

    </div>



@endsection