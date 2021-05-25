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
		                <h2 class="content-header-title float-left mb-0">New Program</h2>
		            </div>
		        </div>
            </div>
            <div class="col-sm-3 col-12">
                <div class="form-group float-right">
                    <button type="button" class="btn btn-primary add-stage">Add Stage</button>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('program.store') }}" id="addForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="0">
                <div id="validation-errors"></div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control @error('title') error @enderror" value="{{ old('title') }}" name="title" placeholder="Program Title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control @error('description') error @enderror" value="{{ old('description') }}" name="description" placeholder="Program Description">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Time</label>
                                    <input type="text" class="form-control @error('time') error @enderror" value="{{ old('time') }}" name="time" placeholder="Average Time">
                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Cost</label>
                                    <input type="text" class="form-control @error('cost') error @enderror" value="{{ old('cost') }}" name="cost" placeholder="Cost">
                                    @error('cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Tag</label>
                                    <select name="tag[]" id="tag" class="form-control old_select2" multiple style="width: 100%">
                                        <option value="" disabled>Select Tag</option>
                                        @foreach (config('custom.tags') as $tag)
                                            <option value="{{ $tag }}">{{ $tag }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control @error('tag') error @enderror" value="{{ old('tag') }}" name="tag" placeholder="Tag"> --}}
                                    @error('tag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control @error('image') error @enderror" value="{{ old('image') }}" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Minutes</label>
                                    <select name="year" class="form-control">
                                        @for ($i = 0; $i < 60 ; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Hours</label>
                                    <select name="month" class="form-control">
                                        @for ($i = 0; $i < 24; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Days</label>
                                    <input type="number" name="day" id="day" class="form-control">
                                    {{-- <select name="day" class="form-control">
                                        @for ($i = 0; $i <= 31; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="checkbox" name="is_multiple" value="1">
                                    <label for="is_multiple">Multiple Answer</label>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="stage-div" id="stage-div">

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="is_live" id="is_live" value="0">
                        <button type="button" class="btn btn-primary submit-btn" data-button-spinner="Processing..." data-type="0">Complete & Save</button>
                        <button type="button" class="btn btn-primary submit-btn" data-button-spinner="Processing..." data-type="1">Complete & Live</button>
                        <a href="{{ route('program.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<div class="stage-section d-none">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            Stage `SrNo~1`
            <div>
                <button type="button" name="" class="btn btn-primary add-step" data-index="`SrNo`">Add Step</button>
                <button type="button" name="" class="btn btn-primary delete-stage" data-index="`SrNo`">Delete Stage</button>
                <input type="hidden" name="order[`SrNo`]" data-index="`SrNo`" value="0" class="order-cls">
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Stage Title</label>
                        <input type="text" name="stage_name[`SrNo`]" class="form-control" placeholder="Stage Title">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Stage Description</label>
                        <input type="text" name="stage_description[`SrNo`]" class="form-control" placeholder="Stage Description">
                    </div>
                </div>
            </div>

            <div class="step-div">
                <div class="row step-row">
                    <div class="col-sm-2 mt-2">
                        Step 1
                    </div>
                    <div class="col-sm-10">
                        <div class="card card-body bg-step">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Step Title</label>
                                        <input type="text" name="step_name[`SrNo`][]" class="form-control" placeholder="Step Name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Step Description</label>
                                        <input type="text" name="step_description[`SrNo`][]" class="form-control" placeholder="Step Description">
                                        <input type="hidden" name="step_index[`SrNo`][]" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button class="btn btn-outline-primary add-scale-btn" data-index="`SrNo`" data-step="0">Add Scale</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button class="btn btn-outline-primary add-workout-btn" data-index="`SrNo`" data-step="0">Add Workout</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button class="btn btn-outline-primary add-attachment-btn" data-index="`SrNo`" data-step="0">Add Attachment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="scale-workout-section">

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="checkbox" name="is_multiple[`SrNo`][1]" value="1" >
                                    <label for="is_multiple">Multiple Answer</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="step-section d-none">
    <div class="row step-row">
        <div class="col-sm-2 mt-2">
            Step `SrNo~1`
        </div>
        <div class="col-sm-10">
            <div class="card card-body bg-step">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Step Title</label>
                            <input type="text" name="step_name[`SrNo`][]" class="form-control" placeholder="Step Name">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Step Description</label>
                            <input type="text" name="step_description[`SrNo`][]" class="form-control" placeholder="Step Description">
                            <input type="hidden" name="step_index[`SrNo`][]" value="`SrNo~1`">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <button class="btn btn-outline-primary add-scale-btn" data-index="`SrNo`" data-step="`SrNo~1`">Add Scale</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button class="btn btn-outline-primary add-workout-btn" data-index="`SrNo`" data-step="`SrNo~1`">Add Workout</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button class="btn btn-outline-primary add-attachment-btn" data-index="`SrNo`" data-step="`SrNo~1`">Add Attachment</button>
                        </div>
                    </div>
                </div>
                <div class="scale-workout-section">

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="checkbox" name="is_multiple[`SrNo`][`SrNo~1`]" value="1" >
                        <label for="is_multiple">Multiple Answer</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="scale-div d-none">
    <div class="row">
        <input type="hidden" name="innerType[`SrNo`][`SrNo~1`][]" value="scale">
        <input type="hidden" name="innerOrder[`SrNo`][`SrNo~1`][]" value="`length`">
        <div class="col-sm-1 mt-2">
            `index`
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Scales</label>
                <select name="scales[`SrNo`][`SrNo~1`][`length`]" id="scale_`SrNo`_`length`" class="form-control select2" style="width: 100%;">
                    @foreach ($scales as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-2 mt-2">
            <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
        </div>
    </div>
</div>

<div class="workout-div d-none">
    <div class="row">
        <input type="hidden" name="innerType[`SrNo`][`SrNo~1`][]" value="workout">
        <input type="hidden" name="innerOrder[`SrNo`][`SrNo~1`][]" value="`length`">
        <div class="col-sm-1 mt-2">
            `index`
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Workouts</label>
                <select name="workouts[`SrNo`][`SrNo~1`][`length`]" id="workout_`SrNo`_`length`" class="form-control select2" style="width: 100%;">
                    @foreach ($workouts as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-2 mt-2">
            <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
        </div>
    </div>
</div>

<div class="attachment-div d-none">
    <div class="row">
        <input type="hidden" name="innerType[`SrNo`][`SrNo~1`][]" value="attachment">
        <input type="hidden" name="innerOrder[`SrNo`][`SrNo~1`][]" value="`length`">
        <div class="col-sm-1 mt-2">
            `index`
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Attachment</label>
                <input type="file" name="attachment[`SrNo`][`SrNo~1`][`length`]" class="form-control">
            </div>
        </div>
        <div class="col-sm-2 mt-2">
            <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="https://bevacqua.github.io/dragula/dist/dragula.js"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/forms/select/select2.min.js') }}"></script>
    <script>
        var length = 0;
        var container = document.getElementById('stage-div');
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
        $('.old_select2').select2();
        let index = {{ (old('stage_name') ? count(old('stage_name')) : 0) }};
        $(document).on('click', '.add-stage', function(e) {
            e.preventDefault();
            let content = $('.stage-section').html();
            content = content.replace(/`SrNo`/gi, index);
            content = content.replace(/`SrNo~1`/gi, parseInt(index) + 1);
            $('.stage-div').append(content);
            $('#scale_'+ index +'_1').select2();
            $('#workout_'+ index +'_1').select2();
            index++;
        });

        $(document).on('click', '.add-step', function(e) {
            e.preventDefault();
            let page = $(this).attr('data-index');
            let content = $('.step-section').html();
            let section_number = $(this).parent().parent().parent().find('.step-div > div').length;
            console.log(section_number);
            section_number = (section_number == '' ? 0 : section_number);
            section_number = section_number + 1;
            // section_number = parseInt(section_number) + 1;
            content = content.replace(/`SrNo`/gi, page);
            content = content.replace(/`SrNo~1`/gi, section_number);
            console.log($(this).parent().parent().find('.step-div'));
            $(this).parent().parent().parent().find('.step-div').append(content);
            // $('#scale_'+ page +'_' + section_number).select2();
            // $('#workout_'+ page +'_' + section_number).select2();
        });

        $(document).on('click', '.delete-stage', function(e) {
            e.preventDefault();
            $(this).closest('.card').remove();
        });

        $(document).on('click', '.add-scale-btn', function (e) {
            e.preventDefault();
            let ind = $(this).attr('data-index');
            let content = $('.scale-div').html();
            let step = $(this).attr('data-step');
            let number_index = $(this).closest('.step-row').find('.scale-workout-section > div').length;
            number_index = (isNaN(number_index) ? 0 : number_index) + 1;
            content = content.replace(/`index`/gi, number_index);
            content = content.replace(/`SrNo`/gi, ind);
            content = content.replace(/`length`/gi, length);
            content = content.replace(/`SrNo~1`/gi, step);
            $(this).closest('.step-row').find('.scale-workout-section').append(content);
            $('#scale_' + ind + '_' + length).select2();
            length++;
        });

        $(document).on('click', '.add-workout-btn', function (e) {
            e.preventDefault();
            let ind = $(this).attr('data-index');
            let content = $('.workout-div').html();
            let step = $(this).attr('data-step');
            let number_index = $(this).closest('.step-row').find('.scale-workout-section > div').length;
            number_index = (isNaN(number_index) ? 0 : number_index) + 1;
            content = content.replace(/`index`/gi, number_index);
            content = content.replace(/`SrNo`/gi, ind);
            content = content.replace(/`length`/gi, length);
            content = content.replace(/`SrNo~1`/gi, step);
            $(this).closest('.step-row').find('.scale-workout-section').append(content);
            $('#workout_' + ind + '_' + length).select2();
            length++;
        });

        $(document).on('click', '.add-attachment-btn', function (e) {
            e.preventDefault();
            let ind = $(this).attr('data-index');
            let content = $('.attachment-div').html();
            let step = $(this).attr('data-step');
            let number_index = $(this).closest('.step-row').find('.scale-workout-section > div').length;
            number_index = (isNaN(number_index) ? 0 : number_index) + 1;
            content = content.replace(/`index`/gi, number_index);
            content = content.replace(/`SrNo`/gi, ind);
            content = content.replace(/`length`/gi, length);
            content = content.replace(/`SrNo~1`/gi, step);
            $(this).closest('.step-row').find('.scale-workout-section').append(content);
            length++;
        });

        $(document).on('click', '.delete-scale', function (e) {
            e.preventDefault();
            $(this).closest('.row').remove();
        });

        $(document).on('click', '.submit-btn', function (e) {
            e.preventDefault();
            let is_live = $(this).attr('data-type');
            $('#is_live').val(is_live);
            $('#addForm').submit();
        });

        $('#addForm').submit(function(e) {
            var $this = $('.submit-btn');
            $this.data("ohtml", $this.html());
            var nhtml = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing... ";
            $this.html(nhtml);
            $this.attr("disabled", true);
            var formData = new FormData($(this)[0]);
            $.ajax({
                data: formData,
                contentType: false,
                processData: false,
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                success: function(response) {
                    window.location.href = '{{ route("program.index") }}';
                }, error: function (error) {
                    $('#validation-errors').html('');
                    $this.html($this.data("ohtml"));
                    $this.attr("disabled", false);
                    if (error.status == 422) {
                        $.each(error.responseJSON, function(key,value) {
                            $('#validation-errors').append('<div class="alert alert-danger">'+value[0] +'</div');
                        });
                    } else {
                        $('#validation-errors').append('<div class="alert alert-danger">Something went wrong.</div');
                    }
                    document.documentElement.scrollTop = 0;
                }
            });
            return false;
        });

    </script>
@endsection
