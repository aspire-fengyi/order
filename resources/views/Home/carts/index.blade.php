@extends('Home.layouts.index')

@section('content')




    <!--------------------内容----------------------->
    <div class="wt1080">
        <!--------------标题----------->
        <div class="my_car">
            <h1>我的购物车</h1>
        </div>
        <!--------------选择----------->


        <form action="<?php echo route('home.order.beforeOrders');?>" method="post">

            {{csrf_field()}}


            <div class="details">
                <div class="title">
                    <div style="text-align: left;width: 84px;">选择</div>
                    <div style="width: 432px;">商品</div>
                    <div style="width: 141px;">单价</div>
                    <div style="width: 141px;">数量</div>
                    <div style="width: 141px;">合计</div>
                    <div style="width: 141px;">操作</div>
                </div>
                <!-----------------------商品展示---------------------------->


                <div class="goods">
                    @foreach($user->carts as $k => $cart)
                        <div class="goods_details">
                            <div class="g_one checkbox">
                                <input   name="carts[]"   type="checkbox" id="{{$cart->id}}" value="{{$cart->id}}"/>
                            </div>
                            <div class="g_two">
                                <div class="h">
                                    <div class="pic"><a href="<?php echo route('home.goods.info',['id'=>$cart->good->id]);?>"><img src="{{$cart->good->goodModel->image_path}}"></a>
                                    </div>
                                    <div class="miaoshu">
                                        <p style="margin-top: 5px;"><a href="<?php echo route('home.goods.info',['id'=>$cart->good->id]);?>">{{$cart->good->good_name}}
                                                -- {{$cart->goodGuige->guige}}</a></p>
                                        <p style="color: #888888;margin-top: 5px;">{{$cart->goodColor->color}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="g_three"><p class="y">￥198.00</p>
                                <p class="k">￥{{$cart->price}} 元/{{$cart->good->goodModel->price_desc}}</p></div>


                            {{--<div class="g_four">--}}
                            {{--<div>--}}
                            {{--<input id="min{{$cart->id}}" name="" type="button" value="-"--}}
                            {{--style="width:20px;height:20px;margin-top:12px;background:#468CD4;text-align:center;color:#ffffff;"/>--}}

                            {{--<input id="text_box{{$cart->id}}" name="" type="text" value="1" readonly="true"--}}

                            {{--style="width:30px;height:19px; margin-top:12px; border:1px solid #ccc; text-align:center; color:#000;"/>--}}
                            {{--<input id="add{{$cart->id}}" name="" type="button" value="+"--}}
                            {{--style="width:20px;height:20px; margin-top:12px; background:#468CD4; text-align:center;color:#ffffff;"/>--}}



                            {{--<script>--}}
                            {{--$(function () {--}}
                            {{--var t = $("#text_box{{$cart->id}}");--}}
                            {{--$("#add{{$cart->id}}").click(function () {--}}
                            {{--t.val(parseInt(t.val()) + 1)--}}
                            {{--setTotal();--}}
                            {{--});--}}
                            {{--$("#min{{$cart->id}}").click(function () {--}}
                            {{--t.val(parseInt(t.val()) - 1)--}}
                            {{--if (parseInt(t.val()) < 0) {--}}
                            {{--t.val(0);--}}
                            {{--}--}}
                            {{--setTotal();--}}
                            {{--});--}}

                            {{--var price = {{$cart->price}}--}}
                            {{--function setTotal() {--}}
                            {{--//toFixed(2) 表示保留两位小数--}}
                            {{--$("#total{{$cart->id}}").html((parseInt(t.val()) * price).toFixed(2));--}}
                            {{--};--}}

                            {{--setTotal();--}}
                            {{--})--}}
                            {{--</script>--}}

                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="g_five"> <p>￥：<label id="total{{$cart->id}}" style="font-size: 18px"> 122</label></p></div>--}}
                            <div class="g_four">
                                <div style="margin-left: 55px">
                                    <input name="" type="text" value="{{$cart->number}}" readonly>
                                </div>
                            </div>
                            <div class="g_five"><p>￥{{$cart->number * $cart->price_number * $cart->price}}</p></div>

                            <a href="<?php echo route('home.carts.delete', ['id' => $cart->id])?>">
                                <div class="g_six"><span></span></div>
                            </a>
                        </div>
                    @endforeach

                </div>
                <!------------------下部分------------------>
                <div class="d_d">
                    <div class="d_d_l">
                        <input type="checkbox" id="allAndNotAll"/>全选
                    </div>

                    <div class="d_d_r">
                        <p class="o" style="margin-top: 20px"></p>
                    </div>
                    <input type="submit" class="jiesuan" value="去结算">
                </div>
            </div>
        </form>

    </div>

    <script>
        $(function () {
            //实现全选与反选
            $("#allAndNotAll").click(function () {
                if (this.checked) {
                    $("input[name='carts[]']:checkbox").each(function () {
                        $(this).attr("checked", true);
                    });
                } else {
                    $("input[name='carts[]']:checkbox").each(function () {
                        $(this).attr("checked", false);
                    });
                }
            });

            //获取被选中的id
            var ids = [];
            $('#getAllSelectedId').click(function () {
                $("input[name='carts[]']:checked").each(function () {
                    ids.push($(this).attr("id"));
                });

                var delIds = ids.join(",");
                console.log(delIds);

            });
        });
    </script>





@endsection