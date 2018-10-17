@extends('Home.layouts.index')

<style type="text/css">
    #pull_right{
        text-align:center;
    }
    .pull-right {
        /*float: left!important;*/
    }
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
    }
    .pagination > li {
        display: inline;
    }
    .pagination > li > a,
    .pagination > li > span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #428bca;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    .pagination > li:first-child > a,
    .pagination > li:first-child > span {
        margin-left: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .pagination > li:last-child > a,
    .pagination > li:last-child > span {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .pagination > li > a:hover,
    .pagination > li > span:hover,
    .pagination > li > a:focus,
    .pagination > li > span:focus {
        color: #2a6496;
        background-color: #eee;
        border-color: #ddd;
    }
    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
        z-index: 2;
        color: #fff;
        cursor: default;
        background-color: #428bca;
        border-color: #428bca;
    }
    .pagination > .disabled > span,
    .pagination > .disabled > span:hover,
    .pagination > .disabled > span:focus,
    .pagination > .disabled > a,
    .pagination > .disabled > a:hover,
    .pagination > .disabled > a:focus {
        color: #777;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #ddd;
    }
    .clear{
        clear: both;
    }
</style>
<!----------------轮播图-------------------->

@if(isset($lunbos))
    @section('lunbo')
        <div class="index_banner minWidth" id="focus">
            <ul>
                @foreach($lunbos as $lunbo)

                    @if($lunbo->status ==1)
                        <li style="background:url({{$lunbo->image_path}}) no-repeat center;height: 452px;"><a href="#" title="" target="_blank"></a>
                        </li>
                    @endif

                @endforeach

            </ul>
        </div>
    @endsection
@endif
<div class="clear"></div>


{{--<!--------------商品开始---------------->--}}

@section('content')
    <link href="/homeTemplate/css/index.css" type="text/css" rel="stylesheet"/>

    <link href="/homeTemplate/css/liebiao.css" type="text/css" rel="stylesheet"/>

    <div class="content">

        <div class="place">
            @if(!empty($weizhi))
            位置：<a class="check" href="#">{{$weizhi}}</a>共<span class="number">{{$n}}</span>件热卖商品
            @endif

            @if(!empty($sousuo))
                    @if($n == 0)
                        共找到<span class="number">{{$n}}</span>件和<span class="number">"{{$sousuo}}"</span>有关的产品,请输入其他关键字
                        @else
                        共找到<span class="number">{{$n}}</span>件和<span class="number">"{{$sousuo}}"</span>有关的产品

                    @endif
            @endif

        </div>
        <!----------------产品详细------------------->
        <div class="product">
            <ul>

                @foreach($goods as $good)
                    <li>
                        <div class="pic">
                            <p style="color: #00aced">{{$good->good_name}}</p>
                            <a href="<?php echo route('home.goods.index', ['id' => $good->id]);?>">
                                <img style="width: 230px;height: 220px" src="{{$good->goodModel->image_path}}"></a>
                        </div>
                        <div style="height: 1px">

                        </div>
                        <p class="one" ><a  style="height: 15x" href="<?php echo route('home.goods.index', ['id' => $good->id]);?>">{{$good->goodModel->desc}} </a></p>
                        @foreach($good->goodGuiges as $k=>$goodGuige )
                            @if($k==0)

                                @if(session('homeUser')['jibie']==1)

                                    <p class="two"><span style="color: #fe5500">￥<span class="real">{{$goodGuige->daili_price}}</span></span><span class="wrong">{{$goodGuige->shichang_price}}</span></p>
                                @elseif(session('homeUser')['jibie']==0)

                                    <p class="two"><span style="color: #fe5500">￥<span class="real">{{$goodGuige->hezuo_price}}</span></span><span class="wrong">{{$goodGuige->shichang_price}}</span></p>

                                @else

                                    <p class="two"><span style="color: #fe5500">￥<span class="real">{{$goodGuige->shichang_price}}</span></span><span class="wrong">{{$goodGuige->shichang_price}}</span></p>

                                @endif

                            @endif()
                        @endforeach

                    </li>
                @endforeach

            </ul>
            <div class="clear"></div>
        </div>

        <div id="pull_right">
            <div class="pull-right">
                {{ $goods->appends(['sort' => 'votes'])->links() }}

            </div>
        </div>


    </div>

@endsection

