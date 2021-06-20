@extends('admin.layouts.app')

@section('title', 'Edit Program')

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
		    <div class="content-header-left col-sm-9 col-12">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">Edit Program</h2>
		            </div>
		        </div>
            </div>
            <div class="col-sm-3 col-12">
                <div class="float-right">
                    <button type="button" class="btn btn-primary add-stage">Add Stage</button>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('program.update', $program->id) }}" id="addForm" method="PUT" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="type" value="0">
                <div id="validation-errors"></div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control @error('title') error @enderror" value="{{ (old('title') ? old('title') : $program->title) }}" name="title" placeholder="Program Title">
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
                                    <input type="text" class="form-control @error('description') error @enderror" value="{{ (old('description') ? old('description') : $program->description) }}" name="description" placeholder="Program Description">
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
                                    <input type="text" class="form-control @error('cost') error @enderror" value="{{ (old('cost') ? old('cost') : $program->cost) }}" name="cost" placeholder="Cost">
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
                                    @php $tags = $program->tags->pluck('tag')->toArray(); @endphp
                                    <select name="tag[]" id="tag" class="form-control old_select2" multiple style="width: 100%">
                                        @foreach (config('custom.tags') as $tag)
                                            <option value="{{ $tag }}" {{ (in_array($tag, $tags) ? 'selected' : '') }}>{{ $tag }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control @error('tag') error @enderror" value="{{ (old('tag') ? old('tag') : $program->tag) }}" name="tag" placeholder="Tag"> --}}
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
                                    @php $time = explode('-', $program->time); @endphp
                                    <select name="year" class="form-control">
                                        @for ($i = 0; $i < 60; $i++)
                                            <option value="{{ $i }}" {{ (old('year') && old('year') == $i ? 'selected=""' : ($time[0] == $i ? 'selected=""' : '') ) }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Hours</label>
                                    <select name="month" class="form-control">
                                        @for ($i = 0; $i < 24; $i++)
                                            <option value="{{ $i }}" {{ (old('month') && old('month') == $i ? 'selected=""' : ($time[1] == $i ? 'selected=""' : '') ) }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Days</label>
                                    <input type="number" name="day" id="day" value="{{ (old('day') ? old('day') : $time[2]) }}" class="form-control">
                                    {{-- <select name="day" class="form-control">
                                        @for ($i = 0; $i <= 31; $i++)
                                            <option value="{{ $i }}" {{ (old('day') && old('day') == $i ? 'selected=""' : ($time[2] == $i ? 'selected=""' : '') ) }}>{{ $i }}</option>
                                        @endfor
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="checkbox" name="is_multiple" value="1" {{ ($program->is_multiple == 1 ? 'checked' : '') }}>
                                    <label for="is_multiple">Multiple Answer</label>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="stage-div" id="stage-div">
                    @php $length = 0; @endphp
                    @foreach ($program->stages as $index => $stage)
                        <div class="stage-section">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    Stage {{ $index + 1 }}
                                    <div>
                                        <button type="button" name="" class="btn btn-primary add-step" data-index="{{ $index }}">Add Step</button>
                                        <button type="button" name="" class="btn btn-primary delete-stage" data-index="{{ $index }}">Delete Stage</button>
                                        <input type="hidden" name="order[{{ $index }}]" data-index="{{ $index }}" value="{{ $stage->order }}" class="order-cls">
                                        <input type="hidden" name="stage_id[{{ $index }}]" value="{{ $stage->id }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Stage Title</label>
                                                <input type="text" name="stage_name[{{ $index }}]" value="{{ $stage->title }}" class="form-control" placeholder="Stage Title">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Stage Description</label>
                                                <input type="text" name="stage_description[{{ $index }}]" value="{{ $stage->description }}" class="form-control" placeholder="Stage Description">
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($stage->steps as $key => $step)
                                        <div class="step-div">
                                            <div class="row step-row">
                                                <div class="col-sm-2 mt-2">
                                                    Step {{ $key + 1 }}
                                                    <input type="hidden" name="step_id[{{ $index }}][]" value="{{ $step->id }}">
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="card card-body bg-step">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Step Title</label>
                                                                    <input type="text" name="step_name[{{ $index }}][{{ $key }}]" value="{{ $step->title }}" class="form-control" placeholder="Step Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Step Description</label>
                                                                    <input type="text" name="step_description[{{ $index }}][{{ $key }}]" value="{{ $step->description }}" class="form-control" placeholder="Step Description">
                                                                    <input type="hidden" name="step_index[{{ $index }}][{{ $key }}]" value="{{ $key }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <button class="btn btn-outline-primary add-scale-btn" data-index="{{ $index }}" data-step="{{ $key }}">Add Scale</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <button class="btn btn-outline-primary add-workout-btn" data-index="{{ $index }}" data-step="{{ $key }}">Add Workout</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <button class="btn btn-outline-primary add-attachment-btn" data-index="{{ $index }}" data-step="{{ $key }}">Add Attachment</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="scale-workout-section">
                                                            @foreach ($step->sequences as $key1 => $sequence)
                                                                @if ($sequence->typable_type == 'App\StepScale')
                                                                    <div class="row">
                                                                        <input type="hidden" name="innerType[{{ $index }}][{{ $key }}][]" value="scale">
                                                                        <input type="hidden" name="innerOrder[{{ $index }}][{{ $key }}][]" value="{{ $length }}">
                                                                        <div class="col-sm-1 mt-2">
                                                                            {{ $key1 + 1 }}
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label>Scales</label>
                                                                                <select name="scales[{{ $index }}][{{ $key }}][{{ $length }}]" id="scale_{{ $index }}_{{ $length }}" class="form-control old_select2" style="width: 100%;">
                                                                                    @foreach ($scales as $item)
                                                                                        <option value="{{ $item->id }}" {{ ($item->id == $sequence->typable->scale_id ? 'selected=""' : '') }}>{{ $item->title }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2 mt-2">
                                                                            <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($sequence->typable_type == 'App\StepWorkout')
                                                                    <div class="row">
                                                                        <input type="hidden" name="innerType[{{ $index }}][{{ $key }}][]" value="workout">
                                                                        <input type="hidden" name="innerOrder[{{ $index }}][{{ $key }}][]" value="{{ $length }}">
                                                                        <div class="col-sm-1 mt-2">
                                                                            {{ $key1 + 1 }}
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label>Workouts</label>
                                                                                <select name="workouts[{{ $index }}][{{ $key }}][{{ $length }}]" id="workout_{{ $index }}_{{ $length }}" class="form-control old_select2" style="width: 100%;">
                                                                                    @foreach ($workouts as $item)
                                                                                        <option value="{{ $item->id }}" {{ ($item->id == $sequence->typable->workout_id ? 'selected=""' : '') }}>{{ $item->title }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2 mt-2">
                                                                            <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
                                                                        </div>
                                                                    </div>
                                                                @elseif (!empty($sequence->typable))
                                                                    <div class="row">
                                                                        <input type="hidden" name="innerType[{{ $index }}][{{ $key }}][]" value="attachment">
                                                                        <input type="hidden" name="innerOrder[{{ $index }}][{{ $key }}][]" value="{{ $length }}">
                                                                        <div class="col-sm-1">
                                                                            {{ $key1 + 1 }}
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <input type="hidden" name="attachment[{{ $index }}][{{ $key }}][{{ $length }}]" value="{{ $sequence->typable_id }}">
                                                                                <a href="{{ Storage::url($sequence->typable->image) }}" target="_blank">{{ basename($sequence->typable->image) }}</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @php $length++; @endphp
                                                            @endforeach
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="checkbox" name="is_multiple[{{ $index }}][{{ $key + 1 }}]" value="1" {{ ($step->is_multiple == 1 ? 'checked' : '') }}>
                                                                <label for="is_multiple">Multiple Answer</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" data-button-spinner="Processing..." class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="stage-section" class="stage-section d-none">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            Stage `SrNo~1`
            <div>
                <button type="button" name="" class="btn btn-primary add-step" data-index="`SrNo`">Add Step</button>
                <button type="button" name="" class="btn btn-primary delete-stage" data-index="`SrNo`">Delete Stage</button>
                <input type="hidden" name="order[`SrNo`]" data-index="`SrNo`" value="0" class="order-cls">
                <input type="hidden" name="stage_id[`SrNo`]" value="">
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
                        <input type="hidden" name="step_id[1]" value="">
                    </div>
                    <div class="col-sm-10">
                        <div class="card card-body bg-step">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Step Title</label>
                                        <input type="text" name="step_name[`SrNo`][0]" class="form-control" placeholder="Step Name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Step Description</label>
                                        <input type="text" name="step_description[`SrNo`][0]" class="form-control" placeholder="Step Description">
                                        <input type="hidden" name="step_index[`SrNo`][0]" value="1">
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
            <input type="hidden" name="step_id[`SrNo`]" value="">
        </div>
        <div class="col-sm-10">
            <div class="card card-body bg-step">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Step Title</label>
                            <input type="text" name="step_name[`SrNo`][`SrNo~1`]" class="form-control" placeholder="Step Name">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Step Description</label>
                            <input type="text" name="step_description[`SrNo`][`SrNo~1`]" class="form-control" placeholder="Step Description">
                            <input type="hidden" name="step_index[`SrNo`][`SrNo~1`]" value="`SrNo~1`">
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
        var length = {{ $program->stages->pluck('steps')->flatten()->pluck('sequences')->flatten()->count() }};
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
        let index = {{ $program->stages->count() }};
        $(document).on('click', '.add-stage', function(e) {
            e.preventDefault();
            let content = $('#stage-section').html();
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

        $('#addForm').submit(function() {
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
                type: 'POST',
                url: $(this).attr('action'),
                // headers: {
                //     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                // },
                success: function(response) {
                    window.location.href = '{{ route("program.index") }}';
                }, error: function (error) {
                    $this.html($this.data("ohtml"));
                    $this.attr("disabled", false);
                    $('#validation-errors').html('');
                    console.log(error.status);
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
