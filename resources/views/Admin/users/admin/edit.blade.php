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

    {{--管理员修改--}}
    <div class="grid-form1">
        <h3>管理员修改</h3>
        <div class="panel-body">
            <form action="<?php echo route('admin.users.admin_update',['id'=>$admin_user_data->id]);?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-2 control-label">姓名</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa  fa-user"></i>
									</span>
                            <input name="name" type="text" class="form-control1" placeholder="请输入姓名" required="" value="{{$admin_user_data->name}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="radio" class="col-sm-2 control-label">性别</label>
                    <div class="col-sm-8">
                        <div class="checkbox-inline"><label><input name="sex" type="radio" @if($admin_user_data->sex==1)checked @endif value="1"> 男</label></div>
                        <div class="checkbox-inline"><label><input name="sex" type="radio" @if($admin_user_data->sex==2)checked @endif value="2"> 女</label></div>
                        <div class="checkbox-inline"><label><input name="sex" type="radio" @if($admin_user_data->sex==0)checked @endif value="0"> 保密</label></div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">电话</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-volume-control-phone"></i>
									</span>
                            <input name="phone" type="text" class="form-control1" placeholder="请输入联系电话" required="" value="{{$admin_user_data->phone}}">
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
                    <label for="selector1" class="col-sm-2 control-label">管理级别</label>
                    <div class="col-sm-8">

                        <select name="leader_id" id="selector1" class="form-control1">
                            @foreach($leaders_data as $k=>$v)
                                <option @if(  $v->id  == $admin_user_data->leader_id) selected @endif value="{{$v->id}}">{{$v->leader_name}}</option>
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
    {{--管理员修改结束--}}


@endsection