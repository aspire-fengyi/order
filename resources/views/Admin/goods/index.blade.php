@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>产品管理
        <i class="fa fa-angle-right"></i>产品显示
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


    {{--导航--}}
    <div class="bg-effect">
        <ul class="bt-list">
            @foreach ($goods as $k => $v)
                {{--做判断是因为第一个按钮和左边不对其，加了一个margin--}}
                {{--显示一级类别名称，顶，地，墙--}}
                @if($k==0||$k==6)
                    <li id="" class="col-md-2 daohang" style="margin-left: -15px"><a href="#" class="hvr-icon-pulse col-11 ">{{$v->category_name}}</a>
                    </li>
                @else
                    <li id="" class="col-md-2 daohang"><a href="#" class="hvr-icon-pulse col-11 ">{{$v->category_name}}</a></li>
                @endif
            @endforeach

        </ul>

    </div>
    {{--导航结束--}}

    {{--js选项卡显示--}}
    <script>
        $(function () {
            $('.daohang').click(function () {


                var n = $(this).index();
                console.log(n);
                $('.xianshi').css('display', 'none');
                $('.xianshi').eq(n).css('display', 'block');
                $(this).children().removeClass('col-11').addClass('col-1');
                $(this).siblings().children().removeClass('col-1').addClass('col-11');

            })

        })
    </script>

    {{--js选项卡结束--}}


    {{--js选项卡显示--}}
    <script>
        $(function () {
            $('.daohang2').click(function () {
                var m = $(this).index()+2;
                $('.xianshi2').css('display', 'none');
                $('.xianshi2').eq(m).css('display', 'block');


            })

        })
    </script>

    {{--js选项卡结束--}}

    <div class="clearfix text-center"></div>


    {{--第一次遍历 将返回返回数据进行遍历--}}
    @foreach ($goods as $k => $v)
        {{--第一次选项卡显示--}}
        <div class="xianshi" @if($k==0) style="display: block" @else style="display: none" @endif>
            <div class="inbox-mail " id="">

                @foreach($v->sub as $kk=>$vv)

                    {{--第二级导航遍历--}}
                    <div class="col-md-2 compose w3layouts daohang2">


                        <button class="btn btn-primary " style="margin: 10px 0">{{$vv->category_name}}</button>

                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>

            <div style="margin-top: -50px">
                <div class="agile-grids">
                    <!-- tables -->

                    <div class="agile-tables">

                        {{--第二层遍历，二层分类--}}
                        @foreach($v->sub as $kk=>$vv)

                            <div class="xianshi2" @if($kk==0) style="display: block" @else style="display: none" @endif>
                                {{--显示二级分类名称--}}
                                {{--运用类别模型一对多商品模型，查找商品--}}
                                @foreach($vv->goods as $good)

                                    {{--运用商品模型一对多型号模型，查找商品详情--}}
                                    <div>
                                        <h3>{{$good->goodModel->good_name}}</h3>

                                        产品描述：{{$good->goodModel->desc}}

                                        <table id="table-two-axis" class="two-axis text-center ">
                                            <thead>
                                            <tr class="text-center">
                                                <th class="text-center">产品id</th>
                                                <th class="text-center">编码</th>
                                                <th class="text-center" style="width:200px"><a
                                                            href="<?php echo route('admin.goods.goodColor', ['id' => $good->id]); ?>"
                                                            style="text-decoration:none; color:#a2d200; font-size: 16px"><b>颜色</b></a>
                                                </th>
                                                <th class="text-center"><a
                                                            href="<?php echo route('admin.goods.goodGuige', ['id' => $good->id]); ?>"
                                                            style="text-decoration:none; color:#a2d200; font-size: 16px"><b>规格</b></a>
                                                </th>
                                                <th class="text-center">价格：元/{{$good->goodModel->price_desc}}</th>
                                                <th class="text-center">状态</th>
                                                <th class="text-center">规格描述</th>
                                                <th class="text-center"><a
                                                            href="<?php echo route('admin.goods.goodPicture', ['id' => $good->id]); ?>"
                                                            style="text-decoration:none; color:#a2d200; font-size: 16px"><b>产品图</b></a>
                                                </th>
                                                <th class="text-center">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($good->goodGuiges as $goodGuige )
                                            <tr>
                                                <td class="text-center">{{$good->id}}</td>
                                                <td class="text-center">{{$goodGuige->bianma}}</td>
                                                <td class="text-center" style="width:200px">
                                                    <ul style="list-style: none;" class="text-left">
                                                        @foreach($good->goodColors as $goodColor)

                                                            <li style="margin: 5px 0; ">
                                                                {{$goodColor->color}}
                                                            </li>

                                                        @endforeach
                                                    </ul>

                                                </td>
                                                <td class="text-center">
                                                    {{$goodGuige->guige}}

                                                </td>
                                                <td class="text-center">
                                                    <ul style="list-style: none;" class="text-left">

                                                        <li style="margin: 5px 0;">
                                                            市场价：{{$goodGuige->shichang_price}}
                                                        </li>
                                                        <li style="margin: 5px 0;">
                                                            合作价：{{$goodGuige->hezuo_price}}
                                                        </li>
                                                        <li style="margin: 5px 0;">
                                                            代理价：{{$goodGuige->daili_price}}
                                                        </li>
                                                    </ul>
                                                </td>


                                                <td class="text-center">
                                                    @if($good->goodModel->status==1)
                                                        上架
                                                    @elseif($good->goodModel->status==2)
                                                        新品
                                                    @elseif($good->goodModel->status==0)
                                                        下架
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$goodGuige->guige_desc}}</td>
                                                <td class="text-center">
                                                    <img src="{{$good->goodModel->image_path}}" alt="产品缩略图"
                                                         style="height: 80px;width: 150px">
                                                </td>
                                                <td class="text-center">
                                                    <ul style="list-style: none;" class="text-center">


                                                        <li style="margin: 5px 0;" class="text-center">
                                                            <a href="<?php echo route('admin.goods.edit', ['id' => $good->id]); ?>"
                                                               onclick="return confirm('确认要修改该商品?');">
                                                                <button class="btn btn-info text-center"
                                                                        style="width: 110px;">修改
                                                                </button>
                                                            </a>
                                                        </li>
                                                        <li style="margin: 5px 0;" class="text-center">
                                                            <a href="<?php echo route('admin.goods.delete', ['id' => $good->id]); ?>"
                                                               onclick="return confirm('确认要删除该商品吗?');">
                                                                <button class="btn btn-danger text-center"
                                                                        style="width: 110px;">删除
                                                                </button>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </td>
                                            </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>

                                @endforeach

                            </div>
                        @endforeach


                    </div>
                    <!-- //tables -->
                </div>

            </div>
        </div>
    @endforeach


@endsection