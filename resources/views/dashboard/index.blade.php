@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    <!-- .row -->
    <div class="row">
        <div class="col-md-12">
        <div class="white-box">
                <div class="row row-in">
                
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <ul class="col-in">
                            <li>
                                <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                            </li>
                            <li class="col-last">
                                <h3 class="counter text-right m-t-15">23</h3>
                            </li>
                            <li class="col-middle">
                                <h4>New projects</h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                        <ul class="col-in">
                            <li>
                                <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                            </li>
                            <li class="col-last">
                                <h3 class="counter text-right m-t-15">76</h3>
                            </li>
                            <li class="col-middle">
                                <h4>Total Earnings</h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <ul class="col-in">
                            <li>
                                <span class="circle circle-md bg-success"><i class=" ti-shopping-cart"></i></span>
                            </li>
                            <li class="col-last">
                                <h3 class="counter text-right m-t-15">93</h3>
                            </li>
                            <li class="col-middle">
                                <h4>Total Projects</h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6  b-0">
                        <ul class="col-in">
                            <li>
                                <span class="circle circle-md bg-warning"><i class="fa fa-dollar"></i></span>
                            </li>
                            <li class="col-last">
                                <h3 class="counter text-right m-t-15">83</h3>
                            </li>
                            <li class="col-middle">
                                <h4>Net Earnings</h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>

    </div>
    <!-- .row -->


    <!-- ============================================================== -->
    <!-- Extra-component -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Country visit</h3>
                <div id="chartdiv" style="height: 300px"></div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="white-box">
                <h3 class="box-title"><small class="pull-right m-t-10 text-success"><i class="fa fa-sort-asc"></i> 18% High then last month</small> Monthly Site Traffic</h3>
                <div class="stats-row">
                    <div class="stat-item">
                        <h6>Overall Growth</h6> <b>80.40%</b></div>
                    <div class="stat-item">
                        <h6>Montly</h6> <b>15.40%</b></div>
                    <div class="stat-item">
                        <h6>Day</h6> <b>5.50%</b></div>
                </div>
                <div id="sparkline8"></div>
            </div>
            <div class="white-box">
                <h3 class="box-title"><small class="pull-right m-t-10 text-danger"><i class="fa fa-sort-desc"></i> 18% High then last month</small>Weekly Site Traffic</h3>
                <div class="stats-row">
                    <div class="stat-item">
                        <h6>Overall Growth</h6> <b>80.40%</b></div>
                    <div class="stat-item">
                        <h6>Montly</h6> <b>15.40%</b></div>
                    <div class="stat-item">
                        <h6>Day</h6> <b>5.50%</b></div>
                </div>
                <div id="sparkline9"></div>
            </div>
        </div>
    </div>


    <div class="row">



    </div>

    
</div>


<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

<script type="text/javascript">
  // Data retrieved from http://vikjavev.no/ver/index.php?spenn=2d&sluttid=16.06.2015.

$(function () {
Highcharts.chart('chartdiv', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: 'Average Monthly Temperature and Rainfall in Tokyo'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: [{
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        labels: {
            format: '{value}°C',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Temperature',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis
        title: {
            text: 'Rainfall',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '{value} mm',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    series: [{
        name: 'Rainfall',
        type: 'column',
        yAxis: 1,
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
        tooltip: {
            valueSuffix: ' mm'
        }

    }, {
        name: 'Temperature',
        type: 'spline',
        data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
        tooltip: {
            valueSuffix: '°C'
        }
    }]
});
});



</script>

@stop