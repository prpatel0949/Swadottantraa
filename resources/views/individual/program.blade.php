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

        @if (empty(Auth::user()->last_checked_at))
        <div class="alert alert-warning">
            It's good to keep Rechecking your Status regularly. <a href="{{ route('happiness') }}" target="_blank">Click here</a>
        </div>
        @elseif (checkProgram() > 7 && checkProgram() < 14)
            <div class="alert alert-warning">
                It's good to keep Rechecking your Status regularly. <a href="{{ route('happiness') }}" target="_blank">Click here</a>
            </div>

        @elseif (checkProgram() >= 14)
            <div class="alert alert-danger">
                It's High Time to Recheck your Status. <a href="{{ route('happiness') }}" target="_blank">Click here</a>
            </div>
        @endif

    	<div class="content-body">
    		<section>
                <div class="row match-height">
                    @foreach ($programs as $program)
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media">
                                            <img src="{{ Storage::url($program->image) }}" class="rounded mr-75" alt="profile image" height="64" width="64">
                                            <div class="media-body mt-75">
                                                <h5>{{ $program->title }}</h5>
                                                <p class="card-text  mb-0">{{ $program->description }}</p>
                                            </div>
                                            <div class="card-btns d-flex justify-content-between mt-2">
                                                @if ($program->is_subcribe)
                                                    <a href="{{ route('individual.program.access', $program->id) }}" class="btn btn-success text-white subscribe-btn">Access</a>
                                                @else
                                                    <button type="button" data-program="{{ $program }}" class="btn btn-primary text-white show-program">Subscribe</button>
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

<div class="modal fade" id="add_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title model_program_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <img src="" class="img-responsive model_program_image" style="width: 100%">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="model_program_description"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span><b>Length: </b></span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <strong class="model_program_length">1 Hour</strong>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group mb-3">
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">Program Price</h6>
                                        </div>
                                        <span class="text-muted">₹<span class="model_program_price">0.00</span></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="text-success">
                                            <h6 class="my-0">Coupon code</h6>
                                            <small class="modal_coupon_code"></small>
                                        </div>
                                        <span class="text-success">₹<span class="discount_price">0.00</span></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total Payable</span>
                                        <strong>$<span class="modal_program_payable">0.00</span></strong>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Coupon code">
                                    <div class="input-group-append">
                                      <button type="button" class="btn btn-primary apply-code" data-button-spinner="Processing...">Apply</button>
                                    </div>
                                </div>
                                <span class="coupon-message"></span>
                            </div>
                        </div>
                    </div>         
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="coupon_id" id="coupon_id" value="">
                            <button type="button" name="" class="btn btn-primary subscribe-btn">Pay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="##B61B68" bolt-logo="" ></script>
    {{-- <script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="##B61B68" bolt-logo="" ></script> --}}
    <script>
        let selected_program;
        let coupon = {};
        $(document).on('click', '.subscribe-btn', function() {
            let timestamp = new Date().getTime() + '/' + selected_program.id;
            let cost = parseFloat(selected_program.cost);
            if (coupon.id) {
                timestamp += '/' + coupon.id;
                discount = (parseFloat(selected_program.cost) * parseFloat(coupon.discount)) / 100;
                cost = parseFloat(selected_program.cost) - parseFloat(discount);
            }
            $.ajax({
                url: '{{ route("generate.hash") }}',
                method: 'POST',
                data: { '_token': '{{ csrf_token() }}', program: selected_program, timestamp: timestamp, cost: cost.toFixed(2) },
                success: function (res) {
                    bolt.launch({
                        key: '{{ config("payu.merchant_key") }}',
                        txnid: timestamp, 
                        hash: res,
                        amount: cost.toFixed(2),
                        firstname: '{{ Auth::user()->name }}',
                        email: '{{ Auth::user()->email }}',
                        phone: '{{ Auth::user()->mobile }}',
                        productinfo: selected_program.title,
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
                                '<input type=\"hidden\" name=\"coupon_id\" value=\"'+coupon.id+'\" />'+
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

        $(document).on('click', '.show-program', function (e) {
            e.preventDefault();
            let program = $(this).attr('data-program');
            program = JSON.parse(program);
            selected_program = program;
            let image = '{{ Storage::url(":image") }}'; 
            image = image.replace(':image', program.image);
            let time = program.time.split('-');
            let length = time[2] + ' Days ' + time[1] + ' Hours ' + time[0] + ' Minutes';
            $('.model_program_image').attr('src', image);
            $('.model_program_description').html(program.description);
            $('.model_program_price').html(program.cost);
            $('.modal_program_payable').html(program.cost);
            $('.model_program_title').html(program.title);
            $('.model_program_length').html(length);
            $('#add_modal').modal('show');
            $('.apply-message').addClass('d-none');
            $('#coupon_code').val('');
            $('.coupon-message').removeClass('text text-success');
            $('.coupon-message').removeClass('text text-danger');
            $('.coupon-message').html('');
            $('#coupon_id').val('');
        });

        $(document).on('click', '.apply-code', function (e) {
            e.preventDefault();
            coupon = {};
            $('.coupon-message').removeClass('text text-success');
            $('.coupon-message').removeClass('text text-danger');
            $('#coupon_id').val('');
            $('.coupon-message').html('');
            var $this = $(this);
            $this.data("ohtml", $this.html());
            var nhtml = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> " + this.dataset.buttonSpinner;
            $this.html(nhtml);
            $this.attr("disabled", true);
            $.ajax({
                url: '{{ route("coupon.apply") }}',
                method: 'POST',
                data: { '_token': '{{ csrf_token() }}', 'code': $('#coupon_code').val() },
                success: function (res) {
                    coupon = res.code;
                    $('.coupon-message').addClass('text text-success');
                    $('.coupon-message').html('Coupon Code apply successfully.');
                    $('.apply-message').removeClass('d-none');
                    $this.html($this.data("ohtml"));
                    $this.attr("disabled", false);
                    let discount = res.code.discount;
                    discount = (isNaN(discount) || discount == '' ? 0 : discount);
                    let amount = $('.model_program_price').html();
                    amount = (isNaN(amount) || amount == '' ? 0 : amount);
                    let discount_amount = (parseFloat(amount) * parseFloat(discount)) / 100;
                    $('.discount_price').html(discount_amount.toFixed(2));
                    let payable = parseFloat(amount) - parseFloat(discount_amount);
                    $('.modal_program_payable').html(payable.toFixed(2));
                    $('#coupon_id').val(res.code.id);

                }, error: function (error) {
                    $('#coupon_id').val('');
                    console.log(error);
                    if (error.status == 422) {
                        $('.coupon-message').addClass('text text-danger');
                        $('.coupon-message').html(error.responseJSON.errors.code[0]);
                    } else {
                        $('.coupon-message').addClass('text text-danger');
                        $('.coupon-message').html(error.responseJSON.message);
                    }
                    $this.html($this.data("ohtml"));
                    $this.attr("disabled", false);
                }
            });

        });

    </script>
@endsection