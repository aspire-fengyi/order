@extends('Home.layouts.index')

@section('content')



    <!-----------------内容------------------>
    <div class="wt1080 middle">
        <div class="fl">
            <div style="padding: 0 24px;"><h1>用户名称</h1></div>
            <ul>
                <li class="current"><a href="/home/orders/index/">我的订单</a></li>

                <li><a href="/home/carts/index/">我的购物车</a></li>
                <li><a href="/home/paidan/index/">我的派单</a></li>
            </ul>
        </div>
        <div class="fr">
            <div class="c_r_t">
                <ul>
                    <li class="current"><a href="#">所有派单</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <!----------------公告---------------->
            <!----------------搜索---------------->
            @if (session('success'))
                <div class="alert alert-success"style="color: green;font-size: 18px;margin-top: 10px" >
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" style="color: red;font-size: 18px;margin-top: 10px">
                    {{ session('error') }}
                </div>
            @endif



        <!---------------订单列表----------------->
            <div class="c_r_o">
                <!------------表单------------->
                @foreach($paidans as $paidan)

                    <div style="background-color: #ebebeb">
                    <div class="ttt" style="margin-left: 20px;">
                        <span style="font-size: 13px;">派单id：{{$paidan->id}}</span>
                    </div>
                        <div class="ttt" style="margin-left: 20px;">
                            <span style="font-size: 13px">派单时间：{{$paidan->created_at}}</span>
                        </div>
                    <table>
                        <tr>
                            <th style="width: 200px;">订单联系人</th>

                            <th style="width: 90px;">联系人电话）</th>
                            <th style="width: 90px;">派单详情</th>
                        </tr>



                            <tr>
                                <td>
                                    <div class="ff_one">
                                        {{$paidan->name}}

                                    </div>
                                </td>

                                <td>
                                    <div class="ff_two">
                                        {{$paidan->phone}}

                                    </div>
                                </td>
                                <td>
                                    <div class="ff_three">
                                        {{$paidan->info}}
                                    </div>
                                </td>


                            </tr>


                        <tr>
                            <th style="float: left;text-align: left;margin-left: 20px;">派单状态:
                                @if($paidan->status == 0)
                                    <span style="color: red">未接单</span>
                                @elseif($paidan->status == 1)
                                    <span style="color: green">已接单</span>
                                @endif
                            </th>
                        </tr>
                        @if($paidan->status == 0)
                        <tr>
                            <th style="float: left;text-align: left;margin-left: 20px;">
                                操作:
                                @if($paidan->status==0)

                                    <a href="<?php echo route('home.jiedan',['id'=>$paidan->id]);?>" style="color: green"><button type="button" style="margin-left: 15px;color: green; height: 25px">接单</button></a>

                                @endif

                            </th>

                        </tr>
                        @endif


                    </table>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>


                @endforeach

            </div>
            <!------------------热销推荐--------------------->
        </div>
        <div class="clear"></div>

    </div>










@endsection