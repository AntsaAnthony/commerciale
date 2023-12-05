@extends('commercial.base')

@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
@csrf    
  <div class="section-block">
      <h5 class="section-title">Besoins en attente de validation : </h5>
  </div>
  <div class="accrodion-outline">
        @error('error')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror

        @if(count($besoins)==0)
            <style>
                .footer{
                    display : none;
                }
            </style>
            <center><p>Il n'y a aucune demande de validation pour l'instant.</p></center>
        @endif
@for ($i = 0; $i < count($besoins); $i++)
      <div id="accordion{{$i}}">
          <div class="card">
              <div class="card-header" id="headingFour">
                  <h5 class="mb-0">
                     <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour{{ $i }}" aria-expanded="true" aria-controls="collapseFour{{ $i }}">
                        {{$besoins[$i]->service}}
                     </button>
                    </h5>
              </div>
              <div id="collapseFour{{ $i }}" class="collapse" aria-labelledby="headingFour" data-parent="#accordion{{ $i }}">
                  <div class="card-body">
                      <p class="lead"> Le service "{{$besoins[$i]->service}}" a besoin de {{$besoins[$i]->produit}}</p>
                      <p> Quantite : {{$besoins[$i]->quantity}}</p>
                      <a href="{{route('comm.besoin.valider')}}?id={{$besoins[$i]->id}}" class="btn btn-secondary">Valider</a>
                  </div>
              </div>
          </div>
@endfor 
        </div>
    </div>
  </div>
@endsection
@section('titre')
    Validation Besoins
@endsection