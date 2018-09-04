<?php

namespace App\Http\Controllers\Admin;

use Faker\Provider\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Good;
use App\Models\GoodModel;
use App\Models\GoodGuige;
use App\Models\GoodColor;
use App\Models\GoodPicture;
use \DB;


class GoodsController extends Controller
{

    //排序获取产品类别方法，封装成静态
    static function get_categories_data()
    {

        //自定义sql语句查询，添加paths字段查询
        $sql = "select * , concat(path,',',id) as paths from categories order by paths ";

        //按照级别查询数据用DB+sql语句查询
        $categories_data = DB::select("$sql");

        foreach ($categories_data as $key => $value) {
            //统计逗号出现次数
            $n = substr_count($value->path, ',');

            $categories_data[$key]->category_name = str_repeat('|----', $n) . $value->category_name;
        }

        return $categories_data;

    }

    //递归获取产品类别
    static function getPidLeaders($pid = 0)
    {
        $data = Categories::where('pid', $pid)->get();
        //放置空数组
        $arr = [];
        foreach ($data as $key => $value) {
            //在每一个数据中加入sub，如果有子分类
            $value['sub'] = self::getPidLeaders($value->id);
            //重新生成数组
            $arr[] = $value;
        }

        return $arr;
    }

    //产品添加方法
    function create()
    {
        return view('Admin.goods.create', ['categories_data' => self::get_categories_data()]);
    }


