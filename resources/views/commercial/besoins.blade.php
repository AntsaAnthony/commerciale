@extends('commercial.base')

@section('content')

@foreach ($besoins as $besoin)
    <div class="row">
        <div class="col-lg-6">
        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
            </div>
            <div class="card-body">
                <p>{{ $besoin->product->name }}</p>
                <p>Quantité : {{ $besoin->quantity }}</p>
                <hr>
            </div>
        </div>
    </div>

</div>
@endforeach
@endsection

