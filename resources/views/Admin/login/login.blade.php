<!DOCTYPE HTML>
<html>
<head>
    <title>登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="/adminTemplate/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="/adminTemplate/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/adminTemplate/css/morris.css" type="text/css"/>
    <!-- Graph CSS -->
    <link href="/adminTemplate/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/adminTemplate/css/jquery-ui.css">
    <!-- jQuery -->
    <script src="/adminTemplate/js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="/adminTemplate/css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
</head>
<body>

<!-- 显示错误的信息-->

<div class="main-wthree">
    <div class="container">

        <div class="sin-w3-agile">

            <h2>管理员登录</h2>
            <form action="<?php echo route('admin.doLogin') ?>" method="post">

                @if (count($errors) > 0)
                    <div class="mws-form-message error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($errors->has('captcha'))
                    <div class="col-md-12" >
                        <p class="text-danger text-left alert alert-danger"  ><strong><h1>{{$errors->first('captcha')}}</h1></strong></p>
                    </div>
                @endif
                {{csrf_field()}}
                <div class="username">
                    <span class="username">用户名:</span>
                    <input type="text" name="name" class="name" placeholder="请输入用户名"  value="{{old('name')}}" required="">
                    <div class="clearfix"></div>
                </div>

                <div class="password-agileits">
                    <span class="username">密码:</span>
                    <input type="password" name="password" class="password" placeholder="请输入密码" required="">
                    <div class="clearfix"></div>
                </div>

                <div >
                    <img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">
                    <div class="clearfix"></div>
                </div>

                <div class="password-agileits">
                    <span class="username">验证码:</span>
                    <input type="password" name="yanzhengma"  class="name" placeholder="请输入验证码" required="">
                    <div class="clearfix"></div>
                </div>

                <div class="login-w3">
                    <input type="submit" class="login" value="登录">
                </div>
                <div class="clearfix"></div>

            </form>

        </div>
    </div>
</div>

</body>

</html>