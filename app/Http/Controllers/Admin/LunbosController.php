<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lunbo;

class LunbosController extends Controller
{
    //显示轮播图页面
    function create()
    {
        return view('Admin.lunbos.create');
    }

    //轮播图添加处理
    function add(Request $request)
    {
        $data = $request->all();

        //处理照片
        if ($request->hasFile('image')) {

            //获取上传图片信息
            $photo = $request->file('image');

            //获取后缀
            $ext = $photo->getClientOriginalExtension();

            //为图片起新名字
            $temp_name = time() . rand(1000, 9999) . '.' . $ext;

            //设置路径名称
            $dir_name = '/images/admin/lunbos/' . date('Ymd', time());

            //往数据库中存储的名字 拼接路径方便存储.
            $photo_path = $dir_name . '/' . $temp_name;
            //echo $name;

            //将图片移动到框架中   路径  ，  名称
            $photo->move('.' . $dir_name, $temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['image_path'] = $photo_path;

        }

        $lunbo = new Lunbo();

        $lunbo->lunbo_name=$data['lunbo_name'];

        $lunbo->lunbo_http=$data['lunbo_http'];

        $lunbo->status=$data['status'];

        $lunbo->image_path=$data['image_path'];

        $res = $lunbo->save();

        if($res){
            return redirect('/admin/lunbos/index')->with('success','添加轮播图成功');
        }else{
            return back()->with('error','添加轮播图失败');
        }
    }

    //轮播图详情
    function index()
    {
        $lunbos = Lunbo::all();

        return view('Admin/lunbos/index',['lunbos'=>$lunbos]);
    }

    //轮播图删除
    function delete(Request $request,$id)
    {
        $lunbo = Lunbo::find($id);

        $image=$lunbo->image_path;


        $res = Lunbo::destroy($id);

        if($res){
            unlink('.'.$image);
            return back()->with('success','删除轮播成功');
        }
    }

    //轮播图状态-》显示
    function xianshi(Request $request,$id)
    {
        $lunbo = Lunbo::find($id);

        $lunbo->status = 1;

        $lunbo->save();
        return back();
    }

    //轮播图状态-》隐藏
    function yincang(Request $request,$id)
    {
        $lunbo = Lunbo::find($id);

        $lunbo->status = 0;

        $lunbo->save();

        return back();
    }
}
