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
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card text-white bg-gradient-primary text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="card-title text-white">Purchase Amount</h2>
                                    <h4 class="card-text"><a href="#" class="text-white" target="_blank">₹ {{ number_format($transactions->sum('amount'), 2, '.', '') }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card text-white bg-gradient-info text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="card-title text-white">Total Users</h2>
                                    <h4 class="card-text"><a href="#" class="text-white" target="_blank">{{ $users->count() }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card text-white bg-gradient-danger text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    @php
                                        $active = Carbon\Carbon::now()->subDays(15)->format('Y-m-d H:i:s');
                                        $Inactive = Carbon\Carbon::now()->subDays(90)->format('Y-m-d H:i:s');
                                    @endphp
                                    <h2 class="card-title text-white">Active User</h2>
                                    <h4 class="card-text"><a href="#" class="text-white" target="_blank">{{ $users->where('last_login', '>', $active)->count() }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card text-white bg-gradient-success text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="card-title text-white">InActive User</h2>
                                    <h4 class="card-text"><a href="{{ route('report.program') }}" class="text-white" target="_blank">{{ $users->where('last_login', '<', $Inactive)->count() }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Yearly Sales</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="line-chart"></div>
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
<script src="{{ asset('assets/dashboard/vendors/js/charts/apexcharts.min.js') }}"></script>
<script>
    var e = "#7367F0", t = [e, "#28C76F", "#EA5455", "#FF9F43", "#00cfe8"], a=!1;
    var r = {
        chart: {
            height: 350,
            type: "line",
            zoom: {
                enabled: !1
            }
        },
        colors: t,
        dataLabels: {
            enabled: !1
        },
        stroke: {
            curve: "straight"
        },
        series: [{
            name: "Sales",
            data: {!! json_encode($monthly_transactions) !!}
        }],
        title: {
            text: "Program Sales by Month",
            align: "left"
        },
        grid: {
            row: {
                colors: ["#f3f3f3", "transparent"],
                opacity: .5
            }
        },
        xaxis: {
            categories: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar"]
        },
        yaxis: {
            tickAmount: 5,
            opposite: a
        }
    };
    new ApexCharts(document.querySelector("#line-chart"), r).render();
</script>

@endsection
