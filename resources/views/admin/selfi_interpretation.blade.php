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
		                <h2 class="content-header-title float-left mb-0">Selfi Program Interpretation</h2>
		            </div>
		        </div>
            </div>
            <div class="col-sm-3 col-12">
                <div class="form-group float-right">
                    <button type="button" class="btn btn-primary add-stage">Add</button>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('selfi.interpretation.update') }}" id="addForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        
                        @if (isset($inters) && $inters->count() > 0)
                            @foreach ($inters as $item)
                                <div class="row interpretation-row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="hidden" name="id[]" value="{{ $item->id }}" >
                                            <input type="number" class="form-control" value="{{ $item->min }}" name="min[]" placeholder="Minimun Value" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="number" class="form-control" value="{{ $item->max }}" name="max[]" placeholder="Maximum Value" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{ $item->interpretation }}" name="interpretation[]" placeholder="Interpretation" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="hidden" name="id[]" value="" >
                                        <input type="number" class="form-control" name="min[]" placeholder="Minimun Value" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="max[]" placeholder="Maximum Value" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="interpretation[]" placeholder="Interpretation" required>
                                    </div>
                                </div>
                                
                            </div>
                        @endif

                        <div class="inter-div"></div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" name="" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="inter-section" style="display: none">
    <div class="row interpretation-row">
        <div class="col-sm-3">
            <div class="form-group">
                <input type="hidden" name="id[]" value="" >
                <input type="number" class="form-control" name="min[]" placeholder="Minimun Value" required>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="number" class="form-control" name="max[]" placeholder="Maximum Value" required>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" name="interpretation[]" placeholder="Interpretation" required>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <a href="#" class="delete-scale"><i class="fa fa-trash fa-2x"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        $(document).on('click', '.add-stage', function (e) {
            e.preventDefault();
            $('.inter-div').append($('#inter-section').html());
        });

        $(document).on('click', '.delete-scale', function (e) {
            e.preventDefault();
            $(this).closest('.interpretation-row').remove();
        });
    </script>
@endsection