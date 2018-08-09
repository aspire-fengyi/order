@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>管理员管理 <i class="fa fa-angle-right"></i>管理员列表</li>

@endsection
@section('content')
    <div class="agile-grids">
        <!-- tables -->

        <div class="agile-tables">

            <h3>管理员列表</h3>
            <table id="table-two-axis" class="two-axis">
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>年龄</th>
                    <th>手机号</th>
                    <th>管理级别</th>
                    <th>头像</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $k=>$v)
                <tr>
                    <td>{{$v->name}}</td>
                    <td>
                        @if($v->sex==1)
                            男
                        @elseif($v->sex==2)
                            女
                        @elseif($v->sex==0)
                            保密
                        @endif
                    </td>
                    <td>{{$v->date}}</td>
                    <td>{{$v->phone}}</td>
                    <td>{{$v->leader_who->leader_name}}</td>
                    <td>
                        <img src="{{$v->photo_path}}" alt="头像" style="height: 40px;width: 40px">
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>


        </div>
        <!-- //tables -->
    </div>

@endsection