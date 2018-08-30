@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>产品管理<i class="fa fa-angle-right"></i>产品图片
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

    <a href="<?php echo route('admin.goods.goodPictureCreate', ['id' => $good->id]);?> "><button class="btn btn-primary">添加图片</button></a>
    <table id="table-force-off">
        <thead>
        <tr>
            <th class="text-center" >产品名</th>
            <th class="text-center" >图片ID</th>
            <th class="text-center" >图片</th>
            <th class="text-center" >操作</th>
        </tr>
        </thead>
        <tbody>

        @foreach($good->goodPictures as $picture)
            <tr>
                <td class="text-center">{{$good->good_name}}</td>
                <td class="text-center">{{$picture->id}}</td>
                <td class="text-center" >
                    <img src="{{$picture->picture_path}}" alt="产品图" style="height: 80px;width: 150px">
                </td>
                <td class="text-center">
                    <a href="<?php echo route('admin.goods.goodPictureDelete', ['id' => $picture->id]);?> "><button class="btn btn-danger">删除</button></a>
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>

@endsection