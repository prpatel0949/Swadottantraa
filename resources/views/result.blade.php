@extends('layouts.default')

@section('title', 'Result')

@section('content')

<div class="header-space" >
    <div class="container">
        <section class="section">
            <div class="page-title">Result</div>
            <div class="section-content">
                <div class="section-subtitle mb-4">Your Stress Level Is</div>
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="h120 d-flex align-items-center justify-content-center">
                                     <div class="result_number">
                                        @if ($total >= 9 && $total <= 14)
                                            Very Low
                                        @elseif ($total >= 15 && $total <= 19)
                                            Medium
                                        @elseif ($total >= 20 && $total <= 24)
                                            High
                                        @elseif ($total >= 25 && $total <= 30)
                                            Very High
                                        @elseif ($total > 30)
                                            Danger
                                        @endif
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-subtitle mt-5 mb-4">Interpretation of your score card</div>
                <div class="row justify-content-center">
                    <div class="col-sm-7">
                        <div class="card shadow">
                            <div class="card-body">
                                <p class="mb-0">
                                    If you showed "very high" or "danger" levels of stress, this is one of problem areas of life, you should focus on when you develop your Personal Stress Management Plan.					
                                </p><p> To know about stress indicators of other life areas, please visit our Brain and Mind Gym Programs					</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>

@endsection