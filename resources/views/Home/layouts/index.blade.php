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
    <link href="/homeTemplate/css/show.css" type="text/css" rel="stylesheet"/>
    <link href="/homeTemplate/css/my.css" type="text/css" rel="stylesheet"/>
    <link href="/homeTemplate/css/order.css" type="text/css" rel="stylesheet"/>
    <link href="/homeTemplate/css/order_1.css" type="text/css" rel="stylesheet"/>
    <link href="/homeTemplate/css/my_order.css" type="text/css" rel="stylesheet"/>






    <script type="text/javascript" src="/homeTemplate/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/homeTemplate/js/slide.js"></script>
</head>
<body>

<!------------顶部---------------->
<div class="top">
    <div class="wt1080">
        <div class="fl">
            @if(session('homeFlag'))
                <span style="color: red"> {{session('homeUser')['name']}} 您好,欢迎登陆 </span> <a href="/"> 商城首页</a>&emsp;|&emsp;<a href="/home/logout/" style="color: #ff9900">退出</a>

            @else
                <a href="/">商城首页</a>&emsp;|&emsp;请&emsp;<a href="/home/login/" style="color: #ff9900">登陆</a>&emsp;或&emsp;<a href="#">立即注册</a>

            @endif


        </div>
        <div class="fr">
            <ul>
                <li style="position: relative;" id="my">
                    <a href="/">我的商城 <img  src="/homeTemplate/image/sanjiao.png"></a>
                    <div class="personal">
                        <dl>
                            <dt><a href="/home/orders/index/">我的订单</a></dt>
                            <dd><a href="/home/carts/index">购物车</a></dd>
                            <dd><a href="<?php echo route('home.user.rePassword',['id'=>session('homeUser')['id']]); ?>">修改密码</a></dd>
                        </dl>
                    </div>
                </li>
                <li><span class="shop"><a href="/home/carts/index/">购物车</a></span></li>
                <li><span class="phone"><a href="/home/orders/index/">订单</a></span></li>
                <li><span><a href="article.html">关于商城</a></span></li>
                <li><span><a href="article.html">帮助中心</a></span></li>
                <li><span class="phone2">010-5166 3131</span></li>
            </ul>
        </div>
    </div>
</div>
<!--------------logo搜索------------->
<div class="wt1080 header">
    <div class="logo fl"><a href="index.html"><img  src="/homeTemplate/image/logo.jpg"></a></div>
    <div class="search fl">
        <div>
            <form action="/" method="get">

            <input name="search" type="text"  class="a_search fl" placeholder="请输入关键字">
            <input type="submit" value="搜索" style="height: 35px;width: 70px;margin-left: 3px;background-color: #1b93e1;color: whitesmoke;font-size: 14px">

            </form>
            <div class="clear"></div>
        </div>
        <p>
            <a href="#" class="current">集成墙板</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="#">竹木纤维版</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="#">罗马柱</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="#">魔画墙</a>
        </p>
    </div>
    <a class="my_shop fr" href="/home/carts/index/">我的购物车</a>
    <div class="clear"></div>
</div>
<!--------------导航------------------>

<script>
    $(function(){
        $('.nav ul li').hover(function(){
            $(this).children(".details").show();
        },function(){
            $(this).children(".details").hide();
        });

        $('.erjilanmu').hover(function(){
            $(this).children(".shangpinming").show();
        },function(){
            $(this).children(".shangpinming").hide();
        });

        $('#my').hover(function(){
            $(this).find("div").show();
        },function(){
            $(this).find("div").hide();
        });
    });
</script>

<div class="nav">
    <div class="wt1080">
        <ul>
            <li>
                <a href="<?php echo route('home.index');?>" class="current"><span>首页</span></a>
            </li>
            @foreach($goods_arr as $category)
            <li>
                <a href="javascript:;"><span>{{$category->category_name}}</span></a>
                <div class="details">

                        @foreach($category->sub as $category2 )
                            <div class="item">
                                <div class="erjilanmu">
                                    <p class="title"><a href="<?php echo route('home.index',['id'=>$category2->id]);?>">{{$category2->category_name}}</a></p>


                                    <div class="shangpinming" style="display: none">
                                        @foreach($category2->goods as $good)
                                                <div class="ctgnamebox ">
                                                    <a   href="<?php echo route('home.goods.index',['id'=>$good->id]);?>" class="current">{{$good->good_name}}</a>
                                                </div>
                                        @endforeach
                                    </div>
                                </div>



                            </div>
                         @endforeach

                </div>
            </li>
            @endforeach

            <li><a href="#"><span>合作申请</span></a></li>
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
                    <span>010-5166 3131</span>
                </p>
            </div>

        </div>
        <div class="clear"></div>
        <!------------------------>

        <br>
        <p class="beian">Copyright©2018 CYXM178.COM. All Rights Reserved 北京宋庄创意工场科技有限公司 版权所有.备案号：京ICP备16028356号-6</p>

    </div>
</div>
</body>
</html>