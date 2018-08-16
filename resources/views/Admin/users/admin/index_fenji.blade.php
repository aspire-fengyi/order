@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>管理员管理 <i class="fa fa-angle-right"></i>管理员列表</li>

@endsection
@section('content')

    {{--导航--}}
    <div class="bg-effect">
        <ul class="bt-list">
            @foreach ($users as $k => $v)
                {{--做判断是因为第一个按钮和左边不对其，加了一个margin--}}
                @if($k==0||$k==6)
                <li id="" class="col-md-2 daohang" style="margin-left: -15px" ><a href="#" class="hvr-icon-pulse col-11 ">{{$v->leader_name}}</a></li>
                @else
                <li id="" class="col-md-2 daohang"  ><a href="#" class="hvr-icon-pulse col-11 ">{{$v->leader_name}}</a></li>
                @endif
            @endforeach

        </ul>

    </div>
    {{--导航结束--}}

    {{--js选项卡显示--}}
    <script>
        $(function(){
            $('.daohang').click(function(){


                var n =$(this).index();
                console.log(n);
                $('.xianshi').css('display','none');
                $('.xianshi').eq(n).css('display','block');
                $(this).children().removeClass('col-11').addClass('col-1');
                $(this).siblings().children().removeClass('col-1').addClass('col-11');

            })

        })
    </script>

    {{--js选项卡结束--}}

<div class="clearfix text-center" > </div>


    {{--第一次遍历 将返回的有分级的数据其中的一级数据遍历出来--}}
    @foreach ($users as $k => $v)
        <div class="xianshi" @if($k==0) style="display: block" @else style="display: none" @endif>
    <div class="inbox-mail " id="" >

        <div class="col-md-4 compose w3layouts">

            {{--显示一级权限名称--}}
            <h2>{{$v->leader_name}} </h2>
            <nav class="nav-sidebar">

                {{--一级分类--}}
                <ul class="nav tabs">
                    {{--运用一对多模型方法，找出此权限下有哪些管理人员信息，并将人员名称遍历出来--}}
                    @foreach($v->users as $fen => $fengongsi)
                        {{--显示主要部门负责人名称--}}
                    <li class="">
                        <a href="#tab1" data-toggle="tab" aria-expanded="true"><i class="fa fa-inbox"></i>负责人：{{$fengongsi->name}} </a>
                    </li>

                        <a href="<?php echo route('admin.users.admin_edit',['id'=>$fengongsi->id]); ?>" onclick="return confirm('确认要修改该用户吗?');"><button class="btn btn-info">修改</button></a>
                        <a href="<?php echo route('admin.users.admin_delete',['id'=>$fengongsi->id]); ?>" onclick="return confirm('确认要删除该用户吗?');"><button class="btn btn-danger">删除</button></a>

                    @endforeach
                </ul>
            </nav>

        </div>
        <div class="clearfix"> </div>


    </div>
    <div style="margin-top: -50px">
    <div class="agile-grids">
        <!-- tables -->

        <div class="agile-tables">

            {{--第二层遍历，找出二级权限--}}
            @foreach($v->sub as $kk=>$vv)
                {{--显示二级权限名称，基本上是组长--}}
            <h3>{{$vv->leader_name}}</h3>

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
                {{--第二层遍历中用到一对多方法，找出组长信息，--}}
                @foreach($vv->users as $zu=>$zuzhang)


                    <tr>
                        <td class="text-center" >{{$zuzhang->name}}</td>
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
                        <td class="text-center">{{$zuzhang->leader_who->leader_name}}</td>
                        <td class="text-center">
                            <img src="{{$zuzhang->photo_path}}" alt="头像" style="height: 40px;width: 40px">
                        </td>
                        <td class="text-center">
                            <a href="<?php echo route('admin.users.admin_edit',['id'=>$zuzhang->id]); ?>" onclick="return confirm('确认要修改该用户吗?');"><button class="btn btn-info">修改</button></a>
                            <a href="<?php echo route('admin.users.admin_delete',['id'=>$zuzhang->id]); ?>" onclick="return confirm('确认要删除该用户吗?');"><button class="btn btn-danger">删除</button></a>

                        </td>
                    </tr>

                    @endforeach
                    {{--第三层遍历，找出组内权限，即组员--}}

                    @foreach($vv->sub as $kkk=>$vvv)

                        @foreach($vvv->users as $xiaozu=>$zuyuan)
                        <tr>
                            <td class="text-center" >{{$zuyuan->name}}</td>
                            <td  class="text-center">
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
                            <td class="text-center">{{$zuyuan->leader_who->leader_name}}</td>
                            <td class="text-center">
                                <img src="{{$zuyuan->photo_path}}" alt="头像" style="height: 40px;width: 40px">

                            </td>
                            <td class="text-center">
                                <a href="<?php echo route('admin.users.admin_edit',['id'=> $zuyuan->id ]); ?>" onclick="return confirm('确认要修改该用户吗?');"><button class="btn btn-info">修改</button></a>
                                <a href="<?php echo route('admin.users.admin_delete',['id'=> $zuyuan->id]); ?>" onclick="return confirm('确认要删除该用户吗?');"><button class="btn btn-danger">删除</button></a>

                            </td>
                        </tr>

                        @endforeach


                    @endforeach


                </tbody>
            </table>
            @endforeach


        </div>
        <!-- //tables -->
    </div>

    </div>
        </div>
    @endforeach
@endsection