<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>jQuery Contact Form Plugin: FFForm</title>
    <link href="/homeTemplate/addrTemplate/css/demo.css" rel="stylesheet" type="text/css">
    <script src="/homeTemplate/addrTemplate/js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <!--Framework-->
    <script src="/homeTemplate/addrTemplate/js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="/homeTemplate/addrTemplate/js/jquery-ui.js" type="text/javascript"></script>
    <!--End Framework-->
    <script src="/homeTemplate/addrTemplate/js/jquery.ffform.js" type="text/javascript"></script>

</head>
<body style="">
<div class="demos-buttons">
    {{--显示验证错错误信息--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

</div>
<section id="getintouch" class="bounceIn animated">
    <div class="container" style="border-bottom: 0;">
        <h1>
            <span>修改用户密码</span>
        </h1>
    </div>
    <div class="container">
        <form class="contact" action="<?php echo route('home.user.passwordUpdate',['id'=>$user->id]); ?>" method="post" >

            {{csrf_field()}}
            <div class="row clearfix">
                <div class="lbl">
                    <label for="name"> 用户姓名</label>
                </div>
                <div class="ctrl">
                    <input type="text" id="name" name="" disabled   value="{{$user->name}}">
                </div>
            </div>

            <div class="row clearfix">
                <div class="lbl">
                    <label for="oldPassword">原密码</label>
                </div>
                <div class="ctrl">
                    <input type="password" id="oldPassword" name="oldPassword" required=""  placeholder="请输入用户原密码" >
                </div>
            </div>
            <div class="row clearfix">
                <div class="lbl">
                    <label for="password">新密码</label>
                </div>
                <div class="ctrl">
                    <input type="password" id="password" name="password" required=""  placeholder="请输入用户新密码" >
                </div>
            </div>
            <div class="row clearfix">
                <div class="lbl">
                    <label for="repassword">确认密码</label>
                </div>
                <div class="ctrl">
                    <input type="password" id="repassword" name="repassword" required=""  placeholder="确认密码" >
                </div>
            </div>

            <div class="row clearfix">
                <div class="lbl">
                    <label for="yanzhengma">验证码</label>
                </div>
                <div class="ctrl">
                    <img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">

                    <input type="text" id="yanzhengma" name="yanzhengma" required=""  placeholder="请输入验证码" >
                </div>
            </div>

            <div class="row  clearfix">
                <div class="span10 offset2">
                    <input type="submit" name="" id="" class="submit" value="确认修改">
                </div>
            </div>

        </form>

    </div>
    </div>
</section>
</body>
</html>
