@extends('fournisseur.base')

@section('content')

    @if(count($demandes)==0)
        <style>
            .footer{
                display : none;
            }
        </style>
        <center><p>Aucune demande de proforma pour le moment.</p></center>
    @else
        @foreach ($demandes as $demande)
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample{{$demande->id}}" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardExample{{$demande->id}}">
                    <h6 class="m-0 font-weight-bold text-primary">Demande de la part de <strong>{{ $demande->user->name }}</strong></h6>
                </a>
                <!-- Card Content - Collapse -->
                
                <div class="collapse" id="collapseCardExample{{$demande->id}}">
                    <div class="card-body">
                        @php
                            $details = $demande->getTousDetailDemande();
                        @endphp
                        @foreach ($details as $detail)
                            <div class="card mb-4 py-3 border-bottom-warning">
                                <div class="card-body">
                                    {{ $detail->product->name }}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
                <!-- <a href="#" class="btn btn-block btn-secondary">Previsualier proforma</a> -->
                <a href="{{ route('fournisseur.envoyerProforma',$demande) }}" class="btn btn-block btn-primary">Envoyer proforma</a>
            </div>
        @endforeach
    @endif
@endsection
