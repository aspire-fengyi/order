@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>管理员管理
        <i class="fa fa-angle-right"></i>管理员列表
    </li>

@endsection
@section('content')

    <div class="clearfix text-center"></div>

    <div>

        <div style="margin-top: -50px">
            <div class="agile-grids">
                <!-- tables -->

                <div class="agile-tables">


                    <table id="table-two-axis" class="two-axis text-center">
                        <thead>
                        <tr class="text-center">
                            <th class="text-center">姓名</th>
                            <th class="text-center">性别</th>
                            <th class="text-center">年龄</th>
                            <th class="text-center">手机号</th>
                            <th class="text-center">管理级别</th>
                            <th class="text-center">头像</th>
                            <th class="text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--第一次遍历 将返回的有分级的数据其中的一级数据遍历出来--}}
                        @foreach ($users as $k => $v)
                            {{--第二层遍历，找出二级权限--}}
                            @foreach($v->sub as $kk=>$vv)
                                {{--第二层遍历中用到一对多方法，找出组长信息，--}}
                                @foreach($vv->users as $zu=>$zuzhang)


                                    <tr>
                                        <td class="text-center">{{$zuzhang->name}}</td>
                                        <td class="text-center">
                                            @if($zuzhang->sex==1)
                                                男
                                            @elseif($zuzhang->sex==2)
                                                女
                                            @elseif($zuzhang->sex==0)
                                                保密
                                            @endif
                                        </td>
                                        <td class="text-center">{{$zuzhang->date}}</td>
                                        <td class="text-center">{{$zuzhang->phone}}</td>
                                        <td class="text-center">{{$v->leader_name}}
                                            ：{{$zuzhang->leader_who->leader_name}}</td>
                                        <td class="text-center">
                                            <img src="{{$zuzhang->photo_path}}" alt="头像"
                                                 style="height: 40px;width: 40px">
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo route('admin.users.admin_edit', ['id' => $zuzhang->id]); ?>"
                                               onclick="return confirm('确认要修改该用户吗?');">
                                                <button class="btn btn-info">修改</button>
                                            </a>
                                            <a href="<?php echo route('admin.users.admin_delete', ['id' => $zuzhang->id]); ?>"
                                               onclick="return confirm('确认要删除该用户吗?');">
                                                <button class="btn btn-danger">删除</button>
                                            </a>

                                        </td>
                                    </tr>

                                @endforeach
                                {{--第三层遍历，找出组内权限，即组员--}}

                                @foreach($vv->sub as $kkk=>$vvv)

                                    @foreach($vvv->users as $xiaozu=>$zuyuan)
                                        <tr>
                                            <td class="text-center">{{$zuyuan->name}}</td>
                                            <td class="text-center">
                                                @if($zuyuan->sex==1)
                                                    男
                                                @elseif($zuyuan->sex==2)
                                                    女
                                                @elseif($zuyuan->sex==0)
                                                    保密
                                                @endif

                                            </td>
                                            <td class="text-center">{{$zuyuan->date}}</td>
                                            <td class="text-center">{{$zuyuan->phone}}</td>
                                            <td class="text-center">{{$v->leader_name}}
                                                ：{{$zuzhang->leader_who->leader_name}}
                                                -{{$zuyuan->leader_who->leader_name}}</td>
                                            <td class="text-center">
                                                <img src="{{$zuyuan->photo_path}}" alt="头像"
                                                     style="height: 40px;width: 40px">

                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo route('admin.users.admin_edit', ['id' => $zuyuan->id]); ?>"
                                                   onclick="return confirm('确认要修改该用户吗?');">
                                                    <button class="btn btn-info">修改</button>
                                                </a>
                                                <a href="<?php echo route('admin.users.admin_delete', ['id' => $zuyuan->id]); ?>"
                                                   onclick="return confirm('确认要删除该用户吗?');">
                                                    <button class="btn btn-danger">删除</button>
                                                </a>

                                            </td>
                                        </tr>

                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach


                        </tbody>
                    </table>


                </div>
                <!-- //tables -->
            </div>

        </div>
    </div>
@endsection