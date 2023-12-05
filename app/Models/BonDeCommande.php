<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BonDeCommande extends Model
{
    use HasFactory;
    protected $fillable=[
        'tva','etat','proforma_id'
    ];

    public function valideBonDeCommande() {
        $user = Auth::user();
        if($user->auth_level >= env('ADMIN_LEVEL')){
            $this->etat = 10;
            $this->save();
        }
    }
    public function CalculPrix($idproduit){
        $Quantite = Besoin::where('product_id','=',$idproduit)->where('etat','=',1)->get('quantity');
        $PrixProduit = ProduitDispo::where('id','=',$idproduit)->get('pris_unitaire');

        $totalPrix = (float)$Quantite * (float)$PrixProduit;
        return $totalPrix;
    }
    public function tva($idproduit){
        $formul=0;
        $val=0;
        $formul=(100+20)/100;
        $prix=$this->CalculPrix($idproduit);
        $val=$prix*$formul;
        return $val;
    }
    public function proformabesoin($idproduit){
        $proforma= Proforma::get('demandeproforma_id');
    }

    public function Besoin(){
        return $this->belongsTo(\App\Models\Besoin::class);
    }
    public function proforma() {
        return $this->belongsTo(\App\Models\Proforma::class);
    }
}
