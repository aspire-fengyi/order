@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>合作商管理
        <i class="fa fa-angle-right"></i>合作商列表
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


    <div class="clearfix text-center"></div>

    <div style="margin-top: -50px">
        <div class="agile-grids">
            <!-- tables -->


                <div class="agile-tables">

                    <form action="<?php echo route('admin.orders.index'); ?>" method="get">
                        <div>
                            <input type="text" style="width: 300px" name="order_number" placeholder="合作商姓名">
                            <input type="submit" value="搜索合作商">
                        </div>
                    </form>
                <table id="table-two-axis" class="two-axis text-center">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">合作商</th>
                        <th class="text-center">合作商级别</th>
                        <th class="text-center">电话</th>

                        {{--<th class="text-center">所属管理员</th>--}}
                        <th class="text-center">所属小组</th>
                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--第一次遍历 将返回的有分级的数据其中的一级数据遍历出来--}}
                    @foreach ($users as $k => $v)
                        {{--第二层遍历，找出二级权限--}}
                        @foreach($v->sub as $kk=>$vv)
                            {{--第二层遍历中用到一对多方法，找出合作商信息，--}}
                            @foreach($vv->hezuoshang as $hezuoshang)


                                <tr>
                                    <td class="text-center">{{$hezuoshang->name}}</td>

                                    <td class="text-center">
                                        @if($hezuoshang->jibie==0)
                                            合作商
                                        @elseif($hezuoshang->jibie==1)
                                            代理商
                                        @endif
                                    </td>

                                    <td class="text-center">{{$hezuoshang->userInfo->phone}}</td>

{{--                                    <td class="text-center">{{$hezuoshang->admin_user_who->name}}</td>--}}

                                    <td class="text-center">{{$v->leader_name}}：{{$vv->leader_name}}</td>


                                    <td class="text-center">
                                        <a href="<?php echo route('admin.users.show_info', ['id' => $hezuoshang->id]); ?>">
                                            <button class="btn btn-info">查看详情</button>
                                        </a>
                                        <a href="<?php echo route('admin.users.edit', ['id' => $hezuoshang->id]); ?>"
                                           onclick="return confirm('确认要修改该合作商吗?');">
                                            <button class="btn btn-danger">修改</button>
                                        </a>
                                        <a href="<?php echo route('admin.users.delete', ['id' => $hezuoshang->id]); ?>"
                                           onclick="return confirm('确认要删除该合作商吗?');">
                                            <button class="btn btn-danger">删除</button>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                        @endforeach
                    @endforeach

                    </tbody>
                </table>


            </div>
            <!-- //tables -->
        </div>





@endsection