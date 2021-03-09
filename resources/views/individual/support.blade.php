@extends('individual.layouts.app')

@section('title', 'Support')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
		<div class="content-header row">
		    <div class="content-header-left col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Support</h2>
		            </div>
		        </div>
		    </div>
        </div>
        
        <div class="content-body">
    		<div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <p>Most of your questions are already answered. please, <a href="{{ route('support.faqs', Request::segment(3)) }}" target="_blank">click here</a></p>
                    </div>
                </div>
            </div>
        </div>

    	<div class="content-body">
    		<div class="card">
                <div class="card-content">
                    <div class="card-body">

                        @include('individual.includes.message')

                        <form method="POST" action="{{ route('support.store') }}">
                            @csrf
                            <input type="hidden" name="type" value="{{ (Request::segment(3) == 'technical' ? 0 : 1) }}">
                        <div class="row">
                        	<div class="col-sm-8">
                        		<div class="form-group">
                                    <div class="controls">
                                        <label for="description">Your Message</label>
                                        <textarea type="text" class="form-control" name="description" rows="5" maxlength="200" id="description" placeholder="Your Message"></textarea>
                                        <span id="rchars">200</span> <small>characters remaining</small>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        	</div>
                        	<div class="col-sm-8 d-flex flex-sm-row flex-column justify-content-end">
                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Submit</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
    		<div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-hover" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>SrNo</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($supports as $index => $support)
                                            <tr data-id="{{ $support }}">
                                                <td class="details-control" style="cursor: pointer">{{ $index + 1 }}</td>
                                                <td>{{ $support->description }}</td>
                                                <td>
                                                    @if ($support->status == 0)
                                                        <label class="badge badge-warning">In Progress</label>
                                                    @else
                                                        <label class="badge badge-success">Close</label>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>
    var lastRow;
    let table = $('#tbl').DataTable();
    var maxLength = 200;
    $('#description').keyup(function() {
        var textlen = maxLength - $(this).val().length;
        $('#rchars').text(textlen);
    });

    $(document).on('click', '#tbl tbody td.details-control', function(){
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        if(lastRow != undefined && lastRow.otd!=this) {
            lastRow.otr.removeClass('details');
            lastRow.orow.child.hide();
        }

        lastRow = { otr : tr, orow: row, otd : this  };
        if ( row.child.isShown() ) {
            tr.removeClass('details');
            row.child.hide();
        } else {
            var id = $(this).parent('tr').attr('data-id');
            GetChiledHTML(id, function(oHtml) {
                tr.addClass( 'details' );
                row.child($(oHtml)).show();
            });
        }
    });

    function GetChiledHTML(id, returnFunction) {
        let data = JSON.parse(id);
        let oHtml = '<p>'+ (data.answer == null ? '' : data.answer) +'</p>';
        returnFunction(oHtml);
    }
</script>

@endsection
