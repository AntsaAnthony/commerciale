<?php

namespace App\Http\Controllers;

use App\Models\DemandeProforma;
use App\Models\Proforma;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index() {
        $demande = DemandeProforma::whereNotIn('id', function ($query) {
            $query->select('demande_proforma_id')->from('proformas');
        })->get();
        return view('fournisseur.index', [
            'demandes' => $demande
        ]);
    }

    public function envoyerProformat(DemandeProforma $demande) {
        Proforma::envoyerProforma($demande->fournisseur->id, $demande->id, 'Cheque');
        return redirect()->route('fournisseur.index');
    }
}
