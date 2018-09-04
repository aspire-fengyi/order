@extends('Home.layouts.index')

@section('content')




    <!--------------------内容----------------------->
    <div class="wt1080">
        <!--------------标题----------->
        <div class="my_car">
            <h1>我的购物车</h1>

        </div>
        <!--------------选择----------->
        @if (session('success'))
            <div class="alert alert-success"style="color: green;font-size: 18px" >
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" style="color: red;font-size: 18px">
                {{ session('error') }}
            </div>
        @endif

        <form action="<?php echo route('home.order.orderAdd');?>" method="post">

            {{csrf_field()}}


            <div class="details">
                <div class="title">
                    <div style="text-align: left;width: 84px;"><div class="d_d_l">
                            <input type="checkbox" id="allAndNotAll"/>全选
                        </div></div>
                    <div style="width: 432px;">商品</div>
                    <div style="width: 141px;">单价</div>
                    <div style="width: 141px;">数量</div>
                    <div style="width: 141px;">合计</div>
                    <div style="width: 141px;">操作</div>
                </div>
                <!-----------------------商品展示---------------------------->


                <div class="goods">
                    @foreach($user->carts as $k => $cart)
                        @if($cart->status == 0)

                            <div class="goods_details">
                                <div class="g_one checkbox">
                                    <input name="carts[]" type="checkbox" id="{{$cart->id}}"  value="{{$cart->id}}"/>
                                </div>
                                <div class="g_two">
                                    <div class="h">
                                        <div class="pic"><a
                                                    href="<?php echo route('home.goods.info', ['id' => $cart->good->id]);?>"><img
                                                        src="{{$cart->good->goodModel->image_path}}"></a>
                                        </div>
                                        <div class="miaoshu">
                                            <p style="margin-top: 5px;"><a
                                                        href="<?php echo route('home.goods.info', ['id' => $cart->good->id]);?>">{{$cart->good->good_name}}
                                                    -- {{$cart->goodGuige->guige}}</a></p>
                                            <p style="color: #888888;margin-top: 5px;">{{$cart->goodColor->color}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="g_three"><p class="y"></p>
                                    <p class="k">￥{{$cart->price}} 元/{{$cart->good->goodModel->price_desc}}</p>
                                </div>

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

                        @endif
                    @endforeach


                </div>

{{--收货地址--}}
                <div style="color: #1b93e1;font-size: 16px">
                    请选择收货地址
                </div>
                <div class="address">

                    <div class="b_address">
                        <ul>
                            @foreach($user->userAddrs as $userAddr)

                                    <li class=" user_addr" style="margin:">

                                        <input  style="display:none;" type="radio" id ="{{$userAddr->id}}addr"  name="addr_id" value="{{$userAddr->id}}"
                                               id="{{$userAddr->id}}">
                                        <label for="{{$userAddr->id}}addr">
                                            <h1>{{$userAddr->addr_name}}<span>{{$userAddr->addr_phone}}</span></h1>
                                            <p>{{$userAddr->addr}}</p>
                                            <div class="operate">
                                                <a href="<?php echo route('home.addr.edit',['id'=>$userAddr->id]); ?>" class="edit">编辑</a>
                                                <a href="#" class="del" onclick="return confirm('确认要删除该收货地址吗');">删除</a>
                                            </div>
                                            <div class="check"></div>
                                        </label>

                                    </li>
                            @endforeach

                        </ul>
                        <div class="add_address"><a href="<?php echo route('home.addr.create'); ?>">添加地址</a></div>
                        <div class="clear"></div>
                    </div>
                </div>


                <div style="color: #1b93e1;font-size: 16px">
                    订单备注:
                </div>

                <div>

                    <textarea name="beizhu" id="" cols="159" rows="3" placeholder="" style="float: left"></textarea>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <!------------------下部分------------------>
                <div class="d_d" style="margin-top: 20px;margin-left: 81px">
                    <div class="d_d_r">
                        <p class="o" style="margin-top: 20px"></p>
                    </div>
                    <input type="submit" class="jiesuan"  value="去结算">
                    <div class="clear"></div>
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

    <script>

        $(function(){

            $(".user_addr").click(function() {

                $(this).siblings().removeClass('current');  // 删除其他兄弟元素的样式

                $(this).addClass('current');                            // 添加当前元素的样式

            });

        });

    </script>

@endsection