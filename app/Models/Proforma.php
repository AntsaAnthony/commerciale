<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    use HasFactory;
    protected $fillable = ['fournisseur_id','demande_proforma_id','mode_paiement','etat'];

    public static function envoyerProforma($idFournisseur,$idDemandeProforma,$modePaiement){
        $proforma = Proforma::create([
            'fournisseur_id'=>$idFournisseur,
            'demande_proforma_id'=>$idDemandeProforma,
            'mode_paiement'=>$modePaiement,
            'etat'=> 1
        ]);
        $proforma->envoyerLeProforma();
    }
    
    // Tonga de mi-inserer an'ilay demande proformat sy ny nonbre ana quandite ilainy fotsiny
    public function envoyerLeProforma()
    {
        $detaiProformat = $this->getProduitDispoParDemande();
        foreach($detaiProformat as $detaiProform)
        {
            ProformaDetail::create([
                'proforma_id'=> $this->id,
                'product_dispo_id'=> $detaiProform->id
            ]);
        }
    }

    public function getProduitDispoParDemande()
    {
        $demande = DemandeProforma::where('id',$this->demande_proforma_id)->first();
        $detailsDemande = $demande->getTousDetailDemande();
        echo("idFournisseur: ".$this->fournisseur_id);
        $allProduct = ProduitDispo::where('fournisseur_id',$this->fournisseur_id);
        $productDispo = array();
        dd($allProduct);
        foreach ($detailsDemande as $detail) 
        {
            foreach ($allProduct as $produit) 
            {
                echo($detail->product->id+"-------"+product->product->id);
                if($detail->product->id==product->product->id)
                {
                    array_push($productDispo,$produit);
                }
            }
        }
        dd($productDispo);
        return $productDispo;
    }
    public function fournisseur() {
        return $this->belongsTo(\App\Models\Fournisseur::class);
    }
    public function demandeProformat() {
        return $this->belongsTo(\App\Models\DemandeProforma::class);
    }
}
