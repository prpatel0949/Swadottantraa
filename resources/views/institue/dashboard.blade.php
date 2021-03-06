@extends('institue.layouts.app')

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
                                        <h2 class="card-title text-white">Total Licence</h2>
                                        <h4 class="card-text"><a href="#" class="text-white" target="_blank"> {{ Auth::user()->number_of_users }}<a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="card text-white bg-gradient-info text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h2 class="card-title text-white">Total User</h2>
                                        <h4 class="card-text"><a href="#" class="text-white" target="_blank"> {{ Auth::user()->clients->count() }}<a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="card text-white bg-gradient-success text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h2 class="card-title text-white">Total Pending</h2>
                                        <h4 class="card-text"><a href="#" class="text-white" target="_blank"> {{ Auth::user()->number_of_users - Auth::user()->clients->count() }}<a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="card text-white bg-gradient-danger text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        @php
                                            $active = Carbon\Carbon::now()->subDays(14)->format('Y-m-d H:i:s');
                                        @endphp
                                        <h2 class="card-title text-white">Total Active</h2>
                                        {{-- last_login --}}
                                        <h4 class="card-text"><a href="#" class="text-white" target="_blank"> {{ Auth::user()->clients->where('last_login', '>', $active)->count() }}<a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Leaderboard</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body table-responsive">
                                        <table class="table " style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>Rank</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone No</th>
                                                    <th>Score</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ranks as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->mobile }}</td>
                                                        <td>{{ $item->points }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
@endsection