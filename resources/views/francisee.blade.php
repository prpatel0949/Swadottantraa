@foreach ($franchisees as $franchisee)
<div class="row">
    <div class="card col-lg">
        <div class="card-body">
            <h5 class="card-title">{{ $franchisee->name }}</h5>
            <small>
                {{ $franchisee->address }}, <br>
                {{ $franchisee->state->name }},
                {{ $franchisee->city->name }},<br>
                {{ $franchisee->mobile }}
            </small>
        </div>
    </div>
</div>
@endforeach