    //添加商品
    function add(Request $request)
    {
        DB::beginTransaction();

        $data = $request->all();

        //处理产品照片
        if ($request->hasFile('image')) {

            //获取上传图片信息
            $image = $request->file('image');

            //获取后缀
            $ext = $image->getClientOriginalExtension();

            //为图片起新名字
            $temp_name = time() . rand(1000, 9999) . '.' . $ext;

            //设置路径名称
            $dir_name = '/images/admin/goods/' . date('Ymd', time());

            //往数据库中存储的名字 拼接路径方便存储.
            $image_path = $dir_name . '/' . $temp_name;
            //echo $name;

            //将图片移动到框架中             路径  ，  名称
            $image->move('.' . $dir_name, $temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['image_path'] = $image_path;

        }

        //处理产品颜色照片
        if ($request->hasFile('color_image')) {

            //获取上传图片信息
            $color_image = $request->file('color_image');

            //获取后缀
            $ext = $color_image->getClientOriginalExtension();

            //为图片起新名字
            $temp_name = time() . rand(1000, 9999) . '.' . $ext;

            //设置路径名称
            $dir_name = '/images/admin/goods/color/' . date('Ymd', time());

            //往数据库中存储的名字 拼接路径方便存储.
            $color_image_path = $dir_name . '/' . $temp_name;
            //echo $name;

            //将图片移动到框架中             路径  ，  名称
            $color_image->move('.' . $dir_name, $temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['color_image_path'] = $color_image_path;

        }


        $good = new Good;

        $good->good_name = $data['good_name'];

        $good->category_id = $data['category_id'];

        $good->status = $data['status'];

        $res1 = $good->save();

        //获取最后一条插入数据的id
        $id = DB::getPdo()->lastInsertId();

        //转换数据类型
        $good_id = intval($id);

        //添加商品模型
        $good_model = new GoodModel();

        $good_model->good_name = $data['good_name'];

        $good_model->good_id = $good_id;

        $good_model->good_name = $data['good_name'];

        $good_model->price_desc = $data['price_desc'];

        $good_model->desc = $data['desc'];

        $good_model->status = $data['status'];

        $good_model->image_path = $data['image_path'];

        $res2 = $good_model->save();

        //获取最后一条插入数据的id
        $good_model_id = DB::getPdo()->lastInsertId();

        //转换数据类型
        $good_model_id = intval($id);


        //添加商品规格
        $good_guige = new GoodGuige();

        $good_guige->good_id = $good_id;

        $good_guige->good_model_id = $good_model_id;

        $good_guige->bianma = $data['bianma'];

        $good_guige->guige = $data['guige'];

        $good_guige->guige_desc = $data['guige_desc'];

        $good_guige->shichang_price = $data['shichang_price'];

        $good_guige->hezuo_price = $data['hezuo_price'];

        $good_guige->daili_price = $data['daili_price'];

        $good_guige->price_number = $data['price_number'];

        $res4 = $good_guige->save();


        //添加商品颜色
        $good_color = new GoodColor();

        $good_color->good_id = $good_id;

        $good_color->color = $data['color'];

        $good_color->color_image_path = $data['color_image_path'];

        $res3 = $good_color->save();




        if ($res1 && $res2 && $res3 && $res4) {

            DB::commit();
            return redirect('/admin/goods/index')->with('success', '添加成功');

        } else {

            DB::rollBack();
            return back()->with('error', '添加失败');
        }

    }

    //产品详情路由
    function index()
    {

        $data = self::getPidLeaders();

        return view('Admin.goods.index',['goods'=>$data]);

    }

    //产品更新路由
    function edit(Request $request,$id)
    {
        $good = Good::find($id);
        return view('Admin.goods.edit', ['categories_data' => self::get_categories_data(),'good'=>$good]);

    }

    //产品删除路由
    function delete(Request $request,$id)
    {
        $good = Good::find($id);

        $guiges = GoodGuige::where('good_id',$id)->first();


        $colors = GoodColor::where('good_id',$id)->first();


//        $guiges = $good->goodGuiges;
//
//        $colors = $good->goodColors;

         if($guiges){
             return back()->with('error', '请先清空产品颜色，再进行删除操作');
         };

        if($colors){
            return back()->with('error', '请先清空产品规格，再进行删除操作');
        }





        $goodModel = $good->goodModel;

        $res1 = $goodModel->delete();

        $res2 = $good->delete();

        if($res1 && $res2){
            return back()->with('success', '删除商品成功');
        }

    }

    //产品更新处理路由
    function update(Request $request,$id)
    {

        DB::beginTransaction();

        $data = $request->all();

        $good = Good::find($id);

        $good->good_name=$data['good_name'];

        $good->status=$data['status'];

        $good->category_id=$data['category_id'];

        $res1 = $good->save();

        $good_model= $good->goodModel;

        $good_model->good_name = $data['good_name'];

        $good_model->price_desc = $data['price_desc'];

        $good_model->desc = $data['desc'];

        $good_model->status = $data['status'];

        //处理产品照片
        if ($request->hasFile('image')) {

            //获取上传图片信息
            $image = $request->file('image');

            //获取后缀
            $ext = $image->getClientOriginalExtension();

            //为图片起新名字
            $temp_name = time() . rand(1000, 9999) . '.' . $ext;

            //设置路径名称
            $dir_name = '/images/admin/goods/' . date('Ymd', time());

            //往数据库中存储的名字 拼接路径方便存储.
            $image_path = $dir_name . '/' . $temp_name;
            //echo $name;

            //将图片移动到框架中             路径  ，  名称
            $image->move('.' . $dir_name, $temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['image_path'] = $image_path;

            $good_model->image_path = $data['image_path'];

        }

        $res2 = $good_model->save();


        if ($res1 && $res2 ) {

            DB::commit();
            return redirect('/admin/goods/index')->with('success', '产品信息修改成功');

        } else {

            DB::rollBack();
            return back()->with('error', '产品信息修改失败');
        }



    }



    //添加商品其他规格路由
    function addModel()
    {
        return view('Admin.goods.addModel');
    }

    //显示商品颜色详情页面
    function goodColor(Request $request,$id)
    {
        $good = Good::find($id);


        return view ('Admin.goods.colors.index',['good'=>$good]);
    }

    //商品颜色添加
    function goodColorCreate(Request $request,$id)
    {
        return view('Admin.goods.colors.create',['good_id'=>$id]);
    }


    //商品颜色添加处理
    function goodColorAdd(Request $request,$id)
    {
        DB::beginTransaction();
        $data = $request->all();

        //处理产品颜色照片
        if ($request->hasFile('color_image')) {

            //获取上传图片信息
            $color_image = $request->file('color_image');

            //获取后缀
            $ext = $color_image->getClientOriginalExtension();

            //为图片起新名字
            $temp_name = time() . rand(1000, 9999) . '.' . $ext;

            //设置路径名称
            $dir_name = '/images/admin/goods/color/' . date('Ymd', time());

            //往数据库中存储的名字 拼接路径方便存储.
            $color_image_path = $dir_name . '/' . $temp_name;
            //echo $name;

            //将图片移动到框架中             路径  ，  名称
            $color_image->move('.' . $dir_name, $temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['color_image_path'] = $color_image_path;

        }

        $good_color = new GoodColor;

        $good_color -> color = $data['color'];

        $good_color-> good_id =  $id;

        $good_color-> color_image_path =  $data['color_image_path'];

        $res = $good_color->save();

        if ($res) {

            DB::commit();
            return redirect("/admin/goods/goodColor/$id")->with('success', '添加颜色成功');

        } else {

            DB::rollBack();
            return back()->with('error', '添加失败');
        }

    }

    //产品颜色修改路由
    function goodColorEdit(Request $request,$id)
    {
        $color = GoodColor::find($id);

        return view('Admin.goods.colors.edit',['color'=>$color]);
    }


    //产品颜色修改路由
    function goodColorUpdate(Request $request,$id)
    {
        $data = $request->all();


        $color = GoodColor::find($id);


        $good_id = $color->good_id;

        $color_image_path = $color->color_image_path;

        $good = Good::find($good_id);

        $color->color = $data['color'];

        //处理产品照片
        if ($request->hasFile('color_image')) {

            unlink('.' . $color_image_path);
            //获取上传图片信息
            $image = $request->file('color_image');

            //获取后缀
            $ext = $image->getClientOriginalExtension();

            //为图片起新名字
            $temp_name = time() . rand(1000, 9999) . '.' . $ext;

            //设置路径名称
            $dir_name = '/images/admin/goods/colors/' . date('Ymd', time());

            //往数据库中存储的名字 拼接路径方便存储.
            $image_path = $dir_name . '/' . $temp_name;
            //echo $name;

            //将图片移动到框架中             路径  ，  名称
            $image->move('.' . $dir_name, $temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['color_image_path'] = $image_path;

            $color->color_image_path = $data['color_image_path'];

        }

        $res = $color->save();


        if($res)
        {
            return view('Admin.goods.colors.index',['good'=>$good]);
        }
    }

    //产品颜色删除路由
    function goodColorDelete( Request $request,$id)
    {
        $color_data = GoodColor::find($id);

        $color_image_path = $color_data->color_image_path;


        $res = GoodColor::destroy($id);

        if ($res) {
            unlink('.' . $color_image_path);
            return back()->with('success', '删除颜色成功');
        }

    }

    //产品规格显示路由
    function goodGuige(Request $request,$id)
    {
        $good = Good::find($id);

        return view('Admin.goods.guiges.index',['good'=>$good]);
    }

    //产品规格添加路由
    function goodGuigeCreate(Request $request,$id)
    {
        return view('Admin.goods.guiges.create',['good_id'=>$id]);
    }

    //商品规格添加处理
    function goodGuigeAdd(Request $request,$id)
    {
        DB::beginTransaction();

        $good = Good::find($id);

        $good_model = $good->goodModel;

        $good_model_id = $good_model->id;

        $data = $request->all();

        $good_guige = new GoodGuige();

        $good_guige -> good_id = $id;

        $good_guige -> good_model_id = $good_model_id;

        $good_guige -> bianma = $data['bianma'];

        $good_guige -> guige = $data['guige'];

        $good_guige -> guige_desc = $data['guige_desc'];

        $good_guige->shichang_price = $data['shichang_price'];

        $good_guige->hezuo_price = $data['hezuo_price'];

        $good_guige->daili_price = $data['daili_price'];

        $good_guige-> good_id =  $id;

        $res = $good_guige->save();

        if ($res) {

            DB::commit();
            return redirect("/admin/goods/goodGuige/$id")->with('success', '添加规格成功');

        } else {

            DB::rollBack();
            return back()->with('error', '添加失败');
        }

    }

    //产品规格修改路由
    function goodGuigeEdit(Request $request,$id)
    {
        $guige = GoodGuige::find($id);

        return view('Admin.goods.guiges.edit',['guige'=>$guige]);
    }

    //产品规格修改路由
    function goodGuigeUpdate(Request $request,$id)
    {
        $data = $request->all();


        $good_guige = GoodGuige::find($id);


        $good_id = $good_guige->good_id;


        $good = Good::find($good_id);


        $good_guige -> bianma = $data['bianma'];

        $good_guige -> guige = $data['guige'];

        $good_guige -> guige_desc = $data['guige_desc'];

        $good_guige->shichang_price = $data['shichang_price'];

        $good_guige->hezuo_price = $data['hezuo_price'];

        $good_guige->daili_price = $data['daili_price'];


        $res = $good_guige->save();


        if($res)
        {
            return redirect()->route('admin.goods.goodGuige',['good'=>$good]);
        }
    }



    //产品规格删除路由
    function goodGuigeDelete( Request $request,$id)
    {

        $res = GoodGuige::destroy($id);

        if ($res) {
            return back()->with('success', '删除商品规格成功');
        }

    }



    //产品图片显示路由
    function goodPicture(Request $request,$id)
    {
        $good = Good::find($id);

        return view('Admin.goods.pictures.index',['good'=>$good]);
    }


    //产品图片添加显示路由
    function goodPictureCreate(Request $request,$id)
    {

        return view('Admin.goods.pictures.create',['good_id'=>$id]);
    }


    //产品图片添加处理路由
    function goodPictureAdd(Request $request,$id)
    {

        $data = $request->all();
        $good = Good::find($id);


        //处理产品颜色照片
        if ($request->hasFile('picture_path')) {

            //获取上传图片信息
            $color_image = $request->file('picture_path');

            //获取后缀
            $ext = $color_image->getClientOriginalExtension();

            //为图片起新名字
            $temp_name = time() . rand(1000, 9999) . '.' . $ext;

            //设置路径名称
            $dir_name = "/images/admin/goods/pictures/$id/" . date('Ymd', time());

            //往数据库中存储的名字 拼接路径方便存储.
            $color_image_path = $dir_name . '/' . $temp_name;
            //echo $name;

            //将图片移动到框架中             路径  ，  名称
            $color_image->move('.' . $dir_name, $temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['picture_path'] = $color_image_path;
        }

        $good_picture = new GoodPicture();

        $good_picture->good_id = $id;

        $good_picture->picture_path = $data['picture_path'];

        $res = $good_picture->save();

        if($res)
        {
            return redirect()->route('admin.goods.goodPicture',['good'=>$good]);
        }


    }


    //产品图片添加显示处理路由
    function goodPictureDelete(Request $request,$id)
    {
       $picture = GoodPicture::find($id);

       $picture_path = $picture->picture_path;

       $res = GoodPicture::destroy($id);

        if ($res) {
            unlink('.'.$picture_path);
            return back()->with('success', '删除商品规格成功');
        }

    }



}
