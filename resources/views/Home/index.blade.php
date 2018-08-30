@extends('Home.layouts.index')
<!----------------轮播图-------------------->

@section('lunbo')
    <div class="index_banner minWidth" id="focus">
        <ul>
            <li style="background:url(/homeTemplate/image/bg2.png) no-repeat center;height: 452px;"><a href="#" title="" target="_blank"></a>
            </li>
            <li style="background:url(/homeTemplate/image/bg2.png) no-repeat center;height: 452px;"><a href="#" title="" target="_blank"></a>
            </li>
        </ul>
    </div>
@endsection

<div class="clear"></div>


{{--<!--------------商品开始---------------->--}}

@section('content')
    <link href="/homeTemplate/css/liebiao.css" type="text/css" rel="stylesheet"/>

    <div class="content">
        <!-------------------分类------------------>
        <div class="wt1080 fenlei">
            <div class="left">分类：</div>
            <div class="right">
                <ul>
                    <li><a href="">奶粉（1244）</a></li>
                    <li><a href="">俄罗斯尿布（1244）</a></li>
                    <li><a href="">俄罗斯尿布（1244）</a></li>
                    <li><a href="">俄罗斯尿布（1244）</a></li>
                    <li><a href="">俄罗斯尿布（1244）</a></li>
                    <li><a href="">俄罗斯尿布（1244）</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <!-------------------位置------------------>
        <div class="place">
            位置：<a class="check" href="#">婴儿奶粉</a>共<span class="number">1244</span>件热卖商品

        </div>
        <!----------------产品详细------------------->
        <div class="product">
            <ul>

                @foreach($goods as $good)
                    <li>
                        <div class="pic">
                            <a href="<?php echo route('home.goods.index', ['id' => $good->id]);?>">
                                <img style="width: 230px;height: 220px" src="{{$good->goodModel->image_path}}"></a>
                        </div>
                        <p class="one"><a
                                    href="<?php echo route('home.goods.index', ['id' => $good->id]);?>">{{$good->good_name}}
                                &nbsp;&nbsp; {{$good->goodModel->desc}} </a></p>
                        <p class="two"><span style="color: #fe5500">￥<span class="real">425.00</span></span><span
                                    class="wrong">￥896.00</span></p>
                    </li>
                @endforeach

            </ul>
            <div class="clear"></div>
        </div>
        <div class="page wt1080"><a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a
                    href="#">5</a><a href="#">下一页</a></div>
    </div>

@endsection

