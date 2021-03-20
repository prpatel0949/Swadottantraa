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
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">{{ $users->where('type', 0)->count() }}</h2>
                                    <p>Individual Users</p>
                                </div>
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-server text-success font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">{{ $users->where('type', 2)->count() }}</h2>
                                    <p>Franchisee Units</p>
                                </div>
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-server text-success font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">{{ $users->where('type', 1)->count() }}</h2>
                                    <p>Institute Units</p>
                                </div>
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-server text-success font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">₹ {{ number_format($all_programs->pluck('userPrograms')->flatten()->where('type', 0)->sum('amount'), 2, '.', '') }}</h2>
                                    <p>Individual Program Sales</p>
                                </div>
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-server text-success font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">₹ {{ number_format($all_programs->pluck('userPrograms')->flatten()->where('type', 1)->sum('amount'), 2, '.', '') }}</h2>
                                    <p>Franchisee Unit Sales</p>
                                </div>
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-server text-success font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">{{ $users->pluck('clients')->flatten()->where('is_approve', 1)->count() }}</h2>
                                    <p>Institute Total Members</p>
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
                    <div class="col-lg-6 col-sm-12">
                        <div class="card text-white text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="card-title">Pending Consultation</h2>
                                    <h4 class="card-text" style="color: #2C2C2C"><a href="{{ route('admin.user.answer') }}" target="_blank">{{ $pending_evolutions->count() }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card text-white text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="card-title">Active Porgrams</h2>
                                    <h4 class="card-text" style="color: #2C2C2C"><a href="{{ route('program.index') }}" target="_blank">{{ $all_programs->where('is_active', 1)->count() }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Yearly Sales [BMG programs]</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="line-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">BMG Program Yearly Sales</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Program</th>
                                                    <th>Program Sold (Units)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($programs as $key => $program)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $program->title }}</td>
                                                        <td>{{ $program->cnt }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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