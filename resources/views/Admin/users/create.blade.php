@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>用户管理 <i class="fa fa-angle-right"></i>管理员添加</li>

@endsection
@section('content')

    {{--管理员添加--}}
    <div class="grid-form1">
        <h3>管理员添加</h3>
        <div class="panel-body">
            <form role="form" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-2 control-label">姓名</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa  fa-user"></i>
									</span>
                            <input type="text" class="form-control1" placeholder="请输入姓名">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="radio" class="col-sm-2 control-label">性别</label>
                    <div class="col-sm-8">
                        <div class="radio block"><label><input type="radio" name="sex" value="1"> 男</label></div>
                        <div class="radio block"><label><input type="radio" name="sex" value="2"> 女</label></div>
                        <div class="radio block"><label><input type="radio" name="sex" > 保密</label></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">电话</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-volume-control-phone"></i>
									</span>
                            <input type="text" class="form-control1" placeholder="请输入联系电话">
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
                            <input type="password" class="form-control1" id="exampleInputPassword1" placeholder="密码">
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
                            <input type="password" class="form-control1" id="exampleInputPassword1" placeholder="密码">
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
                            <input type="file" class="form-control1" placeholder="头像">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">管理级别</label>
                    <div class="col-sm-8">

                        <select name="selector1" id="selector1" class="form-control1">
                            <option>董事长</option>
                            <option>分公司</option>
                            <option>组长</option>
                            <option selected>普通组员</option>
                        </select>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn-primary btn">提交</button>
                            <button class="btn-default btn">取消</button>
                            <button class="btn-inverse btn">重新输入</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    {{--管理员添加结束--}}

    <script>
        $(document).ready(function() {
            var navoffeset=$(".header-main").offset().top;
            $(window).scroll(function(){
                var scrollpos=$(window).scrollTop();
                if(scrollpos >=navoffeset){
                    $(".header-main").addClass("fixed");
                }else{
                    $(".header-main").removeClass("fixed");
                }
            });

        });
    </script>
@endsection