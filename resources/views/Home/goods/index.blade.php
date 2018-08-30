@extends('Home.layouts.index')

@section('content')


    <script type="text/javascript" src="/homeTemplate/js/jquery.imagezoom.min.js"></script>
    <script type="text/javascript" src="/homeTemplate/js/owl.carousel.min.js"></script>
    <div class="wt1080">
        <!----------------位置--------------------->
        <div class="place">
            当前位置：<span class="check">{{$good->good_name}}</span>
        </div>
        <!-------------商品详细----------------->

        <div class="property">
            <div class="left">
                <div class="left_top">
                    <img src="{{$good->goodModel->image_path}}" class="jqzoom" >
                    <a href="#" class="search"></a>
                </div>
                <div class="pics">
                    <div id="scroll" class="owl-carousel">
                        <a href="#" class="item current"><img src="{{$good->goodModel->image_path}}"></a>

                        @foreach($good->goodPictures as $goodPicture)
                        <a href="#" class="item"><img src="{{$goodPicture->picture_path}}"></a>
                        @endforeach


                    </div>
                </div>
            </div>
            <script>
                $(function() {
                    $(".jqzoom").imagezoom();

                    $('#scroll').owlCarousel({
                        items: 4,
                        autoPlay: false,
                        navigation: true,
                        navigationText: ["",""],
                        scrollPerPage: true
                    });
                });
            </script>
            <div class="right">
                <a href="#" class="title">{{$good->good_name}}</a>
                @foreach($good->goodGuiges as $k=>$goodGuige )
                    @if($k==0)

                        @if(session('homeUser')['jibie']==2)
                            <div class="aa">
                                <span class="a">价格</span>
                                <span class="b">￥{{$goodGuige->daili_price}}</span>
                                <span class="d">市场价 ￥{{$goodGuige->shichang_price}}</span>
                            </div>
                        @elseif(session('homeUser')['jibie']==1)
                            <div class="aa">
                                <span class="a">价格</span>
                                <span class="b">￥{{$goodGuige->hezuo_price}}</span>
                                <span class="d">市场价 ￥{{$goodGuige->shichang_price}}</span>
                            </div>
                        @elseif(session('homeUser')['jibie']==0)
                            <div class="aa">
                                <span class="a">价格</span>
                                <span class="b">￥{{$goodGuige->shichang_price}}</span>
                                <span class="d">市场价 ￥{{$goodGuige->shichang_price}}</span>
                            </div>
                        @else
                            <div class="aa">
                                <span class="a">价格</span>
                                <span class="b">￥{{$goodGuige->shichang_price}}</span>
                                <span class="d">市场价 ￥{{$goodGuige->shichang_price}}</span>
                            </div>

                        @endif

                    @endif()





                @endforeach
                <table>
                    <tr>
                        <td class="one">运费</td>
                        <td>免运费</td>
                    </tr>
                    <tr>
                        <td class="one">描述</td>
                        <td>{{$good->goodModel->desc}}</td>
                    </tr>
                    <tr>
                        <td class="one">数量</td>
                        <td>
                            <div class="change">
                                <span class="zuo">-</span>
                                <input name="" type="text" value="1">
                                <span class="you">+</span>
                            </div>
                            <span class="tishi">库存充足</span>
                        </td>
                    </tr>
                </table>
                <!-----------------购买按钮--------------->
                <div class="shopping">
                    <a href="<?php echo route('home.goods.info',['id'=>$good->id]);?>" class="buy">立即购买</a>
                    <a href="<?php echo route('home.goods.info',['id'=>$good->id]);?>" class="shop_car">加入购物车</a>
                    <div class="clear"></div>
                </div>
                <!-----------保障---------------->
                <div class="b_baozhang">
                    <ul>
                        <li>
                            <img src="/homeTemplate/image/u1.png">
                            <p>全球正品货源</p>
                        </li>
                        <li>
                            <img src="/homeTemplate/image/u2.png">
                            <p>一件代发</p>
                        </li>
                        <li>
                            <img src="/homeTemplate/image/u3.png">
                            <p>全球直邮</p>
                        </li>
                        <li>
                            <img src="/homeTemplate/image/u4.png">
                            <p>售后无忧</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>





    </div>



@endsection