@extends('fournisseur.base')

@section('content')
    @foreach ($demandes as $demande)
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample{{$demande->id}}" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample{{$demande->id}}">
                <h6 class="m-0 font-weight-bold text-primary">Demande de la part de <strong>{{ $demande->user->name }}</strong></h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample{{$demande->id}}">
                <div class="card-body">
                    This is a collapsable card example using Bootstrap's built in collapse
                    functionality. <strong>Click on the card header</strong> to see the card body
                    collapse and expand!
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
                    <a href="{{ route('fournisseur.envoyerProforma',$demande) }}" class="btn btn-primary">Envoyer proformat</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
