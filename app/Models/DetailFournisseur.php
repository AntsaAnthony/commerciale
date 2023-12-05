<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailFournisseur extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','fournisseur_id'];

    public function getMesDemandeProforma()
    {
        DemandeProforma::whereNotIn('id',function($query){
            $query->select('demande_proforma_id')->from('proformas');
        });
        $demandes = DemandeProforma::whereNotIn('id',function($query){
            $query->select('demande_proforma_id')->from('proformas');
        })->where('fournisseur_id','=',$this->fournisseur->id)->get();
        return $demandes;
    }



    public function fournisseur() {
        return $this->belongsTo(\App\Models\Fournisseur::class);
    }
    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }
}
