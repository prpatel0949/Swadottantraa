@extends('franchisee.layouts.app')

@section('title', 'Support')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
		<div class="content-header row">
		    <div class="content-header-left col-md-9 col-12 mb-2">
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

                        @include('franchisee.includes.message')

                        <form method="POST" action="{{ route('franchisee.support.store') }}">
                            @csrf
                        <div class="row">
                        	<div class="col-sm-8">
                        		<div class="form-group">
                                    <div class="controls">
                                        <label for="description">Your Message</label>
                                        <textarea type="text" class="form-control" name="description" rows="5" id="description" placeholder="Your Message"></textarea>
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
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>SrNo</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($supports as $index => $support)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
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
    var maxLength = 200;
    $('#description').keyup(function() {
        var textlen = maxLength - $(this).val().length;
        $('#rchars').text(textlen);
    });
</script>

@endsection