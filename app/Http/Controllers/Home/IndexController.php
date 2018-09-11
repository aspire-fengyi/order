<?php

namespace App\Http\Controllers\Home;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Good;
use App\Models\GoodModel;
use App\Models\GoodGuige;
use App\Models\GoodColor;
use App\Models\Lunbo;
use App\Models\User;
use \DB;
use \Hash;


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


    //显示首页,路由参数为空,此id是显示当前位置id
    function index(Request $request, $id = '')
    {
        $sousuo = $request->input('search');

        if(isset($sousuo)){

            $data = self::getPidLeaders();

            //获取该搜索下的产品
            $goods = Good::where('good_name','like','%'. $sousuo.'%'  && 'status','!=',0)->paginate(12);

            //获取该搜索下的数量
            $n = Good::where('good_name','like','%'. $sousuo.'%'  && 'status','!=',0)->count();

            //返回位置及数量
            return view ('Home.index',['data'=>$data,'goods'=>$goods,'sousuo'=>$sousuo,'n'=>$n]);

        }

        $lunbos = Lunbo::all();

        $data = self::getPidLeaders();

        //如果没有传递位置id
        if (!$id) {
            //直接获取商品,分页功能
            $goods = Good::where(  'status','!=',0)->paginate(12);

            return view ('Home.index',['data'=>$data,'lunbos'=>$lunbos,'goods'=>$goods]);

        } else {

            //非顶级分类
            $feidingjifenlei = Categories::find($id);

            if ($feidingjifenlei) {

                //获取分类下的产品
                $goods = Good::where('category_id', $id  && 'status','!=',0)->paginate(12);

                //找到当前位置
                $weizhi = $feidingjifenlei->category_name;

                //找到此分类下面有多少商品
                $n = DB::table('goods')->where('category_id',$id && 'status','!=',0)->count();

                //返回位置及数量
                return view ('Home.index',['data'=>$data,'goods'=>$goods,'weizhi'=>$weizhi,'n'=>$n]);

            }

        }

    }









    //退出首页路由
    function layoutindex()
    {

        $data = self::getPidLeaders();

        return view ('Home.layout.index',['goods'=>$data]);

    }

    //修改密码显示页面
    function rePassword(Request $request,$id)
    {
        $user = User::find($id);
        return view('Home.user.repassword',['user'=>$user]);

    }

    //修改密码处理页面
    function passwordUpdate(Request $request,$id)
    {
        //验证码判断
        $this->validate($request, [
            'password' => 'required |regex:/[\w]{6,}/',
            'repassword' => 'required|same:password',
            'yanzhengma' => 'required|captcha',
        ], [
            'password.required'  => '密码必须填写',
            'password.regex'  => '密码格式不正确',
            'repassword.required'  => '确认密码必须填写',
            'repassword.same'  => '两次密码不一致',
            'yanzhengma.required' => trans('验证码必须填写'),
            'yanzhengma.captcha' => trans('验证码不正确'),
        ]);

        //接收所有数据
        $data = $request->all();

        //接收的原密码
        $oldPassword = $data['oldPassword'];

        $userPassword = session('homeUser')['password'];

        $res = Hash::check($oldPassword,$userPassword);


        if(!$res)
        {
            return back()->with('error','原密码输入不正确');
        }

        $user = User::find($id);

        $user->password =Hash::make($data['password']);

        $user->save();
        session()->flush();
        session(['homeFlag'=>false]);

        return redirect('home/login');

    }

}
