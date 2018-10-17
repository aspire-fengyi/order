@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>产品管理 <i class="fa fa-angle-right"></i>产品规格修改</li>

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

    {{--管理员添加--}}
    <div class="grid-form1">
        <h3>产品规格修改</h3>
        <div class="panel-body">
            <form action="<?php echo route('admin.goods.goodGuigeUpdate', ['id' => $guige->id]);?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-md-2 control-label">产品编码</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa    fa-plus-circle"></i>
									</span>
                            <input name="bianma" type="text" class="form-control1" placeholder="请输入产品编码" required="" value="{{$guige->bianma}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">产品规格</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa    fa-plus-circle"></i>
									</span>
                            <input name="guige" type="text" class="form-control1" placeholder="请输入产品规格,例如100*100×3(mm),1kg/桶" required="" value="{{$guige->guige}}">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">对应规格描述</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa  fa-plus-circle"></i>
									</span>
                            <textarea name="guige_desc" id="" cols="68" placeholder="请输入当前产品规格描述" required=""   value=""  rows="4">{{$guige->guige_desc}}</textarea>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">市场价</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-money"></i>
									</span>
                            <input name="shichang_price" type="text" class="form-control1" placeholder="请输入产品市场价" required="" value="{{$guige->shichang_price}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">合作价</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-money"></i>
									</span>
                            <input name="hezuo_price" type="text" class="form-control1" placeholder="请输入产品合作价" required="" value="{{$guige->hezuo_price}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">代理价</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-money"></i>
									</span>
                            <input name="daili_price" type="text" class="form-control1" placeholder="请输入产品代理价" required="" value="{{$guige->daili_price}}">
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