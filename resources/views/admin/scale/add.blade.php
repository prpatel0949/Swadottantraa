@extends('admin.layouts.app')

@section('title', 'Add Scale')

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
		                <h2 class="content-header-title float-left mb-0">New Scale</h2>
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
            <form action="{{ route('scale.store') }}" method="POST">
                @csrf
                <div class="card header-block">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('title') error @enderror" value="{{ old('title') }}" name="title" placeholder="Scale Title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea type="text" class="form-control @error('interpreatation') error @enderror" value="{{ old('interpreatation') }}" name="interpreatation" placeholder="Note for Interpreatation">{{ old('interpreatation') }}</textarea>
                                            @error('interpreatation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea type="text" class="form-control @error('scale_description') error @enderror" value="{{ old('scale_description') }}" name="scale_description" placeholder="Scale Description">{{ old('scale_description') }}</textarea>
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
                                            <input type="hidden" name="order[{{ $index }}]" data-index="{{ $index }}" value="{{ old('order.'.$index) }}" class="order-cls">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="question[{{ $index }}]" value="{{ old('question.'.$index) }}" class="form-control @error('question.'.$index) error @enderror" placeholder="Question">
                                            @error('question.'.$index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="description[{{ $index }}]" value="{{ old('description.'.$index) }}" class="form-control @error('description.'.$index) error @enderror" placeholder="Description">
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
                                                <input type="text" name="answer[{{ $index }}][]" value="{{ $answer }}" class="form-control @error('answer.'.$index.'.'.$key) error @enderror" placeholder="Answer">
                                                <div class="input-group-append">
                                                    <span class="input-group-text add-value" id="basic-addon2">$</span>
                                                    <input type="text" name="answer_value[{{ $index }}][]" value="{{ old('answer_value.'.$index.'.'.$key) }}" class="input-group-text value-box" style="width: 60px" readonly=""/>
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
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group float-right">
                                            <button type="button" class="btn btn-primary add-answer" data-index="0">Add Answer</button>
                                            <input type="hidden" name="order[0]" data-index="0" value="0" class="order-cls">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="question[0]" class="form-control" placeholder="Question">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="description[0]" class="form-control" placeholder="Description">
                                        </div>
                                    </div>
                                </div>
                                <div class="row answer-section">
                                    <div class="col-md-4">
                                        <div class="form-group input-group">
                                            <input type="text" name="answer[0][]" class="form-control" placeholder="Answer">
                                            <div class="input-group-append">
                                                <span class="input-group-text add-value" id="basic-addon2">$</span>
                                                <input type="text" name="answer_value[0][]" class="input-group-text value-box" style="width: 60px" readonly=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="#" class="text-danger delete-answer"><i class="fa fa-trash fa-2x"></i></a>
                                    </div>
                                </div>
                                <div class="answer-tab"></div>
                            </div>
                        </div>
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
                        <input type="hidden" name="order[`SrNo`]" data-index="`SrNo`" value="0" class="order-cls">
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
                    <div class="form-group input-group">
                        <input type="text" name="answer[`SrNo`][]" class="form-control" placeholder="Answer">
                        <div class="input-group-append">
                            <span class="input-group-text add-value" id="basic-addon2">$</span>
                            <input type="text" name="answer_value[`SrNo`][]" class="input-group-text value-box" style="width: 60px" readonly=""/>
                        </div>
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

<div class="answer-div d-none">
    <div class="row answer-section">
        <div class="col-md-4">
            <div class="form-group input-group">
                <input type="text" name="answer[`SrNo`][]" class="form-control" placeholder="Answer">
                <div class="input-group-append">
                    <span class="input-group-text add-value" id="basic-addon2">$</span>
                    <input type="text" name="answer_value[`SrNo`][]" class="input-group-text value-box" style="width: 60px" readonly=""/>
                </div>
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
        let question = {{ (old('question') ? count(old('question')) + 1 : 1) }};
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
        });
    </script>
@endsection
