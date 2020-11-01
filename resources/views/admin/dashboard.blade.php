@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="dashboard-ecommerce">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card text-white bg-gradient-primary text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="card-title text-white">Users</h2>
                                    <h4 class="card-text">{{ $users->where('type', 0)->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card text-white bg-gradient-info text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="card-title text-white">Franchisee</h2>
                                    <h4 class="card-text">{{ $users->where('type', 2)->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card text-white bg-gradient-success text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="card-title text-white">Purchase Amount</h2>
                                    <h4 class="card-text">₹ {{ number_format($transactions->sum('amount'), 2, '.', '') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card text-white bg-gradient-danger text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="card-title text-white">Institues</h2>
                                    <h4 class="card-text">{{ $users->where('type', 1)->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Monthly Sales</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body pl-0">
                                    <div class="height-300">
                                        <canvas id="bar-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('assets/dashboard/vendors/js/charts/chart.min.js') }}"></script>
    <script>
        var $primary = '#7367F0';
        var grid_line_color = '#dae1e7';
        var themeColors = [$primary, $primary, $primary, $primary, $primary, $primary, $primary, $primary, $primary, $primary, $primary, $primary ];
        var barChartctx = $("#bar-chart");
        var barchartOptions = {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderSkipped: 'left'
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                responsiveAnimationDuration: 500,
                legend: { display: false },
                scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: grid_line_color,
                    },
                    scaleLabel: {
                        display: true,
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: grid_line_color,
                    },
                    scaleLabel: {
                        display: true,
                    },
                    ticks: {
                        stepSize: 1000
                    },
                }],
            },
            title: {
                display: true,
                text: 'Total Programs sales monthly'
            },
        };
        var barchartData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Programs sales",
                    data: {!! json_encode($monthly_transactions) !!},
                    backgroundColor: themeColors,
                    borderColor: "transparent"
                }]
            };
        var barChartconfig = {
                type: 'bar',
                // Chart Options
                options: barchartOptions,
                data: barchartData
            };
        var barChart = new Chart(barChartctx, barChartconfig);
    </script>
@endsection