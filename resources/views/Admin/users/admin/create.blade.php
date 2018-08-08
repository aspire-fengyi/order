@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>管理员管理 <i class="fa fa-angle-right"></i>管理员添加</li>

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

    {{--管理员添加--}}
    <div class="grid-form1">
        <h3>管理员添加</h3>
        <div class="panel-body">
            <form action="<?php echo route('admin.users.admin_add');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-2 control-label">姓名</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa  fa-user"></i>
									</span>
                            <input name="name" type="text" class="form-control1" placeholder="请输入姓名" required="" value="{{old('name')}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="radio" class="col-sm-2 control-label">性别</label>
                    <div class="col-sm-8">
                        <div class="radio block"><label><input type="radio" name="sex" value="1"> 男</label></div>
                        <div class="radio block"><label><input type="radio" name="sex" value="2"> 女</label></div>
                        <div class="radio block"><label><input type="radio" name="sex" value="0" checked> 保密</label></div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">电话</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-volume-control-phone"></i>
									</span>
                            <input name="phone" type="text" class="form-control1" placeholder="请输入联系电话" required="" value="{{old('phone')}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">密码</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
                            <input name="password" type="password" class="form-control1" id="exampleInputPassword1" placeholder="请输入6位及以上密码" required="">
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
                            <input name="repassword" type="password" class="form-control1" id="exampleInputPassword1" placeholder="确认密码" required="">
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
                            <input name="date" type="date" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" required="" value="{{old('date')}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">选择头像</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-picture-o"></i>
									</span>
                            <input name="photo" type="file" class="form-control1" placeholder="头像" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">管理级别</label>
                    <div class="col-sm-8">

                        <select name="leader_id" id="selector1" class="form-control1">
                            @foreach($leaders_data as $k=>$v)
                                <option value="{{$v->id}}">{{$v->leader_name}}</option>
                            @endforeach
                        </select>
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
    {{--管理员添加结束--}}


@endsection