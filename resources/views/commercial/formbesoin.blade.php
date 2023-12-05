@extends('commercial.base')

@section('content')
<div class="row">
    <div class="col-lg-12   ">
        <div class="card">
            <div class="card-body">
                <form id="validationform" data-parsley-validate="" novalidate="" action="{{ route('comm.besoin') }}" method="post">
                    @csrf    
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Service</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="service_id">
                            @foreach ($services as $service )
                                <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Produits</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="product_id">
                            @foreach ($products as $product )
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Quantit&eacute;</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" required="" placeholder="Quantité" class="form-control" name="quantity">
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('titre')
    Insertion Besoins
@endsection