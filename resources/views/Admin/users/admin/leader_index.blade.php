@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>管理员管理 <i class="fa fa-angle-right"></i>权限显示</li>

@endsection
@section('content')
    <div class="agile-grids">
        <!-- tables -->

        <div class="agile-tables">

            <h3>管理员权限</h3>
            <table id="table-two-axis" class="two-axis">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>级别名称</th>
                    <th>父级分类</th>
                    <th>分类路径</th>
                    <th>状态</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                @foreach($leaders_data as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->leader_name}}</td>
                    <td>{{$v->pid}}</td>
                    <td>{{$v->path}}</td>
                    <td>{{$v->status}}</td>
                    <td>修改，删除</td>

                </tr>

                @endforeach

                </tbody>
            </table>


        </div>
        <!-- //tables -->
    </div>



@endsection