@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>轮播图管理<i class="fa fa-angle-right"></i>轮播图列表
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
    <a href="<?php echo route('admin.lunbos.create'); ?>"><button class="btn btn-primary">添加轮播</button></a>
    <div class="grid-form1">
    <h3>轮播图列表</h3>
    <table id="table-force-off">
        <thead>
        <tr>
            <th  class="text-center" >Id</th>
            <th  class="text-center" >名称</th>
            <th  class="text-center" >链接</th>
            <th  class="text-center" >图片</th>
            <th  class="text-center" >当前状态</th>
            <th  class="text-center" >操作</th>
        </tr>

        </thead>
        <tbody>
        @foreach($lunbos as $lunbo)
        <tr>
            <td  class="text-center" >{{$lunbo->id}}</td>
            <td  class="text-center" >{{$lunbo->lunbo_name}}</td>
            <td  class="text-center" >{{$lunbo->lunbo_http}}</td>
            <td  class="text-center" >
                <img src="{{$lunbo->image_path}}" alt="产品颜色缩略图" style="height: 80px;width: 150px">
            </td>
            <td  class="text-center" >
                @if($lunbo->status==1)
                    <a href="<?php echo route('admin.lunbos.yincang',['id'=> $lunbo->id]); ?>" ><button class="btn btn-primary">显示</button></a>

                @else
                    <a href="<?php echo route('admin.lunbos.xianshi',['id'=> $lunbo->id]); ?>" ><button class="btn btn-hover btn-dark">隐藏</button></a>

                @endif
            </td>
            <td class="text-center">
                <a href="<?php echo route('admin.lunbos.delete',['id'=> $lunbo->id]); ?>" onclick="return confirm('确认要删除该轮播吗?');"><button class="btn btn-danger">删除</button></a>

            </td>


        </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection