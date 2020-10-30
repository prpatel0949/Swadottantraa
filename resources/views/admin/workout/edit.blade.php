@extends('admin.layouts.app')

@section('title', 'Edit Workout')

@section('css')
    <link rel="stylesheet" href="https://bevacqua.github.io/dragula/dist/dragula.css">
    <style>
        .add-value {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
		    <div class="content-header-left col-md-9 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">New Workout</h2>
		            </div>
		        </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('workout.update', $workout->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card header-block">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('title') error @enderror" value="{{ (old('title') ? old('title') : $workout->title) }}" name="title" placeholder="Workout Title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group float-right">
                                    {{-- <button type="button" class="btn btn-primary add-question">Add Question</button> --}}
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Add Question</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item add-question" data-type="0" href="#">Descriptive</a></li>
                                            <li><a class="dropdown-item add-question" data-type="1" href="#">MCQ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="question-tab">
                    @if (old('question'))
                        @foreach (old('question') as $index => $question)
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group float-right">
                                            @if (old('answer_type.'.$index) == 0)
                                                <button type="button" class="btn btn-primary add-answer" data-index="{{ $index }}">Add Answer</button>
                                            @endif
                                            <button type="button" class="btn btn-primary delete-question" data-index="{{ $index }}">Delete Question</button>
                                            <input type="hidden" name="order[{{ $index }}]" data-index="{{ $index }}" value="{{ old('order.'.$index) }}" class="order-cls">
                                            <input type="hidden" name="answer_type[{{ $index }}]" data-index="{{ $index }}" value="{{ old('answer_type.'.$index) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="question[{{ $index }}]" class="form-control" placeholder="Question" value="{{ $question }}">
                                            @error('question.'.$index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="description[{{ $index }}]" class="form-control" placeholder="Description"
                                                value="{{ old('description.'.$index) }}">
                                            @error('description.'.$index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @if (old('answer_type.'.$index) == 0)
                                    @foreach (old('answer.'.$index) as $key => $answer)
                                    <div class="row answer-section">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="answer[{{ $index }}][]" value="{{ $answer }}" class="form-control" placeholder="Answer">
                                                @error('answer.'.$index.$key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="#" class="text-danger delete-answer"><i class="fa fa-trash fa-2x"></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                <div class="row answer-section">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="answer[{{ $index }}]" class="form-control" placeholder="Descriptive Answer"
                                                value="{{ old('answer.'.$index) }}" readonly>
                                            @error('answer.'.$index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="answer-tab"></div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        @foreach ($workout->questions as $index => $question)
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group float-right">
                                            @if (old('answer_type.'.$index) == 0)
                                                <button type="button" class="btn btn-primary add-answer" data-index="{{ $index }}">Add Answer</button>
                                            @endif
                                            <button type="button" class="btn btn-primary delete-question" data-index="{{ $index }}">Delete Question</button>
                                            <input type="hidden" name="order[{{ $index }}]" data-index="{{ $index }}" value="{{ $question->order }}" class="order-cls">
                                            <input type="hidden" name="answer_type[{{ $index }}]" data-index="{{ $index }}" value="{{ $question->answer_type }}">
                                            <input type="hidden" name="question_id[{{ $index }}]" value="{{ $question->id }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="question[{{ $index }}]" class="form-control" placeholder="Question" value="{{ $question->question }}">
                                            @error('question.'.$index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="description[{{ $index }}]" class="form-control" placeholder="Description"
                                                value="{{ $question->description }}">
                                            @error('description.'.$index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @if ($question->answer_type == 0)
                                    @foreach ($question->answers as $key => $answer)
                                    <div class="row answer-section">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="hidden" name="answer_id[{{ $index }}][]" value="{{ $answer->id }}">
                                                <input type="text" name="answer[{{ $index }}][]" value="{{ $answer->answer }}" class="form-control" placeholder="Answer">
                                                @error('answer.'.$index.$key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="#" class="text-danger delete-answer"><i class="fa fa-trash fa-2x"></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                <div class="row answer-section">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" name="answer_id[{{ $index }}]" value="{{ $question->answers[0]->id }}">
                                            <input type="text" name="answer[{{ $index }}]" class="form-control" placeholder="Descriptive Answer"
                                                value="{{ $question->answers[0]->answer }}" readonly>
                                            @error('answer.'.$index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="answer-tab"></div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="mcq-answer d-none">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group float-right">
                        <button type="button" class="btn btn-primary add-answer" data-index="`SrNo`">Add Answer</button>
                        <button type="button" class="btn btn-primary delete-question" data-index="`SrNo`">Delete Question</button>
                        <input type="hidden" name="order[`SrNo`]" data-index="`SrNo`" value="0" class="order-cls">
                        <input type="hidden" name="answer_type[`SrNo`]" data-index="`SrNo`" value="0">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="question[`SrNo`]" class="form-control" placeholder="Question">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="description[`SrNo`]" class="form-control" placeholder="Description">
                    </div>
                </div>
            </div>
            <div class="row answer-section">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="hidden" name="answer_id[`SrNo`][]" value="">
                        <input type="text" name="answer[`SrNo`][]" class="form-control" placeholder="Answer">
                    </div>
                </div>
                <div class="col-md-1">
                    <a href="#" class="text-danger delete-answer"><i class="fa fa-trash fa-2x"></i></a>
                </div>
            </div>
            <div class="answer-tab"></div>
        </div>
    </div>
</div>

<div class="desc-answer d-none">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group float-right">
                        <button type="button" class="btn btn-primary delete-question" data-index="`SrNo`">Delete Question</button>
                        <input type="hidden" name="order[`SrNo`]" data-index="`SrNo`" value="0" class="order-cls">
                        <input type="hidden" name="answer_type[`SrNo`]" data-index="`SrNo`" value="1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="question[`SrNo`]" class="form-control" placeholder="Question">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="description[`SrNo`]" class="form-control" placeholder="Description">
                    </div>
                </div>
            </div>
            <div class="row answer-section">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="hidden" name="answer_id[`SrNo`]" value="">
                        <input type="text" name="answer[`SrNo`]" class="form-control" placeholder="Descriptive Answer" readonly>
                    </div>
                </div>
            </div>
            <div class="answer-tab"></div>
        </div>
    </div>
</div>

<div class="answer-div d-none">
    <div class="row answer-section">
        <div class="col-md-4">
            <div class="form-group">
                <input type="hidden" name="answer_id[`SrNo`][]" value="">
                <input type="text" name="answer[`SrNo`][]" class="form-control" placeholder="Answer">
            </div>
        </div>
        <div class="col-md-1">
            <a href="#" class="text-danger delete-answer"><i class="fa fa-trash fa-2x"></i></a>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="https://bevacqua.github.io/dragula/dist/dragula.js"></script>
    <script>
        let question = {{ (old('question') ? count(old('question')) : $workout->questions->count()) }};
        $(function() {
            var container = document.getElementById('question-tab');
            var rows = container.children;
            var nodeListForEach = function (array, callback, scope) {
  				for (var i = 0; i < array.length; i++) {
					callback.call(scope, i, array[i]);
  				}
			};
            var sortableTable = dragula([container]);
            sortableTable.on('dragend', function() {
                listArray = [];
  				nodeListForEach(rows, function (index, row) {
                      console.log($(row).find('.order-cls').attr('data-index'));
                      $(row).find('.order-cls').val(index);
                    listArray.push({ 'id': $(row), 'index': index })
  				});

                console.log(listArray);  
            });

            $(document).on('click', '.add-question', function(e) {
                e.preventDefault();
                let type = $(this).attr('data-type');
                    let content = $('.desc-answer').html();
                if (type == 1) {
                    content = $('.mcq-answer').html();
                }
                content = content.replace(/`SrNo`/gi, question);
                question++;
                $('#question-tab').append(content);
            });

            $(document).on('click', '.add-answer', function(e){
                e.preventDefault();
                let index = $(this).attr('data-index');
                let content = $('.answer-div').html();
                content = content.replace(/`SrNo`/gi, index);
                $(this).closest('.card').find('.answer-tab').append(content);
            });

            $(document).on('click', '.delete-question', function(e) {
                e.preventDefault();
                $(this).closest('.card').remove();
            });

            $(document).on('click', '.delete-answer', function(e){
                e.preventDefault();
                console.log($(this).parent('.answer-section'));
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection