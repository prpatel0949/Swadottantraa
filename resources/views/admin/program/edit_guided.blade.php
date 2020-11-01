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
        <div class="content-header row">
		    <div class="content-header-left col-sm-9 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">Edit Program</h2>
		            </div>
		        </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group float-right">
                                    <input type="hidden" name="type" value="0">
                                    <button type="button" class="btn btn-primary add-stage">Add Stage</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
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
                                    <input type="text" class="form-control @error('description') error @enderror" value="{{ (old('description') ? old('description') : $program->description) }}" name="description" placeholder="Program Description">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('time') error @enderror" value="{{ (old('time') ? old('time') : $program->time) }}" name="time" placeholder="Average Time">
                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('cost') error @enderror" value="{{ (old('cost') ? old('cost') : $program->cost) }}" name="cost" placeholder="Cost">
                                    @error('cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('tag') error @enderror" value="{{ (old('tag') ? old('tag') : $program->tag) }}" name="tag" placeholder="Tag">
                                    @error('tag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="file" class="form-control @error('image') error @enderror" value="{{ old('image') }}" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stage-div" id="stage-div">
                    @if (old('stage_name'))
                        @foreach (old('stage_name') as $index => $stage)
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    Stage {{ $index + 1 }}
                                    <div>
                                        <button type="button" name="" class="btn btn-primary add-step" data-index="{{ $index }}">Add Step</button>
                                        <button type="button" name="" class="btn btn-primary delete-stage" data-index="{{ $index }}">Delete Stage</button>
                                        <input type="hidden" name="order[{{ $index }}]" data-index="{{ $index }}" value="{{ old('order.'.$index) }}" class="order-cls">
                                        <input type="hidden" name="stage_id[{{ $index }}]" value="{{ old('stage_id.'.$index) }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="stage_name[{{ $index }}]" value="{{ $stage }}" class="form-control" placeholder="Stage Title">
                                                @error('stage_name.'.$index)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="stage_description[{{ $index }}]" value="{{ old('stage_description.'.$index) }}" class="form-control" placeholder="Stage Description">
                                                @error('stage_description.'.$index)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="step-div">
                                        @if (!empty(old('step_name.'.$index)))
                                            @foreach (old('step_name.'.$index) as $key => $scale)
                                                <div class="row">
                                                    <div class="col-sm-2 mt-2">
                                                        Step {{ $key + 1 }}
                                                        <input type="hidden" name="step_id[{{ $index }}][]" value="{{ old('step_id.'.$index.'.'.$key) }}">
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="card card-body bg-light">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <input type="text" name="step_name[{{ $index }}][]" value="{{ old('step_name.'.$index.'.'.$key) }}" class="form-control" placeholder="Step Name">
                                                                        @error('step_name.'.$index.'.'.$key)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group input-group">
                                                                        <input type="text" name="step_description[{{ $index }}][]" value="{{ old('step_description.'.$index.'.'.$key) }}" class="form-control" placeholder="Step Description">
                                                                        <div class="input-group-append">
                                                                            <a href="javascript:void(0)" class="input-group-text add-value" id="basic-addon2">
                                                                                <i class="fa fa-stethoscope"></i>
                                                                            </a>
                                                                        </div>
                                                                        @error('step_description.'.$index.'.'.$key)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 d-none comment">
                                                                    <div class="form-group">
                                                                        <input type="text" name="comment[{{ $index }}][]" value="{{ old('comment.'.$index.'.'.$key) }}" class="form-control" placeholder="Comment">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label>Scales</label>
                                                                        <select name="scales[{{ $index }}][{{ $key }}][]" id="scale_{{ $index }}_{{ $key }}" class="form-control old_select2" multiple style="width: 100%;">
                                                                            @foreach ($scales as $item)
                                                                                <option value="{{ $item->id }}" 
                                                                                    {{ (!empty(old('scales.'.$index.'.'.$key)) && in_array($item->id, old('scales.'.$index.'.'.$key)) ? 'selected=""' : '') }}>{{ $item->title }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label>Workouts</label>
                                                                        <select name="workouts[{{ $index }}][{{ $key }}][]" id="workout_{{ $index }}_{{ $key }}" class="form-control old_select2" multiple style="width: 100%;">
                                                                            @foreach ($workouts as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    {{ (!empty(old('workouts.'.$index.'.'.$key)) && in_array($item->id, old('workouts.'.$index.'.'.$key)) ? 'selected=""' : '') }}>{{ $item->title }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label>Attachment</label>
                                                                        <input type="file" name="attachment[{{ $index }}][{{ $key }}][]" class="form-control" multiple>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                    
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ($program->stages as $index => $stage)
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
                                                <input type="text" name="stage_name[{{ $index }}]" value="{{ $stage->title }}" class="form-control" placeholder="Stage Title">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="stage_description[{{ $index }}]" value="{{ $stage->description }}" class="form-control" placeholder="Stage Description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-div">
                                        @foreach ($stage->steps as $key => $step)
                                            <div class="row">
                                                <div class="col-sm-2 mt-2">
                                                    Step {{ $key + 1 }}
                                                    <input type="hidden" name="step_id[{{ $index }}][]" value="{{ $step->id }}">
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="card card-body bg-light">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <input type="text" name="step_name[{{ $index }}][]" value="{{ $step->title }}" class="form-control" placeholder="Step Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group input-group">
                                                                    <input type="text" name="step_description[{{ $index }}][]" value="{{ $step->description }}" class="form-control" placeholder="Step Description">
                                                                    <div class="input-group-append">
                                                                        <a href="javascript:void(0)" class="input-group-text add-value" id="basic-addon2">
                                                                            <i class="fa fa-stethoscope"></i>
                                                                        </a>
                                                                    </div>
                                                                    @error('step_description.'.$index.'.'.$key)
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 d-none comment">
                                                                <div class="form-group">
                                                                    <input type="text" name="comment[{{ $index }}][]" value="{{ $step->comment }}" class="form-control" placeholder="Comment">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Scales</label>
                                                                    <select name="scales[{{ $index }}][{{ $key }}][]" id="scale_{{ $index }}_{{ $key }}" class="form-control old_select2" multiple style="width: 100%;">
                                                                        @foreach ($scales as $item)
                                                                            <option value="{{ $item->id }}" {{ (in_array($item->id, $step->scales->pluck('scale_id')->toArray()) ? 'selected=""' : '') }}>{{ $item->title }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Workouts</label>
                                                                    <select name="workouts[{{ $index }}][{{ $key }}][]" id="workout_{{ $index }}_{{ $key }}" class="form-control old_select2" multiple style="width: 100%;">
                                                                        @foreach ($workouts as $item)
                                                                            <option value="{{ $item->id }}" {{ (in_array($item->id, $step->workouts->pluck('workout_id')->toArray()) ? 'selected=""' : '') }}>{{ $item->title }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Attachment</label>
                                                                    <input type="file" name="attachment[{{ $index }}][{{ $key }}][]" class="form-control" multiple>
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
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                <input type="hidden" name="stage_id[`SrNo`]" value="">
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" name="stage_name[`SrNo`]" class="form-control" placeholder="Stage Title">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" name="stage_description[`SrNo`]" class="form-control" placeholder="Stage Description">
                    </div>
                </div>
            </div>
            
            <div class="step-div">
                <div class="row">
                    <div class="col-sm-2 mt-2">
                        Step 1
                        <input type="hidden" name="step_id[1]" value="">
                    </div>
                    <div class="col-sm-10">
                        <div class="card card-body bg-light">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="step_name[`SrNo`][]" class="form-control" placeholder="Step Name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group input-group">
                                        <input type="text" name="step_description[`SrNo`][]" class="form-control" placeholder="Step Description">
                                        <div class="input-group-append">
                                            <a href="javascript:void(0)" class="input-group-text add-value" id="basic-addon2">
                                                <i class="fa fa-stethoscope"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-none comment">
                                    <div class="form-group">
                                        <input type="text" name="comment[`SrNo`][]" class="form-control" placeholder="Comment">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Scales</label>
                                        <select name="scales[`SrNo`][1][]" id="scale_`SrNo`_1" class="form-control select2" multiple style="width: 100%;">
                                            @foreach ($scales as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Workouts</label>
                                        <select name="workouts[`SrNo`][1][]" id="workout_`SrNo`_1" class="form-control select2" multiple style="width: 100%;">
                                            @foreach ($workouts as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Attachment</label>
                                        <input type="file" name="attachment[`SrNo`][1][]" class="form-control" multiple>
                                    </div>
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
    <div class="row">
        <div class="col-sm-2 mt-2">
            Step `SrNo~1`
            <input type="hidden" name="step_id[[`SrNo`][]" value="">
        </div>
        <div class="col-sm-10">
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="step_name[`SrNo`][]" class="form-control" placeholder="Step Name">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="step_description[`SrNo`][]" class="form-control" placeholder="Step Description">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Scales</label>
                            <select name="scales[`SrNo`][`SrNo~1`][]" id="scale_`SrNo`_`SrNo~1`" class="form-control select2" multiple style="width: 100%;">
                                @foreach ($scales as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Workouts</label>
                            <select name="workouts[`SrNo`][`SrNo~1`][]" id="workout_`SrNo`_`SrNo~1`" class="form-control select2" multiple style="width: 100%;">
                                @foreach ($workouts as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Attachment</label>
                            <input type="file" name="attachment[`SrNo`][`SrNo~1`][]" class="form-control" multiple>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="https://bevacqua.github.io/dragula/dist/dragula.js"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/forms/select/select2.min.js') }}"></script>
    <script>
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
        let index = {{ (old('stage_name') ? count(old('stage_name')) : $program->stages->count()) }};
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
            section_number = parseInt(section_number) + 1;
            content = content.replace(/`SrNo`/gi, page);
            content = content.replace(/`SrNo~1`/gi, section_number);
            console.log($(this).parent().parent().parent().find('.step-div'));
            $(this).parent().parent().parent().find('.step-div').append(content);
            $('#scale_'+ page +'_' + section_number).select2();
            $('#workout_'+ page +'_' + section_number).select2();
        });

        $(document).on('click', '.delete-stage', function(e) {
            e.preventDefault();
            $(this).closest('.card').remove();
        });

        $(document).on('click', '.add-value', function(e) {
            e.preventDefault();
            $(this).parent().parent().parent().parent().find('.comment').toggleClass('d-none');
        });

    </script>
@endsection