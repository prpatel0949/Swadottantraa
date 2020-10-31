@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible mb-5" role="alert">
        <span>{{ Session::get('success') }}</span>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-warning alert-dismissible mb-5" role="alert">
        <span>{{ Session::get('error') }}</span>
    </div>
@endif