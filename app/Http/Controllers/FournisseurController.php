<?php

namespace App\Http\Controllers;

use App\Models\DemandeProforma;
use App\Models\Proforma;
use App\Models\Fournisseur;
use App\Models\DetailFournisseur;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index() {

        return view ('fournisseur.index');
    }

    public function showDemandeProformas(){
        $fournisseur = DetailFournisseur::where('user_id','=',Auth::user()->id)->get();
        $demande=$fournisseur[0]->getMesDemandeProforma();
        return view ('fournisseur.demandeproformas',[
            'demandes' => $demande
        ]);
    }

    public function envoyerProformat(DemandeProforma $demande) {
        Proforma::envoyerProforma($demande->fournisseur->id, $demande->id, 'Cheque');
        return redirect()->route('fournisseur.index');
    }
}
