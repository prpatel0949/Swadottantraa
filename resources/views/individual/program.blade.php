@extends('individual.layouts.app')

@section('title', 'Programs')

@section('css')
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    	<div class="content-header row">
		    <div class="content-header-left col-md-9 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">My Programs</h2>
		            </div>
		        </div>
		    </div>
		</div>
    	<div class="content-body">
    		<section>
                <div class="row match-height">
                    @foreach ($programs as $program)
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media">
                                            <img src="../assets/dashboard/images/pages/content-img-1.jpg" class="rounded mr-75" alt="profile image" height="64" width="64">
                                            <div class="media-body mt-75">
                                                <h5>{{ $program->prog_name }}</h5>
                                                <p class="card-text  mb-0">{{ $program->prog_desc }}</p>
                                            </div>
                                            <div class="card-btns d-flex justify-content-between mt-2">
                                                @if ($program->is_subcribe)
                                                    <a href="{{ route('individual.program.access', $program->id) }}" class="btn btn-success text-white subscribe-btn">Access</a>
                                                @else
                                                    <button type="button" data-program="{{ $program }}" class="btn btn-primary text-white subscribe-btn">Subscribe</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
    	</div>
    </div>
</div>

@endsection

@section('js')
    {{-- <script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="##B61B68" bolt-logo="" ></script> --}}
    <script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="##B61B68" bolt-logo="" ></script>
    <script>
        $(document).on('click', '.subscribe-btn', function() {
            let program = JSON.parse($(this).attr('data-program'));
            console.log(program);
            let timestamp = new Date().getTime() + '/' + program.id;
            $.ajax({
                url: '{{ route("generate.hash") }}',
                method: 'POST',
                data: { '_token': '{{ csrf_token() }}', program: program, timestamp: timestamp },
                success: function (res) {
                    bolt.launch({
                        key: '{{ config("payu.merchant_key") }}',
                        txnid: timestamp, 
                        hash: res,
                        amount: program.amount,
                        firstname: '{{ Auth::user()->name }}',
                        email: '{{ Auth::user()->email }}',
                        phone: '{{ Auth::user()->mobile }}',
                        productinfo: program.prog_name,
                        udf5: 1,
                        surl : '{{ route("payment.response") }}',
                        furl: '{{ route("payment.response") }}',
                        mode: 'dropout'	
                    }, { 
                        responseHandler: function(BOLT) {
                            console.log( BOLT.response.txnStatus );		
                            if(BOLT.response.txnStatus != 'CANCEL')
                            {
                                //Salt is passd here for demo purpose only. For practical use keep salt at server side only.
                                var fr = '<form action="{{ route("payment.response") }}" method=\"post\">' +
                                '<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
                                '<input type=\"hidden\" name=\"salt\" value="XxYwqjRuJA" />' +
                                '<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
                                '<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
                                '<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
                                '<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
                                '<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
                                '<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
                                '<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
                                '<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
                                '<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
                                '</form>';
                                var form = jQuery(fr);
                                jQuery('body').append(form);								
                                form.submit();
                            }
                        }, catchException: function(BOLT){
                            alert( BOLT.message, BOLT.response );
                        }
                    });
                }
            });
        });
    </script>
@endsection