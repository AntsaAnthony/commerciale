@extends('commercial.base')    

@section('content')
    @csrf    
    @error('fournisseur')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Besoins groupés par nature</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if($besoins==null)
                            <br>
                            <center><p>Il n'y a aucun besoin pour le moment.</p></center>
                            <br>
                        @else
                        <table class="table">
                        <thead class="bg-light">
                            <tr class="border-0">
                                <th class="border-0">Nom produit</th>
                                <th class="border-0">Quantit&eacute;</th>
                                <th class="broder-0"></th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($besoins as $besoin)
                                <tr>
                                    <td>{{$besoin->product->name}}</td>
                                    <td>{{$besoin->quantity}}</td>
                                    <td colspan="1"><a href="#" class="btn btn-outline-light float-right">D&eacute;tails</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" id="btnPopup">Demander proforma</button>
            </div>
            <div class="popup" id="popup">
                <div class="popup-content">
                    <span class="close" id="close">&times;</span>
                    <br>
                    <br>
                    <center><h3>Selectionnez 3 fournisseurs</h3></center>
                    <form id="validationform" data-parsley-validate="" novalidate="" action="{{ route('comm.insertProforma') }}" method="get">
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <center>
                                @foreach ($fournisseurs as $fournisseur )
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" value="{{$fournisseur->id}}" name="fournisseur[]"><span class="custom-control-label">{{$fournisseur->nom}}</span>
                                    </label>
                                    @endforeach
                                </center>
                                <br>
                                <center><button type="submit" class="btn btn-rounded btn-secondary">Demander</button></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

@section('titre')
    Liste besoins
@endsection