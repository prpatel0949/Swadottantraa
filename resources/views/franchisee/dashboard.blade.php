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
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">₹ {{ number_format($transactions->sum('amount'), 2, '.', '') }}</h2>
                                    <p>Purchase Amount</p>
                                </div>
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-server text-success font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">{{ $users->count() }}</h2>
                                    <p>Total Users</p>
                                </div>
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-server text-success font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    @php
                                        $active = Carbon\Carbon::now()->subDays(15)->format('Y-m-d H:i:s');
                                        $Inactive = Carbon\Carbon::now()->subDays(90)->format('Y-m-d H:i:s');
                                    @endphp
                                    <h2 class="text-bold-700 mb-0">{{ $users->where('last_login', '>', $active)->count() }}</h2>
                                    <p>Active User</p>
                                </div>
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-server text-success font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">{{ $users->where('last_login', '<', $Inactive)->count() }}</h2>
                                    <p>InActive User</p>
                                </div>
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-server text-success font-medium-5"></i>
                                    </div>
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