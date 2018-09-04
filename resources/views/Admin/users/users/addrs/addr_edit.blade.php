@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>合作商管理 <i class="fa fa-angle-right"></i>合作商添加</li>

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
        <h3>合作商添加</h3>
        <div class="panel-body">
            <form action="<?php echo route('admin.users.addr_update',['userId'=>$userId,'id'=>$addr->id]);?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-md-2 control-label">收货人姓名</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-map-marker"></i>
									</span>
                            <input name="addr_name" type="text" class="form-control1" placeholder="请输入收货人姓名" required="" value="{{$addr->addr_name}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">收货地址</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-map-marker"></i>
									</span>
                            <input name="addr" type="text" class="form-control1" placeholder="请输入收货地址,例:北京市,通州区,宋庄,创意工厂科技有限公司" required="" value="{{$addr->addr}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">收货电话</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-volume-control-phone"></i>
									</span>
                            <input name="addr_phone" type="text" class="form-control1" placeholder="请输入收货电话" required="" value="{{$addr->addr_phone}}">
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <input type="submit" class="btn-primary btn" value="确认修改">
                            <input type="reset" class="btn-inverse btn" value="重置">
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
    {{--管理员添加结束--}}


@endsection