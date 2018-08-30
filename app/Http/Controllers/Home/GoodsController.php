<?php

namespace App\Http\Controllers\Home;

use App\Models\Good;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class GoodsController extends Controller
{

    //商品信息显示页面，
    function index(Request $request,$id)
    {

        $good = Good::find($id);

        $category_id = $good->category_id;

        //查找类别信息，传递类别
        $category = Categories::find($category_id);


        return view ('Home.goods.index',['good'=>$good,'category'=>$category]);
    }

    //商品详情页
    function info(Request $request,$id)
    {
        $good = Good::find($id);

        return view('Home.goods.info',['good'=>$good]);
    }


    function cartsAdd(Request $request,$id)
    {
        $data = $request->all();

        dd($data);
        return view('Home.carts.index');
    }
}
