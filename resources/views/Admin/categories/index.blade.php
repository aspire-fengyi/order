@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>产品类别管理 <i class="fa fa-angle-right"></i>产品类别显示</li>

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

    <div class="agile-grids">
        <!-- tables -->

        <div class="agile-tables">

            <h3>产品类别</h3>
            <table id="table-two-axis" class="two-axis text-center">
                <thead class="text-center">
                <tr class="text-center">
                    <th class="text-center">ID</th>
                    <th class="">级别名称</th>
                    <th class="text-center">父级分类</th>
                    <th class="text-center">分类路径</th>
                    <th class="text-center">状态</th>
                    <th class="text-center">操作</th>

                </tr>
                </thead>
                <tbody  class="text-center">
                @foreach($categories_data as $k=>$v)
                <tr  class="text-center">
                    <td class="text-center">{{$v->id}}</td>
                    <td >{{$v->category_name}}</td>
                    <td class="text-center">{{$v->pid}}</td>
                    <td class="text-center">{{$v->path}}</td>
                    <td class="text-center">{{$v->status}}</td>
                    <td class="text-center">
                        <a href="<?php echo route('admin.categories.edit',['id'=>$v->id]); ?>" onclick="return confirm('确认要修改该产品类别吗?');"><button class="btn btn-info">修改</button></a>
                        <a href="<?php echo route('admin.categories.delete',['id'=>$v->id]); ?>" onclick="return confirm('确认要删除该产品类别吗?');"><button class="btn btn-danger">删除</button></a>

                    </td>

                </tr>

                @endforeach

                </tbody>
            </table>


        </div>
        <!-- //tables -->
    </div>



@endsection