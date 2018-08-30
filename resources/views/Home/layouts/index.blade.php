<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Transitional//EN" "http://www.w3.org/tr/xhtml1/Dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
    <title>未来空间</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="/homeTemplate/css/public.css" type="text/css" rel="stylesheet"/>
    <link href="/homeTemplate/css/gouwuche.css" type="text/css" rel="stylesheet"/>
    <link href="/homeTemplate/css/index.css" type="text/css" rel="stylesheet"/>
    <link href="/homeTemplate/css/show.css" type="text/css" rel="stylesheet"/>
    <link href="/homeTemplate/css/my.css" type="text/css" rel="stylesheet"/>
    <link href="/homeTemplate/css/order.css" type="text/css" rel="stylesheet"/>




    <script type="text/javascript" src="/homeTemplate/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/homeTemplate/js/slide.js"></script>
</head>
<body>
<script>
    $(function(){
        $('.nav ul li').hover(function(){
            $(this).children(".details").show();
        },function(){
            $(this).children(".details").hide();
        });
        $('#my').hover(function(){
            $(this).find("div").show();
        },function(){
            $(this).find("div").hide();
        });
    });
</script>
<!------------顶部---------------->
<div class="top">
    <div class="wt1080">
        <div class="fl">
            @if(session('homeFlag'))
                <a href="/">商城首页</a>&emsp;|&emsp;<a href="/home/logout/" style="color: #ff9900">退出</a>

            @else
                <a href="/">商城首页</a>&emsp;|&emsp;请&emsp;<a href="/home/login/" style="color: #ff9900">登陆</a>&emsp;或&emsp;<a href="#">立即注册</a>

            @endif


        </div>
        <div class="fr">
            <ul>
                <li style="position: relative;" id="my">
                    <a href="my_order.html">我的商城 <img  src="/homeTemplate/image/sanjiao.png"></a>
                    <div class="personal">
                        <dl>
                            <dt><a href="my_order.html">我的订单</a></dt>
                            <dd><a href="my_youhuijuan.html">我的优惠卷</a></dd>
                            <dd><a href="my_jifen.html">我的积分</a></dd>
                        </dl>
                    </div>
                </li>
                <li><span class="shop">购物车<a href="/home/carts/index/">0</a>件</span></li>
                <li><span class="phone"><a href="article.html">手机商城</a></span></li>
                <li><span><a href="article.html">关于商城</a></span></li>
                <li><span><a href="article.html">帮助中心</a></span></li>
                <li><span class="phone2">028-6133 8882</span></li>
            </ul>
        </div>
    </div>
</div>
<!--------------logo搜索------------->
<div class="wt1080 header">
    <div class="logo fl"><a href="index.html"><img  src="/homeTemplate/image/logo.jpg"></a></div>
    <div class="search fl">
        <div>
            <input name="search" type="text" class="a_search fl" placeholder="请输入关键字">
            <span class="b_search fl"></span>
            <div class="clear"></div>
        </div>
        <p>
            <a href="#" class="current">可莱丝</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="#">森田药妆</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="#">Montagne jeunesse</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="#">丽得姿</a>
        </p>
    </div>
    <a class="my_shop fr" href="/home/carts/index/">我的购物车<span>2</span></a>
    <div class="clear"></div>
</div>
<!--------------导航------------------>
<div class="nav">
    <div class="wt1080">
        <ul>
            <li>
                <a href="index.html" class="current"><span>首页</span></a>
            </li>
            @foreach($goods_arr as $category)
            <li>
                <a href="lanmu.html"><span>{{$category->category_name}}</span></a>
                <div class="details">

                    @foreach($category->sub as $category2 )
                    <div class="item">
                        <p class="title"><a href="lanmu.html">{{$category2->category_name}}</a></p>
                        @foreach($category2->goods as $good)
                        <div class="ctgnamebox">
                            <a href="<?php echo route('home.goods.index',['id'=>$good->id]);?>" class="current">{{$good->good_name}}</a>
                        </div>
                        @endforeach
                    </div>
                     @endforeach

                </div>
            </li>
            @endforeach

            <li><a href="lanmu.html"><span>合作申请</span></a></li>
        </ul>
        <div style="clear:both"></div>
    </div>
</div>

<!----------------轮播图-------------------->
@section('lunbo')

@show


<div class="clear"></div>
<!--------------中间部分------------->

{{--<!--------------商品开始---------------->--}}

@section('content')

@show

<!---------------------保障------------------->
<div class="baozhang">
    <div class="wt1080">
        <ul>
            <li>
                <img src="/homeTemplate/image/c1.png">
                <p>全球正品货源</p>
            </li>
            <li>
                <img src="/homeTemplate/image/c2.png">
                <p>一件代发</p>
            </li>
            <li>
                <img src="/homeTemplate/image/c3.png">
                <p>全球直邮</p>
            </li>
            <li>
                <img src="/homeTemplate/image/c5.png">
                <p>售后无忧</p>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<!---------------底部--------------->
<div class="footer">
    <div class="wt1080" style="position: relative">
        <div class="a_footer">
            <div class="left">
                <a href="index.html"><img  src="/homeTemplate/image/logo.jpg"></a>
                <p class="lianxi">
                    <a href="#"><img src="/homeTemplate/image/weixin.png"></a>
                    <a href="#"><img src="/homeTemplate/image/weibo.png"></a>
                    <a href="#"><img src="/homeTemplate/image/QQ.png"></a>
                    <span>028-6133 8882</span>
                </p>
            </div>
            <div class="right">
                <ul>
                    <li>
                        <dl>
                            <dt><a href="article.html">新手指南</a></dt>
                            <dd><a href="article.html">购物流程</a></dd>
                            <dd><a href="article.html">支付方式</a></dd>
                            <dd><a href="article.html">通关关税</a></dd>
                            <dd><a href="article.html">常见问题</a></dd>
                        </dl>
                    </li>
                    <li>
                        <dl>
                            <dt><a href="article.html">新手指南</a></dt>
                            <dd><a href="article.html">购物流程</a></dd>
                            <dd><a href="article.html">支付方式</a></dd>
                            <dd><a href="article.html">通关关税</a></dd>
                            <dd><a href="article.html">常见问题</a></dd>
                        </dl>
                    </li>
                    <li>
                        <dl>
                            <dt><a href="article.html">新手指南</a></dt>
                            <dd><a href="article.html">购物流程</a></dd>
                            <dd><a href="article.html">支付方式</a></dd>
                            <dd><a href="article.html">通关关税</a></dd>
                        </dl>
                    </li>
                    <li>
                        <dl>
                            <dt><a href="article.html">新手指南</a></dt>
                            <dd><a href="article.html">购物流程</a></dd>
                            <dd><a href="article.html">支付方式</a></dd>
                            <dd><a href="article.html">通关关税</a></dd>
                            <dd><a href="article.html">常见问题</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <div class="weixin"><img src="/homeTemplate/image/weixin1.png"><p>扫描二维码下载APP</p></div>
        <!------------------------>
        <p class="beian">Copyright © 2016 商城网.版权所有.备案号：京ICP证35124521号.技术支持：西部网络</p>
    </div>
</div>
</body>
</html>