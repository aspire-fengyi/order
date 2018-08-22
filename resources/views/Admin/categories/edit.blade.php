@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>产品类别管理 <i class="fa fa-angle-right"></i>产品类别修改</li>

@endsection
@section('content')

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


    <form role="form" action="<?php echo route('admin.categories.update',['id'=>$category_data->id]); ?>" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="form-horizontal form-group">
            <div class="mother-grid-inner copyrights ">

                <div class="form-group mb-n">
                    <label for="largeinput" class="col-sm-2 control-label label-input-lg">修改产品类别名称</label>
                    <div class="col-sm-8">
                        <input name="category_name" type="text" class="form-control1 input-lg" id="largeinput" required="" placeholder="请输入产品类别名称" value="{{$category_data->category_name}}">
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

            </div>
        </div>

    </form>

@endsection