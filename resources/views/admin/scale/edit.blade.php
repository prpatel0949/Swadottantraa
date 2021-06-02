@extends('admin.layouts.app')

@section('title', 'Edit Scale')

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
        <div class="content-header row sticky_block">
		    <div class="content-header-left col-md-9 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">Edit Scale</h2>
		            </div>
		        </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="float-right">
                    <button type="button" class="btn btn-primary add-question">Add Question</button>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('scale.update', $scale->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('title') error @enderror"
                                            value="{{ (old('title') ? old('title') : $scale->title) }}" name="title" placeholder="Scale Title">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea type="text" class="form-control @error('interpreatation') error @enderror"
                                            value="{{ (old('interpreatation') ? old('interpreatation') : $scale->interpreatation) }}" name="interpreatation" placeholder="Note for Interpreatation">{{ (old('interpreatation') ? old('interpreatation') : $scale->interpreatation) }}</textarea>
                                        @error('interpreatation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <textarea type="text" class="form-control @error('scale_description') error @enderror"
                                            value="{{ (old('scale_description') ? old('scale_description') : $scale->description) }}" name="scale_description" placeholder="Scale Description">{{ (old('scale_description') ? old('scale_description') : $scale->description) }}</textarea>
                                        @error('scale_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                            <button type="button" class="btn btn-primary add-answer" data-index="{{ $index }}">Add Answer</button>
                                            <button type="button" class="btn btn-primary copy-div">Copy</button>
                                            <input type="hidden" name="order[{{ $index }}]" data-index="{{ $index }}" value="{{ old('order.'.$index) }}" class="order-cls">
                                            <input type="hidden" name="question_id[{{ $index }}]" data-index="{{ $index }}" value="{{ old('question_id.'.$index) }}" class="question_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="question[{{ $index }}]" value="{{ old('question.'.$index) }}" class="form-control question @error('question.'.$index) error @enderror" placeholder="Question">
                                            @error('question.'.$index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="description[{{ $index }}]" value="{{ old('description.'.$index) }}" class="form-control description @error('description.'.$index) error @enderror" placeholder="Description">
                                            @error('description.'.$index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @foreach (old('answer.'.$index) as $key => $answer)
                                    <div class="row answer-section">
                                        <div class="col-md-4">
                                            <div class="form-group input-group">
                                                <input type="text" name="answer[{{ $index }}][]" value="{{ $answer }}" class="form-control @error('answer.'.$index.'.'.$key) error @enderror answer" placeholder="Answer">
                                                <input type="hidden" name="answer_id[{{ $index }}][]" data-index="{{ $index }}" value="{{ old('answer_id.'.$index.'.'.$key) }}" class="answer_id">
                                                <div class="input-group-append">
                                                    <span class="input-group-text add-value" id="basic-addon2">$</span>
                                                    <input type="text" name="answer_value[{{ $index }}][]" value="{{ old('answer_value.'.$index.'.'.$key) }}" class="input-group-text value-box anser_value" style="width: 60px" readonly=""/>
                                                </div>
                                                @error('answer.'.$index.'.'.$key)
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
                                <div class="answer-tab"></div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="checkbox" name="is_interpreatation[{{ $index }}]" value="1" {{ (old('is_interpreatation.'.$index) == 1 ? 'checked' : '') }}>
                                            <label>Is Interpreatation</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        @foreach ($scale->questions as $index => $question)
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group float-right">
                                            <button type="button" class="btn btn-primary add-answer" data-index="{{ $index }}">Add Answer</button>
                                            <button type="button" class="btn btn-primary copy-div">Copy</button>
                                            <input type="hidden" name="order[{{ $index }}]" data-index="{{ $index }}" value="{{ $index }}" class="order-cls">
                                            <input type="hidden" name="question_id[{{ $index }}]" data-index="{{ $index }}" value="{{ $question->id }}" class="question_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="question[{{ $index }}]" value="{{ $question->question }}" class="form-control question" placeholder="Question">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="description[{{ $index }}]" value="{{ $question->description }}" class="form-control description" placeholder="Description">
                                        </div>
                                    </div>
                                </div>
                                @foreach ($question->answers as $answer)
                                <div class="row answer-section">
                                    <div class="col-md-4">
                                        <div class="form-group input-group">
                                            <input type="text" name="answer[{{ $index }}][]" value="{{ $answer->answer }}" class="answer form-control" placeholder="Answer">
                                            <div class="input-group-append">
                                                <span class="input-group-text add-value" id="basic-addon2">$</span>
                                                <input type="text" name="answer_value[{{ $index }}][]" value="{{ $answer->answer_value }}" class="input-group-text value-box anser_value" style="width: 60px" readonly=""/>
                                                <input type="hidden" name="answer_id[{{ $index }}][]" data-index="{{ $index }}" value="{{ $answer->id }}" class="answer_id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="#" class="text-danger delete-answer"><i class="fa fa-trash fa-2x"></i></a>
                                    </div>
                                </div>
                                @endforeach
                                <div class="answer-tab"></div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="checkbox" name="is_interpreatation[{{ $index }}]" value="1" {{ ($question->is_interpreatation == 1 ? 'checked' : '') }}>
                                            <label>Is Interpreatation</label>
                                        </div>
                                    </div>
                                </div>
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


<div class="question-div d-none">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group float-right">
                        <button type="button" class="btn btn-primary add-answer" data-index="`SrNo`">Add Answer</button>
                        <button type="button" class="btn btn-primary delete-question" data-index="`SrNo`">Delete Question</button>
                        <button type="button" class="btn btn-primary copy-div">Copy</button>
                        <input type="hidden" name="order[`SrNo`]" data-index="`SrNo`" value="0" class="order-cls">
                        <input type="hidden" name="question_id[`SrNo`]" data-index="`SrNo`" value="" class="question_id">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="question[`SrNo`]" class="form-control question" placeholder="Question">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="description[`SrNo`]" class="form-control description" placeholder="Description">
                    </div>
                </div>
            </div>
            <div class="row answer-section">
                <div class="col-md-4">
                    <div class="form-group input-group">
                        <input type="text" name="answer[`SrNo`][]" class="form-control answer" placeholder="Answer">
                        <div class="input-group-append">
                            <span class="input-group-text add-value" id="basic-addon2">$</span>
                            <input type="text" name="answer_value[`SrNo`][]" class="input-group-text value-box anser_value" style="width: 60px" readonly=""/>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <a href="#" class="text-danger delete-answer"><i class="fa fa-trash fa-2x"></i></a>
                </div>
            </div>
            <div class="answer-tab"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="checkbox" name="is_interpreatation[`SrNo`]" value="1">
                        <label>Is Interpreatation</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="answer-div d-none">
    <div class="row answer-section">
        <div class="col-md-4">
            <div class="form-group input-group">
                <input type="text" name="answer[`SrNo`][]" class="form-control answer" placeholder="Answer">
                <div class="input-group-append">
                    <span class="input-group-text add-value" id="basic-addon2">$</span>
                    <input type="text" name="answer_value[`SrNo`][]" class="input-group-text value-box anser_value" style="width: 60px" readonly=""/>
                    <input type="hidden" name="answer_id[`SrNo`][]" data-index="`SrNo`" value="" class="answer_id">
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <a href="#" class="text-danger delete-answer"><i class="fa fa-trash fa-2x"></i></a>
        </div>
    </div>
</div>

<div class="interpreatation-div d-none">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Start</label>
                <input type="hidden" name="inter_ids[]" value="">
                <input type="text" name="start[]" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>End</label>
                <input type="text" name="end[]" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Value</label>
                <input type="text" name="value[]" class="form-control">
            </div>
        </div>
        <div class="col-md-2 mt-2">
            <div class="form-group">
                <a href="#" class="delete-inter"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
</div>

<div id="copy-content">

</div>

@endsection

@section('js')
    <script src="https://bevacqua.github.io/dragula/dist/dragula.js"></script>
    <script>
        let question = {{ (old('question') ? count(old('question')) + 1 : $scale->questions->count()) }};
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

            // var container_ans = document.getElementsByClassName('answer-section');
            // var sortableTable_ans = dragula([container_ans]);
            // sortableTable_ans.on('dragend', function() {
            //     listArray = [];
  			// 	nodeListForEach(rows, function (index, row) {
            //         listArray.push({ 'id': $(row), 'index': index })
  			// 	});

            //     console.log(listArray);
            // });

            $(document).on('click', '.add-question', function(e) {
                e.preventDefault();
                let content = $('.question-div').html();
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

            $(document).on('click', '.delete-answer', function(e){
                e.preventDefault();
                console.log($(this).parent('.answer-section'));
                // e.parentElement.remove();
                $(this).parent().parent().remove();
            });

            $(document).on('click', '.add-value', function(e) {
                e.preventDefault();
                console.log($(this).closest('answer-section').find('.value-box'));
                $(this).closest('.answer-section').find('.value-box').removeAttr('readonly');
                $(this).closest('.answer-section').find('.value-box').css('background', 'white');
            });

            $(document).on('click', '.delete-question', function(e) {
                e.preventDefault();
                $(this).closest('.card').remove();
            });

            $(document).on('click', '.add-interpreatation', function (e) {
                e.preventDefault();
                let html = $('.interpreatation-div').html();
                $('#interpreatation-section').append(html);
            });

            $(document).on('click', '.delete-inter', function (e) {
                e.preventDefault();
                $(this).closest('.row').remove();
            });

            $(document).on('click', '.copy-div', function (e) {
                e.preventDefault();
                $('#copy-content').html($(this).closest('.card').clone());
                $('#copy-content').find('.order-cls').attr('name', 'order['+ question +']');
                $('#copy-content').find('.order-cls').attr('data-index', question);
                $('#copy-content').find('.order-cls').val(question);

                $('#copy-content').find('.question').attr('name', 'question['+ question +']');
                $('#copy-content').find('.description').attr('name', 'description['+ question +']');
                $('#copy-content').find('.question_id').attr('name', 'question_id['+ question +']');
                $('#copy-content').find('.answer').attr('name', 'answer['+ question +'][]');
                $('#copy-content').find('.anser_value').attr('name', 'answer_value['+ question +'][]');
                $('#copy-content').find('.answer_id').attr('name', 'answer_id['+ question +'][]');
                $('#copy-content').find('.is_interpretation').attr('name', 'is_interpreatation['+ question +']');
                $('#copy-content').find('.add-answer').attr('data-index', question);

                let content = $('#copy-content').clone();
                // content = '<div class="card">'+ content + '</div>';
                question++;
                console.log($('#copy-content').html());
                $('#question-tab').append(content);
                $('#copy-content').html('')
            });

            // dragula([document.getElementById('question-tab')], { moves: function (el, source, handle, sibling) {
            //     console.log(el, source, handle);
            // }});
        });
    </script>
@endsection
