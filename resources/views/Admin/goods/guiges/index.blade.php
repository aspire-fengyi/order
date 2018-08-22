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
            <th  class="text-center" colspan=5>产品规格</th>
        </tr>

        </thead>
        <tbody>
        <tr>
            <td class="text-center" >产品ID：{{$good->id}}</td>
            <td class="text-center" >产品名称：{{$good->good_name}}</td>
            <td class="text-center" colspan=2>
                <img src="{{$good->goodModel->image_path}}" alt="产品缩略图" style="height: 80px;width: 150px">
            </td>
            <td class="text-center" >操作</td>
        </tr>
        @foreach($good->goodGuiges as $guiges_date)
            <tr>
                <td class="text-center">规格：</td>
                <td class="text-center">{{$guiges_date->guige}}</td>
                <td colspan=2></td>
                <td class="text-center">

                    <a href="<?php echo route('admin.goods.goodGuigeDelete', ['id' => $guiges_date->id]);?> "><button class="btn btn-danger">删除</button></a>

                </td>

            </tr>

        @endforeach
        </tbody>
    </table>

@endsection