@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="<?php echo route('admin.index'); ?>">首页</a><i class="fa fa-angle-right"></i>产品管理 <i class="fa fa-angle-right"></i>产品添加</li>

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
        <h3>产品添加</h3>
        <div class="panel-body">
            <form action="<?php echo route('admin.goods.add');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-md-2 control-label">产品类别</label>
                    <div class="col-sm-8">

                        <select name="category_id" id="selector1" class="form-control1">
                            @foreach($categories_data as $k=>$v)
                                <option value="{{$v->id}}">{{$v->category_name}}</option>
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
                            <input name="good_name" type="text" class="form-control1" placeholder="请输入产品名称" required="" value="{{old('good_name')}}">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">产品介绍</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa  fa-plus-circle"></i>
									</span>
                            <textarea name="desc" id="" cols="68" placeholder="请输入此产品描述" required=""   value="{{old('desc')}}"  rows="4"></textarea>
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
                            <input name="bianma" type="text" class="form-control1" placeholder="请输入产品编码" required="" value="{{old('bianma')}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">产品图片</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-picture-o"></i>
									</span>
                            <input name="image" type="file" class="form-control1" required="" placeholder="产品图片" >
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
                            <input name="guige" type="text" class="form-control1" placeholder="请输入产品规格,例如100*100×3(mm),1kg/桶" required="" value="{{old('model')}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">产品基数</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-money"></i>
									</span>
                            <input name="price_number" type="text" class="form-control1" placeholder="如果是板材，将面积算出来，如果是线条，将长度写出来，价格单位，4舍5如保留两位小数" required="" value="{{old('price_desc')}}">
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
                            <textarea name="guige_desc" id="" cols="68" placeholder="请输入当前产品规格描述" required=""   value="{{old('guige_desc')}}"  rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">价格描述</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa   fa-money"></i>
									</span>
                            <input name="price_desc" type="text" class="form-control1" placeholder="例如（平方米，桶，根，米，立方米），统计价格后面的计量单位" required="" value="{{old('price_desc')}}">
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
                            <input name="shichang_price" type="text" class="form-control1" placeholder="请输入产品市场价" required="" value="{{old('shichang_price')}}">
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
                            <input name="hezuo_price" type="text" class="form-control1" placeholder="请输入产品合作价" required="" value="{{old('hezuo_price')}}">
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
                            <input name="daili_price" type="text" class="form-control1" placeholder="请输入产品代理价" required="" value="{{old('daili_price')}}">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">产品颜色</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa    fa-plus-circle"></i>
									</span>
                            <input name="color" type="text" class="form-control1" placeholder="请输入产品颜色" required="" value="{{old('color')}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">产品颜色图片</label>
                    <div class="col-md-8">
                        <div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-picture-o"></i>
									</span>
                            <input name="color_image" type="file" class="form-control1" required="" placeholder="产品颜色图片" >
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