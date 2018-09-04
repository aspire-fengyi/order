@extends('Home.layouts.index')

@section('content')
    <body>
    <div class="cp_box">
        <form action="<?php echo route('home.carts.add', ['id' => $good->id]);?>" method="post">

            {{csrf_field()}}
            <div class="cp_cont">
                <div class="cp_img">
                    <img src="{{$good->goodModel->image_path}}"/>
                </div>


                <table class="cp_des_tab">
                    <tr>
                        <td>产品规格：</td>
                        <td>
                            <ul class="cp_list_style">
                                <li class="clearfix">
                                    <img src="{{$good->goodModel->image_path}}"/>
                                @foreach($good->goodGuiges as $goodGuige)
                                    <li class="clearfix  shangpinguige">

                                        <input type="radio" class="" name="guige_id" value="{{$goodGuige->id}}"
                                               id="guige{{$goodGuige->id}}"
                                               style="position: absolute; clip: rect(0, 0, 0, 0);" required=""/><label
                                                for="guige{{$goodGuige->id}}"><span>{{$goodGuige -> guige}}</span></label>
                                    </li>
                                    @endforeach

                                    </li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <td>产品颜色：</td>
                        <td>
                            <ul class="cp_list_style">
                                @foreach($good->goodColors as $goodColor)
                                    <li class="clearfix">
                                        <img src="{{$goodColor -> color_image_path}}"/>

                                        <input type="radio" value="{{$goodColor -> id}}" required="" name="color_id"
                                               id="color{{$goodColor->id}}"
                                               style="position: absolute; clip: rect(0, 0, 0, 0);"><label
                                                for="color{{$goodColor->id}}"><span>{{$goodColor -> color}}</span></label>
                                    </li>
                                @endforeach

                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>产品名称：</td>
                        <td>
                            {{$good->good_name}}
                        </td>
                    </tr>
                    <tr>
                        <td>产品编码：</td>
                        <td>
                            {{$good->goodModel->bianma}}
                        </td>
                    </tr>


                    <tr>
                        <td>产品介绍：</td>
                        <td>
                            <p class="font_red">注：{{$good->goodModel->desc}}</p>
                        </td>
                    </tr>

                </table>

                <div style="margin-top: 30px">

                </div>

                <div>
                @foreach($good->goodGuiges as $guige)
                    <div class="shangpinjiage" style="display: none">
                        <table class="cp_des_tab">

                            <tr>

                                <td colspan="2" style="color: red"> 价格明细</td>
                            </tr>

                            <tr>
                                <td>市场价：</td>
                                <td>

                                    <div class="shichang_price">¥{{$guige->shichang_price}} 元
                                        /{{$good->goodModel->price_desc}}</div>

                                </td>
                            </tr>
                            @if(session('homeUser')['jibie']==0)

                            <tr>
                                <td>合作价：</td>
                                <td>
                                    <div class="shichang_price">¥{{$guige->hezuo_price}} 元
                                        /{{$good->goodModel->price_desc}}</div>
                                </td>
                            </tr>
                            @elseif(session('homeUser')['jibie']==1)
                            <tr>
                                <td>代理价：</td>
                                <td>
                                    <div class="shichang_price">¥{{$guige->daili_price}} 元
                                        /{{$good->goodModel->price_desc}}</div>
                                </td>
                            </tr>

                            @endif

                    </table>
            </div>
            @endforeach
                </div>


            <div class="cp_buy">
                请输入购买数量 <input type="text" name="number" value="1"/>
                <input type="submit" value="加入购物车" class="cp_buy_now"/>
                <input type="button" value="返回" class="cp_buy_back"/>
            </div>

    </div>
    </form>
    </div>
    <script type="text/javascript">
        $(function () {
            $(".cp_list_style li").click(function () {
                $(this).addClass("checkbox").siblings().removeClass("checkbox");
            })
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $(".shangpinguige").click(function () {
                var n = $(this).index()-1;

                console.log(n);

                $('.shangpinjiage').eq(n).css('display', 'block').siblings().css('display', 'none');

            })
        });
    </script>
    </body>

@endsection