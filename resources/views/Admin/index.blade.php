@extends('Admin.layout.index')
@section('mulu')

    <li class="breadcrumb-item"><a href="">首页</a> <i class="fa fa-angle-right"></i></li>
@endsection

@section('content')
    <div>
    <!--首页四的大图-->
    <div class="four-grids">
        <div class="col-md-3 four-grid">
            <div class="four-agileits">
                <div class="icon">
                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>用户总数</h3>
                    <h4> 24,420  </h4>

                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-agileinfo">
                <div class="icon">
                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>产品种类</h3>
                    <h4>15,520</h4>

                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-w3ls">
                <div class="icon">
                    <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>订单总数</h3>
                    <h4>12,430</h4>

                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-wthree">
                <div class="icon">
                    <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>新增订单</h3>
                    <h4>14,430</h4>

                </div>

            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    <!--首页四的大图结束-->

    {{--动态显示--}}
    <div class="agileinfo-grap">
        <div class="agileits-box">
            <header class="agileits-box-header clearfix">
                <h3>形势图</h3>
                <div class="toolbar">
                    <div class="pull-left">
                        <div class="btn-group">
                            <a href="#" class="btn btn-default btn-xs">Daily</a>
                            <a href="#" class="btn btn-default btn-xs active">Monthly</a>
                            <a href="#" class="btn btn-default btn-xs">Yearly</a>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a aria-expanded="false" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Export <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Export as PDF</a></li>
                                <li><a href="#">Export as CSV</a></li>
                                <li><a href="#">Export as PNG</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-cog"></i></a>
                    </div>
                </div>
            </header>
            <div class="agileits-box-body clearfix">
                <div id="hero-area"></div>
            </div>
        </div>
    </div>
    <script>
            $(document).ready(function() {
                //BOX BUTTON SHOW AND CLOSE
                jQuery('.small-graph-box').hover(function() {
                    jQuery(this).find('.box-button').fadeIn('fast');
                }, function() {
                    jQuery(this).find('.box-button').fadeOut('fast');
                });
                jQuery('.small-graph-box .box-close').click(function() {
                    jQuery(this).closest('.small-graph-box').fadeOut(200);
                    return false;
                });

                //CHARTS
                function gd(year, day, month) {
                    return new Date(year, month - 1, day).getTime();
                }

                graphArea2 = Morris.Area({
                    element: 'hero-area',
                    padding: 10,
                    behaveLikeLine: true,
                    gridEnabled: false,
                    gridLineColor: '#dddddd',
                    axes: true,
                    resize: true,
                    smooth:true,
                    pointSize: 0,
                    lineWidth: 0,
                    fillOpacity:0.85,
                    data: [
                        {period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
                        {period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                        {period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                        {period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                        {period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                        {period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                        {period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                        {period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                        {period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
                        {period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
                    ],
                    lineColors:['#ff4a43','#a2d200','#22beef'],
                    xkey: 'period',
                    redraw: true,
                    ykeys: ['iphone', 'ipad', 'itouch'],
                    labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
                    pointSize: 2,
                    hideHover: 'auto',
                    resize: true
                });


            });
        </script>

        {{--动态显示结束--}}

    {{--成交订单排行--}}
    <div class="col-sm-4 wthree-crd">
        <div class="card">
            <div class="card-body">
                <div class="widget widget-report-table">
                    <header class="widget-header m-b-15">
                    </header>

                    <div class="row m-0 md-bg-grey-100 p-l-20 p-r-20">
                        <div class="col-md-6 col-sm-6 col-xs-6 w3layouts-aug">
                            <h3>2018.08</h3>
                            <p>订单金额排行</p>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 ">
                            <h3 class="text-right c-teal f-300 m-t-20">总额:$21,235</h3>
                        </div>
                    </div>

                    <div class="widget-body p-15">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>2356</td>
                                <td>dummy text </td>
                                <td>6,200.00</td>
                            </tr>
                            <tr>
                                <td>4589</td>
                                <td>Lorem Ipsum</td>
                                <td>6,500.00</td>
                            </tr>

                            <tr>
                                <td>3269</td>
                                <td>specimen book</td>
                                <td>6,800.00</td>
                            </tr>
                            <tr>
                                <td>5126</td>
                                <td>Letraset sheets</td>
                                <td>7,200.00</td>
                            </tr>
                            <tr>
                                <td>7425</td>
                                <td>PageMaker</td>
                                <td>5,900.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--成交订单排行结束--}}

    {{--分公司订单排行--}}
    <div class="col-sm-4 w3-agileits-crd">

        <div class="card card-contact-list">
            <div class="agileinfo-cdr">
                <div class="card-header">
                    <h3>分公司订单排行</h3>
                </div>
                <div class="card-body p-b-20">
                    <div class="list-group">
                        <a class="list-group-item media" href="">
                            <div class="pull-left">
                                <img class="lg-item-img" src="/adminTemplate/images/in1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="pull-left">
                                    <div class="lg-item-heading">一部</div>
                                    <small class="lg-item-text">成交金额:10000</small>

                                </div>
                                <div class="pull-right">
                                    <div class="lg-item-heading">订单数:100</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item media" href="">
                            <div class="pull-left">
                                <img class="lg-item-img" src="/adminTemplate/images/in2.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="pull-left">
                                    <div class="lg-item-heading">二部</div>
                                    <small class="lg-item-text">成交金额:10000</small>
                                </div>
                                <div class="pull-right">
                                    <div class="lg-item-heading">订单数:100</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item media" href="">
                            <div class="pull-left">
                                <img class="lg-item-img" src="/adminTemplate/images/in3.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="pull-left">
                                    <div class="lg-item-heading">三部</div>
                                    <small class="lg-item-text">成交金额:10000</small>
                                </div>
                                <div class="pull-right">
                                    <div class="lg-item-heading">订单数:100</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item media" href="">
                            <div class="pull-left">
                                <img class="lg-item-img" src="/adminTemplate/images/in4.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="pull-left">
                                    <div class="lg-item-heading">四部</div>
                                    <small class="lg-item-text">成交金额:10000</small>
                                </div>
                                <div class="pull-right">
                                    <div class="lg-item-heading">订单数:100</div>
                                </div>
                            </div>
                        </a>


                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--分公司订单排行结束--}}

    {{--最新订单--}}
    <div class="col-sm-4 w3-agile-crd">
            <div class="card">
                <div class="card-body card-padding">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">最新订单</h4>
                        </header>
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <div class="streamline">
                                <div class="sl-item sl-primary">
                                    <div class="sl-content">
                                        <small class="text-muted">5 mins ago</small>
                                        <p>市场一部:小红客户成交订单</p>
                                    </div>
                                </div>
                                <div class="sl-item sl-danger">
                                    <div class="sl-content">
                                        <small class="text-muted">25 mins ago</small>
                                        <p>市场一部:小红客户成交订单</p>
                                    </div>
                                </div>
                                <div class="sl-item sl-success">
                                    <div class="sl-content">
                                        <small class="text-muted">40 mins ago</small>
                                        <p>市场一部:小红客户成交订单</p>
                                    </div>
                                </div>
                                <div class="sl-item">
                                    <div class="sl-content">
                                        <small class="text-muted">45 minutes ago</small>
                                        <p>市场一部:小红客户成交订单</p>
                                    </div>
                                </div>
                                <div class="sl-item sl-warning">
                                    <div class="sl-content">
                                        <small class="text-muted">55 mins ago</small>
                                        <p>市场一部:小红客户成交订单</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    {{--最新订单排行--}}

    </div>
@endsection