<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Transitional//EN"
        "http://www.w3.org/tr/xhtml1/Dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
    <title>未来空间商品网</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link href="/homeTemplate/css/login.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="/homeTemplate/js/jquery-1.7.2.min.js"></script>
</head>
<body>
<!---------------头部----------------->
<div class="wt1080 top">
    <div class="logo"><a href="#"><img src="/homeTemplate/image/logo.jpg"></a></div>
    <div class="rr">
        <ul>
            <li>
                <img src="/homeTemplate/image/bg3.png">
                <p>全球正品货源</p>
            </li>
            <li>
                <img src="/homeTemplate/image/bg5.png">
                <p>一件代发</p>
            </li>
            <li>
                <img src="/homeTemplate/image/bg4.png">
                <p>全球直邮</p>
            </li>
            <li>
                <img src="/homeTemplate/image/bg6.png">
                <p>售后无忧</p>
            </li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!----------------------中间------------------------->
<div class="red">
    <div class="wt1080 login">
        <div class="login_pic"></div>
        <div class="l_k" style="height: auto">
            <div class="l_k_t">
                <span class="one">登陆</span>
                <span class='two'>还没有帐号？<a href="#">30秒注册</a></span>
            </div>



            <!-----------登录框----------->
            <form action="/home/doLogin" method="post">

                {{csrf_field()}}
                <div class="l_k_d">
                    <input type="text" class="admin" name="name"  required="" placeholder="用户名">
                    <input type="password" class="pass" name="password" required="" placeholder="密码">
                    <img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">
                    <input type="text" class="admin" name="yanzhengma" required="" placeholder="验证码">

                </div>
                <div class="mem">
                    <span><input type="checkbox">自动登陆</span>
                    <a href="#">忘记密码？</a>
                </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger ">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><strong>{{ $error }}</strong></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif



                <input type="submit" class="s_login" value="马上登陆">
                <span class="xie"></span>
            </form>

        </div>
        <div class="clear"></div>
    </div>
</div>
<!-------------------底部------------------------>
<div class="foot wt1080">
    <ul>
        <li><a href="#">网站简介</a></li>
        <li><a href="#">联系我们</a></li>
        <li><a href="#">招商合作</a></li>
        <li><a href="#">销售联盟</a></li>
    </ul>
    <p>Copyright©2018 CYXM178.COM. All Rights Reserved 北京宋庄创意工场科技有限公司 版权所有.备案号：京ICP备16028356号-6</p>
</div>

</body>
</html>
