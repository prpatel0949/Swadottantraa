@extends('layouts.default')

@section('title', 'Question')

@section('content')

<div class="header-space" >
    <div class="container">
        <section class="section">
            <div class="page-title">Questions Page Title</div>
            <form  class="section-content">
                <div class="question-div">
                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <div class="card-question"><span class="q_no">1.</span> How is life going?</div>
                            <div class="dropdown-divider mt-3 mb-3"></div>
                            <div class="card-options">
                                <label class="card-option form-control">
                                    <input name="question_1" type="radio" value="1"> <span>Everything is fine</span>
                                    <i class="fa fa-check"></i>
                                </label>
                                <label class="card-option form-control">
                                    <input name="question_1" type="radio" value="2"> <span>Not that well</span>
                                    <i class="fa fa-check"></i>
                                </label>
                                <label class="card-option form-control">
                                    <input name="question_1" type="radio" value="3"> <span>Things are messed-up</span>
                                    <i class="fa fa-check"></i>
                                </label>
                            </div>
                            <span class="text-danger error"></span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary submit-answer" data-question="1">Next</button>
                </div>
            </form>
        </section>
    </div>
</div>

@endsection

@section('js')
    <script>
        $(document).on('click', '.submit-answer', function(e) {
            e.preventDefault();
            let question = $(this).attr('data-question');
            let val = $("input[name='question_"+ question +"']:checked").val();
            if (val) {
                $.ajax({
                    url: '{{ route("question.next") }}',
                    method: 'POST',
                    data: { '_token': '{{ csrf_token() }}', 'current_question': question, 'answer': val },
                    success: function (res) {
                        if (parseInt(question) == 3) {
                            window.location.href = '{{ route("register") }}';
                        }
                        $('.submit-answer').attr('data-question', parseInt(question) + 1);
                        $('.question-div').html(res)
                    }
                });
            } else {
                $('.error').html('Answer is required.');
            }
        });
    </script>
@endsection