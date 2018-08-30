<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Good;
use App\Models\GoodModel;
use App\Models\GoodGuige;
use App\Models\GoodColor;
use App\Models\Lunbo;
use \DB;


class IndexController extends Controller
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


    function index()
    {
        $lunbos = Lunbo::all();

        $data = self::getPidLeaders();

        $goods = Good::all();

        return view ('Home.index',['data'=>$data,'lunbos'=>$lunbos,'goods'=>$goods]);
    }

    function layoutindex()
    {

        $data = self::getPidLeaders();

        return view ('Home.layout.index',['goods'=>$data]);

    }

}
