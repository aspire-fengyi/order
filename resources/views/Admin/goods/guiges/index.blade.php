@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>产品管理<i class="fa fa-angle-right"></i>产品规格
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

    <a href="<?php echo route('admin.goods.goodGuigeCreate', ['id' => $good->id]);?> "><button class="btn btn-primary">添加规格</button></a>
    <table id="table-force-off">
        <thead>
        <tr>
            <th  class="text-center" colspan=6>产品规格</th>
        </tr>



        </thead>
        <tbody>
        <tr>
            <td class="text-center" >产品ID：{{$good->id}}</td>
            <td class="text-center" colspan=3>产品名称：{{$good->good_name}}</td>
            <td class="text-center" >
                <img src="{{$good->goodModel->image_path}}" alt="产品缩略图" style="height: 80px;width: 150px">
            </td>
            <td class="text-center" >操作</td>
        </tr>
        <tr>
            <th  class="text-center" >规格id</th>
            <th  class="text-center" >编码</th>
            <th  class="text-center" >规格</th>
            <th  class="text-center" >规格描述</th>
            <th  class="text-center" >价格：元/{{$good->goodModel->price_desc}}</th>
            <th  class="text-center" >操作</th>
        </tr>
        @foreach($good->goodGuiges as $guige_date)
            <tr>
                <td class="text-center" >{{$guige_date->id}}</td>
                <td class="text-center" >{{$guige_date->bianma}}</td>
                <td class="text-center" >{{$guige_date->guige}}</td>
                <td class="text-center" >{{$guige_date->guige_desc}}</td>
                <td class="text-center">
                    <ul style="list-style: none;" class="text-left">

                        <li style="margin: 5px 0;">
                            市场价：{{$guige_date->shichang_price}}
                        </li>
                        <li style="margin: 5px 0;">
                            合作价：{{$guige_date->hezuo_price}}
                        </li>
                        <li style="margin: 5px 0;">
                            代理价：{{$guige_date->daili_price}}
                        </li>
                    </ul>
                </td>
                <td class="text-center" >

                    <a href="<?php echo route('admin.goods.goodGuigeEdit', ['id' => $guige_date->id]);?> "><button class="btn btn-primary">修改</button></a>
                    <a href="<?php echo route('admin.goods.goodGuigeDelete', ['id' => $guige_date->id]);?> "><button class="btn btn-danger">删除</button></a>

                </td>

            </tr>

        @endforeach
        </tbody>
    </table>

@endsection