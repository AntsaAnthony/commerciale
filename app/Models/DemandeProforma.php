<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeProforma extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','fournisseur_id'];

    public static function newProformaDemande($idUser,$idFourniseur)
    {
        return DemandeProforma::create([
            'user_id' => $idUser,
            'fournisseur_id' => $idFourniseur,
        ]);
    }
    
    public static function addDemandeProforma($idUser,$idFourniseur)
    {
        $allBesoin = Besoin::getBesoinParNature();
        $allBesoinValider = Besoin::where('etat','=',1)->get();
        if(count($allBesoinValider)<=0)
        {
            echo("Tsy nisy ehhhh");
            throw new \Exception("Aucun besoin valider");
        }
        else
        { 
            $demProf = DemandeProforma::newProformaDemande($idUser,$idFourniseur);
            echo("</br> Nisy ehhhh");
            $allDetaiProforma = array();
            foreach ($allBesoin as $besoin)
            {
                $detProf = DetailProformaDemande::create([
                    'demande_proforma_id'=> $demProf->id,
                    'product_id'=> $besoin->product->id
                ]);

                echo $detProf;
            }
            foreach ($allBesoinValider as $besoinValider)
            {
                $besoinValider->etat = 2;
                $besoinValider->save();
            }
        }
    }

    
    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function fournisseur() {
        return $this->belongsTo(\App\Models\Fournisseur::class);
    }
}
