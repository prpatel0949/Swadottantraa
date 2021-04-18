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
                        
                        @foreach ($questions as $key => $question)
                            <div class="card-question"><span class="q_no">{{ $key + 1 }}.</span> {{ $question->question }}</div>
                            <div class="dropdown-divider mt-3 mb-3"></div>
                            <div class="card-options">
                                @foreach ($question->options as $option)
                                <label class="card-option form-control">
                                    <input name="question{{ $key + 1 }}" type="radio" value="{{ $option->value }}" required> <span>{{ $option->option }}</span>
                                    <i class="fa fa-check"></i>
                                </label>
                                @endforeach
                            </div>
                        @endforeach
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