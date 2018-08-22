@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>合作商管理<i class="fa fa-angle-right"></i>合作商列表<i class="fa fa-angle-right"></i>合作商详情
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
    <div class="agile-grids">
        <!-- tables -->

        <div class="agile-tables">

            {{--显示合作商详情页面--}}
            <h3>合作商详情</h3>
            <table id="table-two-axis" class="two-axis">
                <thead>
                <tr>
                    <th class="text-center">姓名</th>
                    <th class="text-center">合作商级别</th>
                    <th class="text-center">性别</th>
                    <th class="text-center">电话</th>
                    <th class="text-center">所属管理员</th>
                    <th class="text-center">头像</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td class="text-center">{{$user_data->name}}</td>

                    <td class="text-center">
                        @if($user_data->jibie==0)
                            普通代理
                        @elseif($user_data->jibie==1)
                            市级代理
                        @elseif($user_data->jibie==2)
                            省级代理
                        @endif
                    </td>

                    <td class="text-center">
                        @if($user_data->userInfo->sex==1)
                            男
                        @elseif($user_data->userInfo->sex==2)
                            女
                        @elseif($user_data->userInfo->sex==0)
                            保密
                        @endif
                    </td>

                    <td class="text-center">{{$user_data->userInfo->phone}}</td>


                    <td class="text-center">{{$user_data->admin_user_who->name}}</td>

                    <td class="text-center">
                        <img src="{{$user_data->userInfo->photo_path}}" alt="头像" style="height: 40px;width: 40px">
                    </td>

                    <td class="text-center">
                        <a href="<?php echo route('admin.users.edit',['id'=>$user_data->id]); ?>" onclick="return confirm('确认要修改该合作商吗?');"><button class="btn btn-info">修改</button></a>
                        <a href="<?php echo route('admin.users.delete',['id'=>$user_data->id]); ?>" onclick="return confirm('确认要删除该合作商吗?');"><button class="btn btn-danger">删除</button></a>
                    </td>

                </tr>

                </tbody>
            </table>
            {{--合作商详情页面显示结束--}}

            <h3>合作商收货地址</h3>
            <a href="<?php echo route('admin.users.addr_create',['id'=>$user_data->id]); ?>" onclick="return confirm('确认要添加收货地址吗?');"><button class="btn btn-primary" >添加收货地址</button></a>


            <table id="table-two-axis" class="two-axis">
                <thead>
                <tr>
                    <th class="text-center">收货人姓名</th>
                    <th class="text-center">收货人电话</th>
                    <th class="text-center">收货人地址</th>
                    <th class="text-center">操作</th>

                </tr>
                </thead>
                <tbody>

                @foreach($user_addrs as $k=>$v )
                <tr>
                    <td class="text-center">{{$v->addr_name}}</td>
                    <td class="text-center">{{$v->addr_phone}}</td>
                    <td class="text-center">{{$v->addr}}</td>
                    <td class="text-center">
                        <a href="<?php echo route('admin.users.addr_edit',['userId'=>$user_data->id,'id'=>$v->id]); ?>" onclick="return confirm('确认要修改该收货地址吗?');"><button class="btn btn-info">修改</button></a>
                        <a href="<?php echo route('admin.users.addr_delete',['userId'=>$user_data->id,'id'=>$v->id]); ?>" onclick="return confirm('确认要删除该收货地址吗?');"><button class="btn btn-danger">删除</button></a>
                    </td>

                </tr>
                @endforeach

                </tbody>
            </table>


        </div>
        <!-- //tables -->
    </div>

@endsection