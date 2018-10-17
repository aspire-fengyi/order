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
                        <th class="text-center">派单id</th>
                        <th class="text-center">接单运营商</th>
                        <th class="text-center">订单联系人</th>
                        <th class="text-center">联系人电话</th>
                        <th class="text-center">创建时间</th>
                        <th class="text-center">派单详情</th>
                        <th class="text-center">状态</th>
                        <th class="text-center">删除</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paidans as $paidan )
                    <tr>
                        <td class="text-center">{{$paidan->id}}</td>
                        <td class="text-center">{{$paidan->who->name}}</td>
                        <td class="text-center">{{$paidan->name}}</td>
                        <td class="text-center">{{$paidan->phone}}</td>
                        <td class="text-center">{{$paidan->created_at}}</td>
                        <td class="text-center">{{$paidan->info}}</td>
                        @if($paidan->status==0)
                        <td class="text-center" style="color:red">未接单</td>
                        @elseif($paidan->status==1)
                        <td class="text-center"  style="color:green">已接单</td>
                        @endif
                        <td class="text-center">
                            <a href="<?php echo route('admin.paidan.delete', ['id' =>$paidan->id]); ?>"
                               onclick="return confirm('确认要删除该派单信息吗?');">
                                <button class="btn btn-danger">删除</button>
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