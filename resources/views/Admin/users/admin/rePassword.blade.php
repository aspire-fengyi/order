@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>管理员管理 <i class="fa fa-angle-right"></i>修改个人信息</li>

@endsection
@section('content')
    {{--@endsection--}}

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

    {{--管理员修改--}}
    <div class="grid-form1">
        <h3>修改个人信息</h3>
        <div class="panel-body">
            <form action="<?php echo route('admin.doRePassword',['id'=>session('adminUser')['id']]);?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-2 control-label">姓名</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa  fa-user"></i>
									</span>
                            <input name="" type="text" class="form-control1" placeholder="请输入姓名" disabled value="{{session('adminUser')['name']}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">性别</label>
                    <div class="col-sm-8">
                        <div class="checkbox-inline"><label><input name="sex" type="radio" @if(session('adminUser')['sex']==1)checked @endif value="1"> 男</label></div>
                        <div class="checkbox-inline"><label><input name="sex" type="radio" @if(session('adminUser')['sex']==2)checked @endif value="2"> 女</label></div>
                        <div class="checkbox-inline"><label><input name="sex" type="radio" @if(session('adminUser')['sex']==0)checked @endif value="0"> 保密</label></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">电话</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-volume-control-phone"></i>
									</span>
                            <input name="phone" type="text" class="form-control1" placeholder="请输入联系电话" required="" value="{{session('adminUser')['phone']}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">出生日期</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon">
										<i class="fa  fa-wpforms"></i>
									</span>
                            <input name="date" type="date" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" required="" value="{{session('adminUser')['date']}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">原密码</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
                            <input name="oldPassword" type="password" class="form-control1" id="exampleInputPassword1" required=""  placeholder="请输入6位及以上密码" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">新密码</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
                            <input name="password" type="password" class="form-control1" id="exampleInputPassword1" required=""  placeholder="请输入6位及以上密码" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">确认密码</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
                            <input name="repassword" type="password" class="form-control1" id="exampleInputPassword1" required=""  placeholder="确认密码" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">验证码</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">
                            <input name="yanzhengma" type="text" class="form-control1" placeholder="验证验证码" required="" >
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <input type="submit" class="btn-primary btn" value="提交">
                            <input type="reset" class="btn-inverse btn" value="重置">
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    {{--管理员修改结束--}}


@endsection