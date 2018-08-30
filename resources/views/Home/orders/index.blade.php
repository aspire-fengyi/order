@extends('Home.layouts.index')

@section('content')



    <div class="wt1080">
        <!--------------标题----------->
        <div class="my_order">
            <h1>提交订单</h1>
            <div class="place">

            </div>
        </div>

        <!---------------订单信息-------------->
        <div class="order_details">
            <div class="roo">订单信息<span></span></div>
            <div class="tt">
                <table>
                    <tr>
                        <th width="50%">商品</th>
                        <th width="16%">单价</th>
                        <th width="16%">数量</th>
                        <th width="18%">小计</th>
                    </tr>
                    @foreach($user->beforeOrders as $beforeOrder)

                        <tr>
                            <td>
                                <div class="pic"><img src="{{$beforeOrder->cart->good->goodModel->image_path}}"></div>
                                <p class="one"><a href="#">{{$beforeOrder->cart->good->good_name}}--{{$beforeOrder->cart->goodGuige->guige}}</a></p>
                                <p class="two">{{$beforeOrder->cart->goodColor->color}}</p>
                            </td>
                            <td><span class="e">￥{{$beforeOrder->cart->price}} 元/{{$beforeOrder->cart->good->goodModel->price_desc}}</span></td>
                            <td>{{$beforeOrder->cart->number}}</td>
                            <td><span class="u">￥{{$beforeOrder->cart->number * $beforeOrder->cart->price_number * $beforeOrder->cart->price}}</span></td>
                        </tr>

                    @endforeach

                </table>
            </div>
        </div>



        <div class="coupon">
            <div class="kk">
                <table>
                    <tr>
                        <td>共{{$totalNumber}}件商品，商品总金额：</td>
                        <td>{{$totalPrice}}元</td>
                    </tr>
                    <tr>
                        <td>+运费：</td>
                        <td>￥0.00</td>
                    </tr>
                    <tr>
                        <td>+关税：</td>
                        <td>￥0.00</td>
                    </tr>
                </table>
                <p class="money">应付余额：<span>￥<font>{{$totalPrice}}元</font></span></p>
            </div>
            <div class='clear'></div>

            <!-------------收货地址-------------->
            <div class="address">
                <div class="roo">选择收货地址<span></span></div>
                <div class="b_address">
                    <ul>
                        <li class="current">
                            <h1>张新<span>159****3994</span></h1>
                            <p>四川省 成都市 武侯区 大石西路130号还是觉得撒借款单萨科技哈撒艰苦的空间撒开回到家撒快点撒花</p>
                            <p>身份证号码：510524********1905</p>
                            <div class="operate">
                                <a href="#" class="edit">编辑</a>
                                <a href="#" class="del">删除</a>
                            </div>
                            <div class="check"></div>
                        </li>
                        <li>
                            <h1>张新<span>159****3994</span></h1>
                            <p>四川省 成都市 武侯区 大石西路130号还是觉得撒借款单萨科技哈撒艰苦的空间撒开回到家撒快点撒花</p>
                            <p>身份证号码：510524********1905</p>
                            <div class="operate">
                                <a href="#" class="edit">编辑</a>
                                <a href="#" class="del">删除</a>
                            </div>
                            <div class="check"></div>
                        </li>
                        <li>
                            <h1>张新<span>159****3994</span></h1>
                            <p>四川省 成都市 武侯区 大石西路130号还是觉得撒借款单萨科技哈撒艰苦的空间撒开回到家撒快点撒花</p>
                            <p>身份证号码：510524********1905</p>
                            <div class="operate">
                                <a href="#" class="edit">编辑</a>
                                <a href="#" class="del">删除</a>
                            </div>
                            <div class="check"></div>
                        </li>

                    </ul>
                    <div class="add_address"><a href="#">添加地址</a></div>
                    <div class="clear"></div>
                </div>
            </div>

            <!---------------委托下的版本---------------->
            <div class="ll">
                <div class="bb">
                    <h1>个人委托申报协议</h1>
                    <p>本人承诺所购买商品系个人合理自用，现委托商家代理申报，代缴税款等通关事宜，本人保证遵守《海关法》和国家相关法律法规，保证所提供的身份信息和收货信息真是完整，无侵犯他人权益的行为，以上委托关系如实填写，本人愿意接受海关，检查检疫机构及其他监管部门的监管，并承担相应法律责任。</p>
                </div>

                <div class="gg">
                    <p>应付余额：<span>￥<font>{{$totalPrice}}元</font></span></p>
                </div>
                <a href="order_1.html"><input type="submit" value="确认提交订单" ></a>
                <a href="order_1.html"><input type="submit" value="取消订单" ></a>
                <div class="clear"></div>
            </div>
        </div>

    </div>





@endsection