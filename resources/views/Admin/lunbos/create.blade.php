@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>轮播图管理 <i class="fa fa-angle-right"></i>产品轮播图添加</li>

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

    {{--轮播图添加--}}
    <div class="grid-form1">
        <h3>轮播图添加</h3>
        <div class="panel-body">
            <form action="<?php echo route('admin.lunbos.add');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-md-2 control-label">轮播名</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa    fa-plus-circle"></i>
									</span>
                            <input name="lunbo_name" type="text" class="form-control1" placeholder="请输入轮播名" required="" value="{{old('lunbo_name')}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">链接地址</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa    fa-plus-circle"></i>
									</span>
                            <input name="lunbo_http" type="text" class="form-control1" placeholder="请输入链接地址(http://www.baidu.com)" required="" value="{{old('lunbo_http')}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">轮播状态</label>
                    <div class="col-sm-8">
                        <div class="checkbox-inline"><label><input name="status" type="radio" value="1"> 显示</label></div>
                        <div class="checkbox-inline"><label><input name="status" type="radio" value="0"> 隐藏</label></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">轮播图片</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-picture-o"></i>
									</span>
                            <input name="image" type="file" class="form-control1" placeholder="轮播图片" >
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