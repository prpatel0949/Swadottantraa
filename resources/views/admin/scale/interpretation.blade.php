@extends('admin.layouts.app')

@section('title', 'Interpretation')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/css/forms/select/select2.min.css') }}">
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
		                <h2 class="content-header-title float-left mb-0">Interpretation</h2> 
                        {{-- {{ $errors }} --}}
		            </div>
		        </div>
            </div>
            <div class="col-sm-3 col-12 mb-2">
                <div class="float-right">
                    <button type="button" class="btn btn-primary add-interpretation">Add</button>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('scale.interpretation.store', $scale->id) }}" method="POST">
                @csrf
                @if ($scale->interpreatations->count() > 0)
                    @foreach ($scale->interpreatations as $key => $item)
                    <input type="hidden" name="id[{{ $key }}]" value="{{ $item->id }}" >
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title[{{ $key }}]" id="title" value="{{ $item->title }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Questions</label>
                                        <select name="question[{{ $key }}][]" class="form-control select2" multiple style="width: 100%;">
                                            <option value="" disabled>Select interpratation</option>
                                            @foreach ($scale->questions as $question)
                                                <option value="{{ $question->id }}" {{ (in_array($question->id, $item->questions->pluck('question_id')->toArray()) ? 'selected' : '') }}>{{ $question->question }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group float-right">
                                        <button type="button" class="btn btn-primary add-value" data-index="{{ $key }}">Add</button>
                                    </div>
                                </div>
                            </div>
                            @foreach ($item->interpretations as $value)
                            <input type="hidden" name="interpretation_id[{{ $key }}][]" value="{{ $value->id }}" >
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="label-control">Min</label>
                                        <input type="text" name="min[{{ $key }}][]" value="{{ $value->min }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="label-control">Max</label>
                                        <input type="text" name="max[{{ $key }}][]" value="{{ $value->max }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-control">Value</label>
                                        <input type="text" name="value[{{ $key }}][]" value="{{ $value->interpretation }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mt-2">
                                        <a href="javascript:void(0)" class="delete-value"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="inner-div"></div>
                        </div>
                    </div>        
                    @endforeach
                @else
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title[0]" id="title_0" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Questions</label>
                                    <input type="hidden" name="id[0]" value="" >
                                    <select name="question[0][]" class="form-control select2" multiple style="width: 100%;">
                                        <option value="" disabled>Select interpratation</option>
                                        @foreach ($scale->questions as $question)
                                            <option value="{{ $question->id }}">{{ $question->question }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group float-right">
                                    <button type="button" class="btn btn-primary add-value" data-index="0">Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="interpretation_id[0][]" value="" >
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label-control">Min</label>
                                    <input type="text" name="min[0][]" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label-control">Max</label>
                                    <input type="text" name="max[0][]" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label-control">Value</label>
                                    <input type="text" name="value[0][]" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="inner-div"></div>

                    </div>
                </div>
                @endif
                <div class="int-div"></div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<div class="inner-section d-none">
    <div class="row">
        <input type="hidden" name="interpretation_id[`SrNo`][]" value="" >
        <div class="col-md-3">
            <div class="form-group">
                <label class="label-control">Min</label>
                <input type="text" name="min[`SrNo`][]" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="label-control">Max</label>
                <input type="text" name="max[`SrNo`][]" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="label-control">Value</label>
                <input type="text" name="value[`SrNo`][]" class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mt-2">
                <a href="javascript:void(0)" class="delete-value"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
</div>


<div class="int-section d-none">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title[`index`]" id="title_`index`" value="" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Questions</label>
                        <input type="hidden" name="id[`index`]" value="" >
                        <select name="question[`index`][]" id="question_`index`" multiple class="form-control" style="width: 100%;">
                            <option value="" disabled>Select interpratation</option>
                            @foreach ($scale->questions as $question)
                                <option value="{{ $question->id }}">{{ $question->question }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group float-right">
                        <button type="button" class="btn btn-primary add-value" data-index="`index`">Add</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <input type="hidden" name="interpretation_id[`index`][]" value="" >
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="label-control">Min</label>
                        <input type="text" name="min[`index`][]" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="label-control">Max</label>
                        <input type="text" name="max[`index`][]" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="label-control">Value</label>
                        <input type="text" name="value[`index`][]" class="form-control">
                    </div>
                </div>
            </div>

            <div class="inner-div"></div>

        </div>
    </div>
</div>


@endsection

@section('js')
    <script src="{{ asset('assets/dashboard/vendors/js/forms/select/select2.min.js') }}"></script>
    <script>
        $('.select2').select2();
        let number = 1;
        $(document).on('click', '.add-value', function () {
            let index = $(this).attr('data-index');
            let content = $('.inner-section').html();
            content = content.replace(/`SrNo`/gi, index);
            $(this).closest('.card').find('.inner-div').append(content);
        });

        $(document).on('click', '.add-interpretation', function() {
            let content = $('.int-section').html();
            content = content.replace(/`index`/gi, number);
            $('.int-div').append(content);
            $('#question_' + number).select2();
            number++;
        });

        $(document).on('click', '.delete-value', function () {
            $(this).closest('.row').remove();
        })
    </script>
@endsection