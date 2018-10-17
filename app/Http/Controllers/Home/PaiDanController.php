<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaiDan;
use App\Models\User;


class PaiDanController extends Controller
{

    function index(Request $request)
    {
        $id = session('homeUser')['id'];

        $user = User::find($id);

        $paidans = $user->paidans;

        return view('Home.paidan.index',['paidans'=>$paidans]);
    }

    //接单路由
    function jiedan(Request $request,$id)
    {
        $order = PaiDan::find($id);

        $order->status = 1;

        $res = $order->save();

        if ($res) {
            return back()->with('success', '已接单');
        }
    }


}
