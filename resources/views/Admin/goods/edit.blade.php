@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>产品管理 <i class="fa fa-angle-right"></i>产品修改</li>

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
        <h3>产品修改</h3>
        <div class="panel-body">
            <form action="<?php echo route('admin.goods.update',['id'=>$good->id]);?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-md-2 control-label">产品类别</label>
                    <div class="col-sm-8">

                        <select name="category_id" id="selector1" class="form-control1">
                            @foreach($categories_data as $k=>$v)
                                <option value="{{$v->id}}" @if($good->category_id ==$v->id ) selected @endif>{{$v->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">产品名称</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa  fa-plus-circle"></i>
									</span>
                            <input name="good_name" type="text" class="form-control1" placeholder="请输入产品名称" required="" value="{{$good->good_name}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">产品编码</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa    fa-plus-circle"></i>
									</span>
                            <input name="bianma" type="text" class="form-control1" placeholder="请输入产品编码" required="" value="{{$good->goodModel->bianma}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">产品图片:默认为原图</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-picture-o"></i>
									</span>
                            <input name="image" type="file" class="form-control1" placeholder="产品图片" >
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">库存数量</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa    fa-plus-circle"></i>
									</span>
                            <input name="stocks" type="text" class="form-control1" placeholder="请输入库存数量" required="" value="{{$good->goodModel->stocks}}">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">产品描述</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa  fa-plus-circle"></i>
									</span>
                            <textarea name="desc" id="" cols="68" placeholder="请输入产品描述"   value=""  rows="4">{{$good->goodModel->desc}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">产品状态</label>
                    <div class="col-sm-8">
                        <div class="checkbox-inline"><label><input name="status" type="radio" checked value="2"> 新品</label></div>
                        <div class="checkbox-inline"><label><input name="status" type="radio" value="1"> 上架</label></div>
                        <div class="checkbox-inline"><label><input name="status" type="radio" value="0"> 下架</label></div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">价格描述</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-money"></i>
									</span>
                            <input name="price_desc" type="text" class="form-control1" placeholder="例如（平方米，桶，根，米，立方米），统计价格后面的计量单位" value="{{$good->goodModel->price_desc}}">
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
                            <input name="shichang_price" type="text" class="form-control1" placeholder="请输入产品市场价" required="" value="{{$good->goodModel->shichang_price}}">
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
                            <input name="hezuo_price" type="text" class="form-control1" placeholder="请输入产品合作价" required="" value="{{$good->goodModel->hezuo_price}}">
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
                            <input name="daili_price" type="text" class="form-control1" placeholder="请输入产品代理价" required="" value="{{$good->goodModel->daili_price}}">
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