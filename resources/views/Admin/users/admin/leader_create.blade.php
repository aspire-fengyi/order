@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>权限管理 <i class="fa fa-angle-right"></i>权限添加</li>

@endsection
@section('content')

    <form role="form" action="<?php echo route('admin.users.admin_leader_add'); ?>" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="form-horizontal form-group">
        <div class="mother-grid-inner copyrights ">

            <div class="form-group">
                <label for="selector1" class="col-sm-2 control-label">权限添加</label>
                <div class="col-sm-8">
                    <select name="pid" id="selector1" class="form-control1">
                        <option value="0">请选择（此选择默认为顶级权限）</option>
                        @foreach($leaders_data as $k=>$v)
                            <option value="{{$v->id}}">{{$v->leader_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group mb-n">
                <label for="largeinput" class="col-sm-2 control-label label-input-lg">权限名称</label>
                <div class="col-sm-8">
                    <input name="leader_name" type="text" class="form-control1 input-lg" id="largeinput"  required="" placeholder="请输入权限名称">
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