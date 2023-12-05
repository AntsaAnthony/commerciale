<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeProforma extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','fournisseur_id','etat'];
    /* 0=vo nalefa,  1=lasa ilay proforma*/

    public static function newProformaDemande($idUser,$idFourniseur)
    {
        return DemandeProforma::create([
            'user_id' => $idUser,
            'fournisseur_id' => $idFourniseur,
        ]);
    }

    public static function addDemandeProforma($allBesoinValider,$idUser,$idFourniseur)
    {
        $allBesoin = Besoin::getBesoinParNature();
        if(count($allBesoinValider)<=0)
        {
            return redirect()->back()->withErrors([
                'error' => 'Aucun besoin validé'
            ]);
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

            }
        }
    }
    public static function addAllDemandeProforma($idUser,$fournisseur){
        $allBesoinValider = Besoin::where('etat','=',1)->get();
        foreach($fournisseur as $idFourniseur){
            DemandeProforma::addDemandeProforma($allBesoinValider,$idUser,$idFourniseur);
        }
        foreach($allBesoinValider as $besoin){
            $besoin->etat = 2;
            $besoin->save();
        }
    }

    public function getTousDetailDemande()
    {
        $details = DetailProformaDemande::where('demande_proforma_id','=',$this->id)->get();
        return $details;
    }

    public static function getDemandeParFournisseur($fournisseur_id)
    {
        $demandes = DemandeProforma::where('fournisseur_id','=',$fournisseur_id)->where('etat','=',0)-> get();
        return $demandes;
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function fournisseur() {
        return $this->belongsTo(\App\Models\Fournisseur::class);
    }
}
