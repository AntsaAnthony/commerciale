@extends('commercial.base')

@section('content')
    <div class="row">
        <form action="{{ route('comm.besoin') }}" method="post">
            @csrf
            <select name="service_id" id="">
                @foreach ($service as $services )
                <option value="{{$services->id}}">{{$services->name}}</option>
                @endforeach
            </select>
            <select name="product_id" id="">
                @foreach ($products as $product )
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
            <input type="number" name="quantity" id="" placeholder="quantite">
            <input type="submit" value="submit">
        </form>

    </div>

@endsection
