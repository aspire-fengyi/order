@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>派单 <i class="fa fa-angle-right"></i>派单添加</li>

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
        <div class="panel-body">
            <form action="<?php echo route('admin.paidan.add');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                <h3>派单添加</h3>

                <div class="form-group">
                    <label class="col-md-2 control-label">接单人运营商</label>
                    <div class="col-md-8">
                        <select name="user_id" id="selector1" class="form-control1">

                            @foreach($users as $user)
                            <option  value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>

                <h3>派单详情</h3>

                <div class="form-group">
                    <label class="col-md-2 control-label">订单联系人</label>
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
                    <label class="col-md-2 control-label">派单详情</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa  fa-plus-circle"></i>
									</span>
                            <textarea name="info" id="" cols="68" placeholder="请输入派单详情" required=""   value="{{old('desc')}}"  rows="4"></textarea>
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
    {{--管理员添加结束--}}


@endsection