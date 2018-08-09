@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>管理员管理 <i class="fa fa-angle-right"></i>管理员列表</li>

@endsection
@section('content')

    <div class="inbox-mail">
        {{--第一次遍历 将返回的有分级的数据其中的一级数据遍历出来--}}
        @foreach ($users as $k => $v)
        <div class="col-md-4 compose w3layouts">

            {{--显示一级权限名称--}}
            <h2>{{$v->leader_name}} </h2>
            <nav class="nav-sidebar">

                {{--一级分类--}}
                <ul class="nav tabs">
                    {{--运用一对多模型方法，找出此权限下有哪些管理人员信息，并将人员名称遍历出来--}}
                    @foreach($v->users as $fen => $fengongsi)
                        {{--显示主要部门负责人名称--}}
                    <li class=""><a href="#tab1" data-toggle="tab" aria-expanded="true"><i class="fa fa-inbox"></i>负责人：{{$fengongsi->name}} </a></li>

                    @endforeach
                </ul>
            </nav>

        </div>
        <div class="clearfix"> </div>

        <div class="clearfix"> </div>
    </div>
    <div style="margin-top: -40px">
    <div class="agile-grids">
        <!-- tables -->

        <div class="agile-tables">

            {{--第二层遍历，找出二级权限--}}
            @foreach($v->sub as $kk=>$vv)
                {{--显示二级权限名称，基本上是组长--}}
            <h3>{{$vv->leader_name}}</h3>

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
                {{--第二层遍历中用到一对多方法，找出组长信息，--}}
                @foreach($vv->users as $zu=>$zuzhang)


                    <tr>
                        <td>{{$zuzhang->name}}</td>
                        <td>
                            @if($zuzhang->sex==1)
                                男
                            @elseif($zuzhang->sex==2)
                                女
                            @elseif($zuzhang->sex==0)
                                保密
                            @endif
                        </td>
                        <td>{{$zuzhang->date}}</td>
                        <td>{{$zuzhang->phone}}</td>
                        <td>{{$zuzhang->leader_who->leader_name}}</td>
                        <td>
                            <img src="{{$zuzhang->photo_path}}" alt="头像" style="height: 40px;width: 40px">
                        </td>
                    </tr>

                    {{--第三层遍历，找出组内权限，即组员--}}
                    @foreach($vv->sub as $kkk=>$vvv)
                        @foreach($vvv->users as $xiaozu=>$zuyuan)
                        <tr>
                            <td>{{$zuyuan->name}}</td>
                            <td>
                                @if($zuyuan->sex==1)
                                    男
                                @elseif($zuyuan->sex==2)
                                    女
                                @elseif($zuyuan->sex==0)
                                    保密
                                @endif

                            </td>
                            <td>{{$zuyuan->date}}</td>
                            <td>{{$zuyuan->phone}}</td>
                            <td>{{$zuyuan->leader_who->leader_name}}</td>
                            <td>
                                <img src="{{$zuyuan->photo_path}}" alt="头像" style="height: 40px;width: 40px">

                            </td>
                        </tr>
                        @endforeach
                        @endforeach


                @endforeach
                </tbody>
            </table>
            @endforeach


        </div>
        <!-- //tables -->
    </div>
        @endforeach
    </div>

@endsection