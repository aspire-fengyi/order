<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use \DB;

class CategoriesController extends Controller
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

    //返回创建产品类别视图
    function create()
    {
        //返回视图，加上产品类别的遍历
        return view('Admin.categories.create', ['categories_data' => self::get_categories_data()]);
    }

    //产品类别添加处理路由
    function add(Request $request)
    {
        //实例化模型
        $category_add = new Categories();

        $pid = $request->input('pid', 0);

        if ($pid == 0) {
            //顶级分类
            $path = 0;
        } else {
            //子分类
            $parent_data = Categories::find($pid);
            $path = $parent_data['path'] . ',' . $parent_data['id'];
        }

        $category_add->category_name = $request->input('category_name');
        $category_add->pid = $pid;
        $category_add->path = $path;

        if ($category_add->save()) {
            return redirect('admin/categories/index')->with('success', '添加成功');
        } else {
            return back()->with('error', '添加失败');
        }


    }


    //显示产品类别详情页面
    function index()
    {
        return view('Admin.categories.index', ['categories_data' => self::get_categories_data()]);
    }

    //产品类别修改路由
    function edit(Request $request, $id)
    {
        $category_data = Categories::find($id);

        return view('Admin.categories.edit', ['category_data' => $category_data]);
    }

    //产品类别修改处理路由
    function update(Request $request, $id)
    {
        $data = $request->all();

        $category_update = Categories::find($id);

        $category_update->category_name = $data['category_name'];

        $res = $category_update->save();

        if ($res) {
            return redirect('/admin/categories/index')->with('success', '修改成功');

        } else {
            return back()->with('error', '修改失败');
        }
    }

    //产品类别删除路由
    function delete(Request $request, $id)
    {

        echo '稍后才会有修改项';

    }

}
























