@extends("base")

@section("content")
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="section-block">
        <h5 class="section-title">Envoyer proforma à</h5>
        <p>Une liste pour envoyer un proforma vers un client</p>
    </div>
    {{--  <div class="accrodion-regular">
        <div id="accordion3">
            @for($i = 0;$i< 10; $i++)
                <div class="card mb-2">
                    <div class="card-header" id="heading{{$i}}">
                        <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">
                            <span class="fas fa-angle-down mr-3"></span>Accordion Heading Title Here
                        </button>       </h5>
                    </div>
                    <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordion3">
                        <div class="card-body">
                            <p class="lead"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</p>
                            <a href="#" class="btn btn-primary btn-block">Valider</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>  --}}
    </div>
</div>
{{--  {{ count($demandes) }}
{{ $detailFsseur }}  --}}
@for ($i = 0; $i < count($demandes); $i++)
    User ehhhh{{ Auth::user() }}
    <div class="lolo">
        <p>Proforma pour: {{ $detailFsseur->user->name }}</p>
        {{--  <p>{{ $demandes[$i] }}</p>  --}}
        <a href="{{ route("comm.proformas_send", 
            [
                'fournisseur_id'=> $detailFsseur->fournisseur_id,
                'demandeProforma_id'=> $demandes[$i]->id,
                'modepaiement'=>'cheque'
            ]) }}"><button>Envouyer</button></a>
    </div>
@endfor


@endsection


@section("titre")
    Liste Proformat
@endsection