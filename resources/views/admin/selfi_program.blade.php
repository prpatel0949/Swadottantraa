@extends('admin.layouts.app')

@section('title', 'Add Program')

@section('css')
    <link rel="stylesheet" href="https://bevacqua.github.io/dragula/dist/dragula.css">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row sticky_block">
		    <div class="content-header-left col-sm-9 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">Selfi Program</h2>
		            </div>
		        </div>
            </div>
            <div class="col-sm-3 col-12">
                <div class="form-group float-right">
                    <button type="button" class="btn btn-primary add-stage">Add Question</button>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('selfi_program.update') }}" id="addForm" method="POST" enctype="multipart/form-data">
                @csrf

                @if (isset($questions) && !empty($questions))
                    @foreach ($questions as $key => $question)
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            Question {{ $key + 1 }}
                            <div>
                                <button type="button" name="" class="btn btn-primary add-step" data-index="{{ $key }}">Add Option</button>
                                <button type="button" name="" class="btn btn-primary delete-stage" data-index="{{ $key }}">Delete Question</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $question->question }}" name="question[{{ $key }}]" placeholder="Question {{ $key + 1 }}" required>
                                        <input type="hidden" name="question_id[{{ $key }}]" value="{{ $question->id }}">
                                    </div>
                                </div>
                            </div>
                            @foreach ($question->options as $key1 => $item)
                                <div class="row answer-section">
                                    <div class="col-md-4">
                                        <div class="form-group input-group">
                                            <input type="text" name="option[{{ $key }}][]" value="{{ $item->option }}" class="form-control" placeholder="Option {{ $key1 + 1 }}" required>
                                            <div class="input-group-append">
                                                <input type="number" name="answer_value[{{ $key }}][]" value="{{ $item->value }}" class="value-box" style="width: 60px" required/>
                                                <input type="hidden" name="answer_id[{{ $key }}][]" value="{{ $item->id }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
                                    </div>
                                </div>
                            @endforeach

                            <div class="option-div"></div>

                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            Question 1
                            <div>
                                <button type="button" name="" class="btn btn-primary add-step" data-index="1">Add Option</button>
                                <button type="button" name="" class="btn btn-primary delete-stage" data-index="1">Delete Question</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{-- <label>Question</label> --}}
                                        <input type="text" class="form-control" name="question[0]" placeholder="Question 1" required>
                                        <input type="hidden" name="question_id[0]" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row answer-section">
                                <div class="col-md-4">
                                    <div class="form-group input-group">
                                        <input type="text" name="option[0][]" value="" class="form-control" placeholder="Option 1" required>
                                        <div class="input-group-append">
                                            <input type="number" name="answer_value[0][]"  class="value-box" style="width: 60px" required/>
                                            <input type="hidden" name="answer_id[0][]" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
                                </div>
                            </div>
                            <div class="row answer-section">
                                <div class="col-md-4">
                                    <div class="form-group input-group">
                                        <input type="text" name="option[0][]" value="" class="form-control" placeholder="Option 2" required>
                                        <div class="input-group-append">
                                            <input type="number" name="answer_value[0][]"  class="value-box" style="width: 60px" required/>
                                            <input type="hidden" name="answer_id[0][]" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
                                </div>
                            </div>
                            
                            <div class="option-div"></div>

                        </div>
                    </div>
                @endif


                <div class="question-div"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" name="" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<div id="question-section" style="display: none;">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            Question `SrNo~1`
            <div>
                <button type="button" name="" class="btn btn-primary add-step" data-index="`SrNo~1`">Add Option</button>
                <button type="button" name="" class="btn btn-primary delete-stage" data-index="`SrNo~1`">Delete Question</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {{-- <label>Question</label> --}}
                        <input type="text" class="form-control" name="question[`SrNo`]" placeholder="Question `SrNo~1`" required>
                        <input type="hidden" name="question_id[`SrNo`]" value="">
                    </div>
                </div>
            </div>
            <div class="row answer-section">
                <div class="col-md-4">
                    <div class="form-group input-group">
                        <input type="text" name="option[`SrNo`][]" value="" class="form-control" placeholder="Option 1" required>
                        <div class="input-group-append">
                            <input type="number" name="answer_value[`SrNo`][]"  class="value-box" style="width: 60px" required/>
                            <input type="hidden" name="answer_id[`SrNo`][]" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
                </div>
            </div>
            <div class="row answer-section">
                <div class="col-md-4">
                    <div class="form-group input-group">
                        <input type="text" name="option[`SrNo`][]" value="" class="form-control" placeholder="Option 2" required>
                        <div class="input-group-append">
                            <input type="number" name="answer_value[`SrNo`][]"  class="value-box" style="width: 60px" required/>
                            <input type="hidden" name="answer_id[`SrNo`][]" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
                </div>
            </div>

            <div class="option-div"></div>

        </div>
    </div>
</div>


<div id="option-section" style="display: none">
    <div class="row answer-section">
        <div class="col-md-4">
            <div class="form-group input-group">
                <input type="text" name="option[`question_no`][]" value="" class="form-control" placeholder="Option `opt_cnt`" required>
                <div class="input-group-append">
                    <input type="number" name="answer_value[`question_no`][]"  class="value-box" style="width: 60px" required/>
                    <input type="hidden" name="answer_id[`question_no`][]" value="">
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        let index = {{ (isset($questions) && !empty($questions) ? $questions->count() + 1 : 1) }};
        $(document).ready(function () {
            $(document).on('click', '.add-stage', function (e) {
                e.preventDefault();
                let html = $('#question-section').html();
                html = html.replace(/`SrNo`/gi, index);
                html = html.replace(/`SrNo~1`/gi, parseInt(index) + 1);
                $('.question-div').append(html);
                index++;
            })
        });

        $(document).on('click', '.delete-stage', function (e) {
            e.preventDefault();
            $(this).closest('.card').remove();
        });

        $(document).on('click', '.delete-scale', function (e) {
            e.preventDefault();
            $(this).closest('.answer-section').remove();
        });

        $(document).on('click', '.add-step', function (e) {
            e.preventDefault();
            let ind = $(this).attr('data-index');
            let opt_cnt = $(this).closest('.card').find('.answer-section').length;
            opt_cnt = (opt_cnt == '' || opt_cnt == null || opt_cnt == undefined ? 0 : opt_cnt);
            opt_cnt = parseInt(opt_cnt) + 1;
            let html = $('#option-section').html();
                html = html.replace(/`question_no`/gi, ind);
                html = html.replace(/`opt_cnt`/gi, opt_cnt);

            $(this).closest('.card').find('.option-div').append(html);
        });

    </script>
@endsection