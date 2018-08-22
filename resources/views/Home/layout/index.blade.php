
<!DOCTYPE HTML>
<html>
<head>
    <title>未来空间订货系统 | 首页</title>
    <meta charset="UTF-8"/>
    <link href="/homeTemplate/css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!----webfonts---->

    <!----//webfonts---->
    <!----start-alert-scroller---->
    <script src="/homeTemplate/js/jquery.min.js"></script>
    <script type="text/javascript" src="/homeTemplate/js/jquery.easy-ticker.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#demo').hide();
            $('.vticker').easyTicker();
        });
    </script>
    <!----start-alert-scroller---->
    <!-- start menu -->
    <link href="/homeTemplate/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="/homeTemplate/js/megamenu.js"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <script src="/homeTemplate/js/menu_jquery.js"></script>
    <!-- //End menu -->
    <!---slider---->
    <link rel="stylesheet" href="/homeTemplate/css/slippry.css">
    <script src="/homeTemplate/js/jquery-ui.js" type="text/javascript"></script>
    <script src="/homeTemplate/js/scripts-f0e4e0c2.js" type="text/javascript"></script>
    <script>
        jQuery('#jquery-demo').slippry({
            // general elements & wrapper
            slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
            // options
            adaptiveHeight: false, // height of the sliders adapts to current slide
            useCSS: false, // true, false -> fallback to js if no browser support
            autoHover: false,
            transition: 'fade'
        });
    </script>
    <!----start-pricerage-seletion---->
    <script type="text/javascript" src="/homeTemplate/js/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/homeTemplate/css/jquery-ui.css">
    <script type='text/javascript'>//<![CDATA[
        $(window).load(function(){
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 100, 400 ],
                slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

        });//]]>
    </script>
    <!----//End-pricerage-seletion---->
    <!---move-top-top---->
    <script type="text/javascript" src="/homeTemplate/js/move-top.js"></script>
    <script type="text/javascript" src="/homeTemplate/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <!---//move-top-top---->
</head>
<body>
<!---start-wrap---->
<!---start-header---->
<div class="header">
    <div class="top-header">
        <div class="wrap">
            <div class="top-header-left">
                <ul>
                    {{--购物车js--}}
                    <script type="text/javascript">
                        $(function(){
                            var $cart = $('#cart');
                            $('#clickme').click(function(e) {
                                e.stopPropagation();
                                if ($cart.is(":hidden")) {
                                    $cart.slideDown("slow");
                                } else {
                                    $cart.slideUp("slow");
                                }
                            });
                            $(document.body).click(function () {
                                if ($cart.not(":hidden")) {
                                    $cart.slideUp("slow");
                                }
                            });
                        });
                    </script>
                    {{--购物车js结束--}}

                    {{--购物车--}}
                    <li><a class="cart" href="#"><span id="clickme"> </span></a></li>

                    <div id="cart">您的购物车是空的 <span>(0)</span></div>
                    {{--购物车结束--}}

                    <li><a class="info" href="#"><span> </span></a></li>

                </ul>
            </div>
            <div class="top-header-center">
                <div class="top-header-center-alert-left">
                    <h3>免费送货</h3>
                </div>
                <div class="top-header-center-alert-right">
                    <div class="vticker">
                        <ul>
                            <li>订单满50美元或以上。<label>退货免费</label></li>
                        </ul>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="top-header-right">
                <ul>
                    <li><a href="login.html">登录</a><span> </span></li>
                    <li><a href="register.html">注册</a></li>
                </ul>
            </div>
            <div class="clear"> </div>
        </div>
    </div>

    {{--搜索框--}}
    <div class="mid-header">
        <div class="wrap">
            <div class="mid-grid-left">
                <form>
                    <input type="text" placeholder="输入您想查找的商品?" />
                </form>
            </div>
            <div class="mid-grid-right">
                <a class="logo" href="index.html"><span> </span></a>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
    {{--搜索框结束--}}

    {{--导航开始--}}
    @section('daohang')

    @show

    {{--导航结束--}}
</div>

    @section('lunbo')

    @show


<div class="clear"> </div>

{{--内容--}}
<div class="content">
    <div class="wrap">

        @section('content')

        @show

        <div class="clear"> </div>
    </div>
</div>
{{--内容结束--}}

<div class="clear"> </div>
<!---- start-bottom-grids---->
<div class="bottom-grids">
    <div class="bottom-top-grids">
        <div class="wrap">
            <div class="bottom-top-grid">
                <h4>获得帮助</h4>
                <ul>
                    <li><a href="contact.html">联系我们</a></li>
                    <li><a href="#">购物</a></li>
                    <li><a href="#">NIKEiD</a></li>
                    <li><a href="#">Nike+</a></li>
                </ul>
            </div>
            <div class="bottom-top-grid">
                <h4>命令</h4>
                <ul>
                    <li><a href="#">付款方式</a></li>
                    <li><a href="#">送货和送货</a></li>
                    <li><a href="#">返回</a></li>
                </ul>
            </div>
            <div class="bottom-top-grid last-bottom-top-grid">
                <h4>注册</h4>
                <p>创建一个帐户来管理您使用Nike所做的一切，从您的购物偏好到您的Nike +活动。</p>
                <a class="learn-more" href="#">学习更多</a>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
    <div class="bottom-bottom-grids">
        <div class="wrap">
            <div class="bottom-bottom-grid">
                <h6>电子邮件注册</h6>
                <p>成为第一个了解新产品和特别优惠的人。</p>
                <a class="learn-more" href="#">立即登录</a>
            </div>
            <div class="bottom-bottom-grid">
                <h6>礼品卡</h6>
                <p>提供合适的礼物</p>
                <a class="learn-more" href="#">查看卡片</a>
            </div>
            <div class="bottom-bottom-grid last-bottom-bottom-grid">
                <h6>您附近的商店</h6>
                <p>找到耐克零售店或授权零售商。</p>
                <a class="learn-more" href="#">搜索</a>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
</div>
<!---- //End-bottom-grids---->
<!--- //End-content---->
<!---start-footer---->
<div class="footer">
    <div class="wrap">
        <div class="footer-left">
            <ul>
                <li><a href="#">英国</a> <span> </span></li>
                <li><a href="#">使用条款</a> <span> </span></li>
                <li><a href="#">耐克公司</a> <span> </span></li>
                <li><a href="#">启动日历</a> <span> </span></li>
                <li><a href="#">隐私和Cookie政策</a> <span> </span></li>
                <li><a href="#">Cookie设置</a></li>
                <div class="clear"> </div>
            </ul>
        </div>
        <div class="footer-right">

            <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
        </div>
        <div class="clear"> </div>
    </div>
</div>
<!---//End-footer---->
<!---//End-wrap---->
</body>
</html>

