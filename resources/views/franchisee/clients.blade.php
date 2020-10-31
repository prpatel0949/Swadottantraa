@extends('franchisee.layouts.app')

@section('title', 'Clients')


@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    	<div class="content-header row">
		    <div class="content-header-left col-md-9 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">Client List</h2>
		            </div>
		        </div>
		    </div>
		</div>
    	<div class="content-body">

            @include('individual.includes.message')

    		<section>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 float-right d-flex">
                            <button data-toggle="modal" data-target="#add_modal" class="btn btn-primary pl-1 pr-1 mr-2" style="width:200px"><i class="fa fa-plus mr-1"></i> Add Client</button>
                            <input class="form-control search" placeholder="Search..." />
                        </div>
                        <div id="table_data">
                            @include('franchisee.client_list')
                        </div>
                    </div>
                </div>
            </section>
    	</div>
    </div>
</div>

<div class="modal fade" id="add_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invitation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="modal-body" method="POST" action="{{ route('franchisee.client.invite') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="controls">
                                <label for="">Email </label>
                                <input type="text" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Send Invitation</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
    <script>
        $(function() {
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault(); 
                var page = $(this).attr('href').split('page=')[1];
                    fetch_data(page);
                });

                function fetch_data(page) {
                $.ajax({
                    url:"{{ route('franchisee.clients') }}?page=" + page,
                    success:function(data) {
                        $('#table_data').html(data);
                    }
                });
            }
        });

        $(document).on('keyup', '.search', function(e) {
            e.preventDefault();
            let search = $(this).val();
            $.ajax({
                url:"{{ route('franchisee.clients') }}?search=" + search,
                success:function(data) {
                    $('#table_data').html(data);
                }
            });
        });
    </script>
@endsection