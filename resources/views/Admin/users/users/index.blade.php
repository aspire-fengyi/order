@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>合作商管理 <i class="fa fa-angle-right"></i>合作商列表</li>

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
                            {{--显示二级权限名称，基本上是小组--}}
                            <h3>{{$vv->leader_name}}</h3>

                            <table id="table-two-axis" class="two-axis text-center">
                                <thead>
                                <tr class="text-center">
                                    <th class="text-center">合作商</th>
                                    <th class="text-center">合作商级别</th>
                                    <th class="text-center">电话</th>

                                    <th class="text-center">所属管理员</th>
                                    <th class="text-center">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--第二层遍历中用到一对多方法，找出合作商信息，--}}
                                @foreach($vv->hezuoshang as $hezuoshang)


                                    <tr>
                                        <td class="text-center" >{{$hezuoshang->name}}</td>

                                        <td class="text-center">
                                            @if($hezuoshang->jibie==0)
                                                普通代理
                                            @elseif($hezuoshang->jibie==1)
                                                市级代理
                                            @elseif($hezuoshang->jibie==2)
                                                省级代理
                                            @endif
                                        </td>

                                        <td class="text-center" >{{$hezuoshang->userInfo->phone}}</td>

                                        <td class="text-center" >{{$hezuoshang->admin_user_who->name}}</td>


                                        <td class="text-center">
                                            <a href="<?php echo route('admin.users.show_info',['id'=>$hezuoshang->id]); ?>" ><button class="btn btn-info">查看详情</button></a>
                                            <a href="<?php echo route('admin.users.edit',['id'=>$hezuoshang->id]); ?>" onclick="return confirm('确认要修改该合作商吗?');"><button class="btn btn-danger">修改</button></a>
                                            <a href="<?php echo route('admin.users.delete',['id'=>$hezuoshang->id]); ?>" onclick="return confirm('确认要删除该合作商吗?');"><button class="btn btn-danger">删除</button></a>
                                        </td>
                                    </tr>

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