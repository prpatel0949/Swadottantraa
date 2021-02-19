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
                                                <tr>
                                                    <td>1</td>
                                                    <td>Jhon Doe</td>
                                                    <td>jhondoe@gmail.com</td>
                                                    <td>9874562102</td>
                                                    <td>90</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Smit</td>
                                                    <td>smit@gmail.com</td>
                                                    <td>9852364170</td>
                                                    <td>88</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Charles Martin</td>
                                                    <td>martin@gmail.com</td>
                                                    <td>7896541230</td>
                                                    <td>83</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Leslie Armstrong</td>
                                                    <td>LeslieBArmstrong@teleworm.us</td>
                                                    <td>785-830-3970</td>
                                                    <td>76</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Marion J. Gagnon</td>
                                                    <td>MarionJGagnon@armyspy.com</td>
                                                    <td>916-468-0717</td>
                                                    <td>71</td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Rita J. Gerardi</td>
                                                    <td>RitaJGerardi@armyspy.com</td>
                                                    <td>708-322-0215</td>
                                                    <td>67</td>
                                                </tr>
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