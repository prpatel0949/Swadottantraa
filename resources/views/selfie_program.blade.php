@extends('layouts.default')

@section('title', 'Selfie Program')

@section('content')

<div class="header-space" >
    <div class="container">
        <section class="section">
            <div class="page-title">Personal Habits Stress Indicators Questionnaire</div>
            <form action="{{ route('selfie.result') }}" class="section-content" method="POST">
                @csrf
                <div class="card shadow mb-5">
                    <div class="card-body">
                        <div class="card-question"><span class="q_no">1.</span> I spend MAXIMUM three hours a week working on a hobby of mine.</div>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="card-options">
                            <label class="card-option form-control">
                                <input name="question1" type="radio" value="5" required> <span>Almost Always</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question1" type="radio" value="4" required> <span>Most of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question1" type="radio" value="3" required> <span>Some of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question1" type="radio" value="2" required> <span>Almost never</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question1" type="radio" value="1" required> <span>Never</span>
                                <i class="fa fa-check"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-5">
                    <div class="card-body">
                        <div class="card-question"><span class="q_no">2.</span> I spend MAXIMUM one hour a week writing personal letters, writing in a diary or reflecting on my life.</div>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="card-options">
                            <label class="card-option form-control">
                                <input name="question2" type="radio" value="5" required> <span>Almost Always</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question2" type="radio" value="4" required> <span>Most of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question2" type="radio" value="3" required> <span>Some of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question2" type="radio" value="2" required> <span>Almost never</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question2" type="radio" value="1" required> <span>Never</span>
                                <i class="fa fa-check"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-5">
                    <div class="card-body">
                        <div class="card-question"><span class="q_no">3.</span> I spend MAXIMUM 30 minutes a week talking casually with my neighbors, friends or collegues.</div>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="card-options">
                            <label class="card-option form-control">
                                <input name="question3" type="radio" value="5" required> <span>Almost Always</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question3" type="radio" value="4" required> <span>Most of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question3" type="radio" value="3" required> <span>Some of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question3" type="radio" value="2" required> <span>Almost never</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question3" type="radio" value="1" required> <span>Never</span>
                                <i class="fa fa-check"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-5">
                    <div class="card-body">
                        <div class="card-question"><span class="q_no">4.</span> I lack time to read or watch the daily news.</div>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="card-options">
                            <label class="card-option form-control">
                                <input name="question4" type="radio" value="5" required> <span>Almost Always</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question4" type="radio" value="4" required> <span>Most of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question4" type="radio" value="3" required> <span>Some of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question4" type="radio" value="2" required> <span>Almost never</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question4" type="radio" value="1" required> <span>Never</span>
                                <i class="fa fa-check"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-5">
                    <div class="card-body">
                        <div class="card-question"><span class="q_no">5.</span> I spend time for entertainment MINIMUM one hour a day.</div>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="card-options">
                            <label class="card-option form-control">
                                <input name="question5" type="radio" value="5" required> <span>Almost Always</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question5" type="radio" value="4" required> <span>Most of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question5" type="radio" value="3" required> <span>Some of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question5" type="radio" value="2" required> <span>Almost never</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question5" type="radio" value="1" required> <span>Never</span>
                                <i class="fa fa-check"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-5">
                    <div class="card-body">
                        <div class="card-question"><span class="q_no">6.</span> I drive a motor vehicle faster than the speed limit for the excitement and challenge of it.</div>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="card-options">
                            <label class="card-option form-control">
                                <input name="question6" type="radio" value="5" required> <span>Almost Always</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question6" type="radio" value="4" required> <span>Most of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question6" type="radio" value="3" required> <span>Some of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question6" type="radio" value="2" required> <span>Almost never</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question6" type="radio" value="1" required> <span>Never</span>
                                <i class="fa fa-check"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-5">
                    <div class="card-body">
                        <div class="card-question"><span class="q_no">7.</span> I spend MAXIMUM 30 minutes a day working toward a life goal or ambition of mine.</div>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="card-options">
                            <label class="card-option form-control">
                                <input name="question7" type="radio" value="5" required> <span>Almost Always</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question7" type="radio" value="4" required> <span>Most of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question7" type="radio" value="3" required> <span>Some of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question7" type="radio" value="2" required> <span>Almost never</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question7" type="radio" value="1" required> <span>Never</span>
                                <i class="fa fa-check"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-5">
                    <div class="card-body">
                        <div class="card-question"><span class="q_no">8.</span> My day-to-day living is not really affected by my religious beliefs or my philosophy of life.</div>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="card-options">
                            <label class="card-option form-control">
                                <input name="question8" type="radio" value="5" required> <span>Almost Always</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question8" type="radio" value="4" required> <span>Most of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question8" type="radio" value="3" required> <span>Some of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question8" type="radio" value="2" required> <span>Almost never</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question8" type="radio" value="1" required> <span>Never</span>
                                <i class="fa fa-check"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-5">
                    <div class="card-body">
                        <div class="card-question"><span class="q_no">9.</span> When I feel stressed, it is difficult for me to plan time and activities to constructively release my stress.</div>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="card-options">
                            <label class="card-option form-control">
                                <input name="question9" type="radio" value="5" required> <span>Almost Always</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question9" type="radio" value="4" required> <span>Most of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question9" type="radio" value="3" required> <span>Some of the time</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question9" type="radio" value="2" required> <span>Almost never</span>
                                <i class="fa fa-check"></i>
                            </label>
                            <label class="card-option form-control">
                                <input name="question9" type="radio" value="1" required> <span>Never</span>
                                <i class="fa fa-check"></i>
                            </label>
                        </div>
                    </div>
                </div>

                

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Check</button>
                </div>
            </form>
        </section>
    </div>
</div>

@endsection