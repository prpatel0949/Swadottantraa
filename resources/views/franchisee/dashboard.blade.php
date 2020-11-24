@extends('franchisee.layouts.app')

@section('title', 'Dashboard')
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    	<div class="content-body">
            <section id="dashboard-ecommerce">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-users text-primary font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1">92.6k</h2>
                                <p class="mb-0">Subscribers Gained</p>
                            </div>
                            <div class="card-content">
                                <div id="line-area-chart-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-credit-card text-success font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1">97.5k</h2>
                                <p class="mb-0">Revenue Generated</p>
                            </div>
                            <div class="card-content">
                                <div id="line-area-chart-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-shopping-cart text-danger font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1">36%</h2>
                                <p class="mb-0">Quarterly Sales</p>
                            </div>
                            <div class="card-content">
                                <div id="line-area-chart-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-package text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1">97.5K</h2>
                                <p class="mb-0">Orders Received</p>
                            </div>
                            <div class="card-content">
                                <div id="line-area-chart-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        	<div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pie Chart</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="padding_square_wrapper">
                                    <div id="pie-chart1" class="padding_square"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pie Chart</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="padding_square_wrapper">
                                    <div id="pie-chart2" class="padding_square"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')

<script>

$(window).on("load", function(){

    var $dark_green = '#4ea397';
    var $green = '#22c3aa';
    var $light_green = '#7bd9a5';
    var $lighten_green = '#a8e7d2';


    // Pie chart
    // ------------------------------

    var pieChart = echarts.init(document.getElementById('pie-chart1'));

    var pieChartoption = {
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'horizontal',
            bottom: 'bottom',
            data: ['Direct interview', 'Email marketing', 'Alliance advertising', 'Video ad', 'Search engine']
        },
        series : [
            {
                name: 'Access source',
                type: 'pie',
                radius : '50%',
                center: ['50%', '50%'],
                color: ['#FF9F43','#28C76F','#EA5455','#87ceeb','#B61B68'],
                data: [
                  {value: 335, name: 'Direct interview'},
                  {value: 310, name: 'Email marketing'},
                  {value: 234, name: 'Alliance advertising'},
                  {value: 135, name: 'Video ad'},
                  {value: 1548, name: 'Search engine'}
                ],
                itemStyle: {
                	fontSize: '10px',
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ],
    };

    pieChart.setOption(pieChartoption);


});

$(window).on("load", function(){

    var $dark_green = '#4ea397';
    var $green = '#22c3aa';
    var $light_green = '#7bd9a5';
    var $lighten_green = '#a8e7d2';


    // Pie chart
    // ------------------------------

    var pieChart = echarts.init(document.getElementById('pie-chart2'));

    var pieChartoption = {
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'horizontal',
            bottom: 'bottom',
            data: ['Direct interview', 'Email marketing', 'Alliance advertising', 'Video ad', 'Search engine']
        },
        series : [
            {
                name: 'Access source',
                type: 'pie',
                radius : '50%',
                center: ['50%', '50%'],
                color: ['#FF9F43','#28C76F','#EA5455','#87ceeb','#B61B68'],
                data: [
                  {value: 335, name: 'Direct interview'},
                  {value: 310, name: 'Email marketing'},
                  {value: 234, name: 'Alliance advertising'},
                  {value: 135, name: 'Video ad'},
                  {value: 148, name: 'Search engine'}
                ],
                itemStyle: {
                    fontSize: '10px',
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ],
    };

    pieChart.setOption(pieChartoption);


});

/*=========================================================================================
    File Name: dashboard-ecommerce.js
    Description: dashboard ecommerce page content with Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(window).on("load", function () {

var $primary = '#B61B68';
var $success = '#28C76F';
var $danger = '#EA5455';
var $warning = '#FF9F43';
var $info = '#00cfe8';
var $primary_light = '#A9A2F6';
var $danger_light = '#f29292';
var $success_light = '#55DD92';
var $warning_light = '#ffc085';
var $info_light = '#1fcadb';
var $strok_color = '#b9c3cd';
var $label_color = '#e7e7e7';
var $white = '#fff';


// Line Area Chart - 1
// ----------------------------------

var gainedlineChartoptions = {
  chart: {
    height: 100,
    type: 'area',
    toolbar: {
      show: false,
    },
    sparkline: {
      enabled: true
    },
    grid: {
      show: false,
      padding: {
        left: 0,
        right: 0
      }
    },
  },
  colors: [$primary],
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',
    width: 2.5
  },
  fill: {
    type: 'gradient',
    gradient: {
      shadeIntensity: 0.9,
      opacityFrom: 0.7,
      opacityTo: 0.5,
      stops: [0, 80, 100]
    }
  },
  series: [{
    name: 'Subscribers',
    data: [28, 40, 36, 52, 38, 60, 55]
  }],

  xaxis: {
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    }
  },
  yaxis: [{
    y: 0,
    offsetX: 0,
    offsetY: 0,
    padding: { left: 0, right: 0 },
  }],
  tooltip: {
    x: { show: false }
  },
}

var gainedlineChart = new ApexCharts(
  document.querySelector("#line-area-chart-1"),
  gainedlineChartoptions
);

gainedlineChart.render();



// Line Area Chart - 2
// ----------------------------------

var revenuelineChartoptions = {
  chart: {
    height: 100,
    type: 'area',
    toolbar: {
      show: false,
    },
    sparkline: {
      enabled: true
    },
    grid: {
      show: false,
      padding: {
        left: 0,
        right: 0
      }
    },
  },
  colors: [$success],
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',
    width: 2.5
  },
  fill: {
    type: 'gradient',
    gradient: {
      shadeIntensity: 0.9,
      opacityFrom: 0.7,
      opacityTo: 0.5,
      stops: [0, 80, 100]
    }
  },
  series: [{
    name: 'Revenue',
    data: [350, 275, 400, 300, 350, 300, 450]
  }],

  xaxis: {
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    }
  },
  yaxis: [{
    y: 0,
    offsetX: 0,
    offsetY: 0,
    padding: { left: 0, right: 0 },
  }],
  tooltip: {
    x: { show: false }
  },
}

var revenuelineChart = new ApexCharts(
  document.querySelector("#line-area-chart-2"),
  revenuelineChartoptions
);

revenuelineChart.render();


// Line Area Chart - 3
// ----------------------------------

var saleslineChartoptions = {
  chart: {
    height: 100,
    type: 'area',
    toolbar: {
      show: false,
    },
    sparkline: {
      enabled: true
    },
    grid: {
      show: false,
      padding: {
        left: 0,
        right: 0
      }
    },
  },
  colors: [$danger],
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',
    width: 2.5
  },
  fill: {
    type: 'gradient',
    gradient: {
      shadeIntensity: 0.9,
      opacityFrom: 0.7,
      opacityTo: 0.5,
      stops: [0, 80, 100]
    }
  },
  series: [{
    name: 'Sales',
    data: [10, 15, 7, 12, 3, 16]
  }],

  xaxis: {
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    }
  },
  yaxis: [{
    y: 0,
    offsetX: 0,
    offsetY: 0,
    padding: { left: 0, right: 0 },
  }],
  tooltip: {
    x: { show: false }
  },
}

var saleslineChart = new ApexCharts(
  document.querySelector("#line-area-chart-3"),
  saleslineChartoptions
);

saleslineChart.render();

// Line Area Chart - 4
// ----------------------------------

var orderlineChartoptions = {
  chart: {
    height: 100,
    type: 'area',
    toolbar: {
      show: false,
    },
    sparkline: {
      enabled: true
    },
    grid: {
      show: false,
      padding: {
        left: 0,
        right: 0
      }
    },
  },
  colors: [$warning],
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',
    width: 2.5
  },
  fill: {
    type: 'gradient',
    gradient: {
      shadeIntensity: 0.9,
      opacityFrom: 0.7,
      opacityTo: 0.5,
      stops: [0, 80, 100]
    }
  },
  series: [{
    name: 'Orders',
    data: [10, 15, 8, 15, 7, 12, 8]
  }],

  xaxis: {
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    }
  },
  yaxis: [{
    y: 0,
    offsetX: 0,
    offsetY: 0,
    padding: { left: 0, right: 0 },
  }],
  tooltip: {
    x: { show: false }
  },
}

var orderlineChart = new ApexCharts(
  document.querySelector("#line-area-chart-4"),
  orderlineChartoptions
);

orderlineChart.render();

});



</script>



@endsection
