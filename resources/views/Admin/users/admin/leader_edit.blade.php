@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>管理员管理 <i class="fa fa-angle-right"></i>权限修改</li>

@endsection
@section('content')

    <form role="form" action="<?php echo route('admin.users.admin_leader_update',['id'=>$data->id]); ?>" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="form-horizontal form-group">
            <div class="mother-grid-inner copyrights ">

                <div class="form-group mb-n">
                    <label for="largeinput" class="col-sm-2 control-label label-input-lg">修改权限名称</label>
                    <div class="col-sm-8">
                        <input name="leader_name" type="text" class="form-control1 input-lg" id="largeinput" required=""  placeholder="请输入权限名称" value="{{$data->leader_name}}">
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