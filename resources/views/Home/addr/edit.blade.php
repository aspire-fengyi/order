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
            <span>修改收货地址</span>
        </h1>
    </div>
    <div class="container">
        <form class="contact" action="<?php echo route('home.addr.update',['id'=>$addr->id]); ?>" method="post" >

            {{csrf_field()}}
            <div class="row clearfix">
                <div class="lbl">
                    <label for="name"> 收件人姓名</label>
                </div>
                <div class="ctrl">
                    <input type="text" id="name" name="addr_name" required=""   placeholder="请输入收件人姓名" value="{{$addr->addr_name}}">
                </div>
            </div>

            <div class="row clearfix">
                <div class="lbl">
                    <label for="phone">收件人电话</label>
                </div>
                <div class="ctrl">
                    <input type="text" id="phone" name="addr_phone" required=""  placeholder="请输入收件人手机号" value="{{$addr->addr_phone}}">
                </div>
            </div>
            <div class="row clearfix">
                <div class="lbl">
                    <label for="subject">请输入详细收货地址</label>
                </div>
                <div class="ctrl">
                    <input type="text" name="addr" id="addr"  required=""   placeholder="请输入详细地址,例:北京市,通州区,宋庄,创意工厂科技有限公司" value="{{$addr->addr}}">
                </div>
            </div>

            <div class="row  clearfix">
                <div class="span10 offset2">
                    <input type="submit" name="" id="" class="submit" value="提交地址">
                </div>
            </div>
        </form>

    </div>
    </div>
</section>
</body>
</html>
