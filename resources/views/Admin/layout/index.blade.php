<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content=""/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Bootstrap Core CSS -->
    <link href="/adminTemplate/css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
    <!-- Custom CSS -->
    <link href="/adminTemplate/css/style.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="/adminTemplate/css/morris.css" type="text/css"/>
    <!-- Graph CSS -->
    <link href="/adminTemplate/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/adminTemplate/js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
          type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="/adminTemplate/css/icon-font.min.css" type='text/css'/>
    <!-- //lined-icons -->

    {{--表格样式--}}
    <link rel="stylesheet" type="text/css" href="/adminTemplate/css/table-style.css"/>
    <link rel="stylesheet" type="text/css" href="/adminTemplate/css/basictable.css"/>
    <script type="text/javascript" src="/adminTemplate/js/jquery.basictable.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').basictable();

            $('#table-breakpoint').basictable({
                breakpoint: 768
            });

            $('#table-swap-axis').basictable({
                swapAxis: true
            });

            $('#table-force-off').basictable({
                forceResponsive: false
            });

            $('#table-no-resize').basictable({
                noResize: true
            });

            $('#table-two-axis').basictable();

            $('#table-max-height').basictable({
                tableWrapper: true
            });
        });
    </script>
    {{--表格样式结束--}}
</head>
<body>
<div class="page-container">
    <!--/content-inner-->
    <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <div class="header-main">
                <div class="logo-w3-agile">
                    <h1><a href="{{ url()->previous() }}">返回</a></h1>

                </div>
                <div class="w3layouts-left">

                    <!--search-box-->
                    <div class="w3-search-box">
                        <form action="#" method="post">
                            <input type="text" placeholder="搜索..." required="">
                            <input type="submit" value="">
                        </form>
                    </div><!--//end-search-box-->
                    <div class="clearfix"></div>
                </div>
                <div class="w3layouts-right">
                    <div class="profile_details_left"><!--notifications of menu start -->
                        <ul class="nofitications-dropdown">
                            <li class="dropdown head-dpdn">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                            class="fa fa-envelope"></i><span class="badge">3</span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="notification_header">
                                            <h3>You have 3 new messages</h3>
                                        </div>
                                    </li>
                                    <li><a href="#">
                                            <div class="user_img"><img src="/adminTemplate/images/in11.jpg" alt="">
                                            </div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor</p>
                                                <p><span>1 hour ago</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a></li>
                                    <li class="odd"><a href="#">
                                            <div class="user_img"><img src="/adminTemplate/images/in10.jpg" alt="">
                                            </div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor </p>
                                                <p><span>1 hour ago</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a></li>
                                    <li><a href="#">
                                            <div class="user_img"><img src="/adminTemplate/images/in9.jpg" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor</p>
                                                <p><span>1 hour ago</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a></li>
                                    <li>
                                        <div class="notification_bottom">
                                            <a href="#">See all messages</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown head-dpdn">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                            class="fa fa-bell"></i><span class="badge blue">3</span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="notification_header">
                                            <h3>You have 3 new notification</h3>
                                        </div>
                                    </li>
                                    <li><a href="#">
                                            <div class="user_img"><img src="/adminTemplate/images/in8.jpg" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor</p>
                                                <p><span>1 hour ago</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a></li>
                                    <li class="odd"><a href="#">
                                            <div class="user_img"><img src="/adminTemplate/images/in6.jpg" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor</p>
                                                <p><span>1 hour ago</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a></li>
                                    <li><a href="#">
                                            <div class="user_img"><img src="/adminTemplate/images/in7.jpg" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor</p>
                                                <p><span>1 hour ago</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a></li>
                                    <li>
                                        <div class="notification_bottom">
                                            <a href="#">See all notifications</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown head-dpdn">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                            class="fa fa-tasks"></i><span class="badge blue1">9</span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="notification_header">
                                            <h3>You have 8 pending task</h3>
                                        </div>
                                    </li>
                                    <li><a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Database update</span><span class="percentage">40%</span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="progress progress-striped active">
                                                <div class="bar yellow" style="width:40%;"></div>
                                            </div>
                                        </a></li>
                                    <li><a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="progress progress-striped active">
                                                <div class="bar green" style="width:90%;"></div>
                                            </div>
                                        </a></li>
                                    <li><a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Mobile App</span><span
                                                        class="percentage">33%</span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="progress progress-striped active">
                                                <div class="bar red" style="width: 33%;"></div>
                                            </div>
                                        </a></li>
                                    <li><a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Issues fixed</span><span
                                                        class="percentage">80%</span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="progress progress-striped active">
                                                <div class="bar  blue" style="width: 80%;"></div>
                                            </div>
                                        </a></li>
                                    <li>
                                        <div class="notification_bottom">
                                            <a href="#">See all pending tasks</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <div class="clearfix"></div>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!--notification menu end -->

                    <div class="clearfix"></div>
                </div>
                <div class="profile_details w3l">
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">
                                    <span class="prfil-img"><img src="/adminTemplate/images/in4.jpg" alt=""> </span>
                                    <div class="user-name">
                                        <p>用户名</p>
                                        <span>身份</span>
                                    </div>
                                    <i class="fa fa-angle-down"></i>
                                    <i class="fa fa-angle-up"></i>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                                <li><a href="#"><i class="fa fa-cog"></i>设置</a></li>
                                <li><a href="#"><i class="fa fa-user"></i>详情</a></li>
                                <li><a href="#"><i class="fa fa-sign-out"></i> 退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>
            <!--heder end here-->
            {{--目录导航--}}
            <ol class="breadcrumb">
                @section('mulu')

                @show

            </ol>
            {{--目录导航结束--}}

            <script>
                $(document).ready(function () {
                    var navoffeset = $(".header-main").offset().top;
                    $(window).scroll(function () {
                        var scrollpos = $(window).scrollTop();
                        if (scrollpos >= navoffeset) {
                            $(".header-main").addClass("fixed");
                        } else {
                            $(".header-main").removeClass("fixed");
                        }
                    });

                });
            </script>
            <!-- /script-for sticky-nav -->
            <!--inner block start here-->
            <div class="inner-block">
                @section('content')

                @show

            </div>
            <!--inner block end here-->

            <div class="clearfix"></div>

            <div class="copyrights">
                <p>Copyright &copy; 2016.Company name All rights reserved.More Templates </p>
            </div>

        </div>

    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <div class="sidebar-menu">
        <header class="logo1">
            <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
        </header>

        <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
        <div class="menu">
            <ul id="menu">
                <li id="menu-academico"><a href="#"><i class="fa   fa-sitemap" aria-hidden="true"></i><span>权限管理</span>
                        <span class="fa fa-angle-right" style="float: right"></span>
                        <div class="clearfix"></div>
                    </a>

                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a
                                    href="<?php echo route('admin.users.admin_leader_create'); ?>">权限添加</a></li>
                        <li id="menu-academico-avaliacoes"><a
                                    href="<?php echo route('admin.users.admin_leader_index'); ?>">权限显示</a></li>
                    </ul>
                </li>
                <li id="menu-academico"><a href="#"><i class="fa   fa-user" aria-hidden="true"></i><span>管理员管理</span>
                        <span class="fa fa-angle-right" style="float: right"></span>
                        <div class="clearfix"></div>
                    </a>

                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.users.admin_create'); ?>">管理员添加</a></li>
                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.users.admin_index'); ?>">管理员显示</a></li>
                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.users.admin_index_fenji'); ?>">管理员分级显示</a></li>
                    </ul>
                </li>
                <li id="menu-academico"><a href="#"><i class="fa   fa-users" aria-hidden="true"></i><span>合作商管理</span>
                        <span class="fa fa-angle-right" style="float: right"></span>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.users.create') ?>">合作商添加</a></li>

                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.users.index') ?>">合作商列表</a></li>

                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.users.index_fenzu') ?>">合作商分组</a></li>
                    </ul>
                </li>
                <li id="menu-academico"><a href="#"><i class="fa    fa-certificate" aria-hidden="true"></i><span>产品类别管理</span>
                        <span class="fa fa-angle-right" style="float: right"></span>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.categories.create') ?>">产品类别添加</a></li>
                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.categories.index') ?>">产品类别列表</a></li>
                    </ul>
                </li>
                <li id="menu-academico"><a href="#"><i class="fa  fa-glide" aria-hidden="true"></i><span>产品管理</span>
                        <span class="fa fa-angle-right" style="float: right"></span>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.goods.create') ?>">产品添加</a></li>
                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.goods.index') ?>">产品列表</a></li>
                    </ul>
                </li>
                <li id="menu-academico"><a href="#"><i class="fa     fa-align-justify" aria-hidden="true"></i><span>订单管理</span>
                        <span class="fa fa-angle-right" style="float: right"></span>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="">订单列表</a></li>
                    </ul>
                </li>

                <li id="menu-academico">
                    <a href="#"><i class="fa  fa-picture-o" aria-hidden="true"></i><span>轮播图管理</span>
                        <span class="fa fa-angle-right" style="float: right"></span>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.lunbos.create') ?>">轮播图添加</a></li>
                        <li id="menu-academico-avaliacoes"><a href="<?php echo route('admin.lunbos.index') ?>">轮播图列表</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <div class="clearfix"></div>

</div>

<script>
    var toggle = true;

    $(".sidebar-icon").click(function () {
        if (toggle) {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position": "absolute"});
        }
        else {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function () {
                $("#menu span").css({"position": "relative"});
            }, 400);
        }

        toggle = !toggle;
    });
</script>

<script>
    $(document).ready(function () {
        var navoffeset = $(".header-main").offset().top;
        $(window).scroll(function () {
            var scrollpos = $(window).scrollTop();
            if (scrollpos >= navoffeset) {
                $(".header-main").addClass("fixed");
            } else {
                $(".header-main").removeClass("fixed");
            }
        });

    });
</script>
<!--js -->
<script src="/adminTemplate/js/jquery.nicescroll.js"></script>
<script src="/adminTemplate/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/adminTemplate/js/bootstrap.min.js"></script>
<!-- /Bootstrap Core JavaScript -->
<!-- morris JavaScript -->
<script src="/adminTemplate/js/raphael-min.js"></script>
<script src="/adminTemplate/js/morris.js"></script>
<!--copy rights start here-->

<!--COPY rights end here-->
</body>
</html>