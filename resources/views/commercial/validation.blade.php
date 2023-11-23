@extends('commercial.base')

@section('content')
@error('error')
    {{$message}}
@enderror
    <div class="row">
        @foreach($besoins as $besoin)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Service {{$besoin->service}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$besoin->service}} : {{$besoin->quantity}} unite(s)</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                            <a href="{{route('besoin.valider')}}?id={{$besoin->id}}" class="btn btn-success btn-circle"><i class="fas fa-check text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection
