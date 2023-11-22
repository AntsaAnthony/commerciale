<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    use HasFactory;
    protected $fillable = ['fournisseur_id', 'demande_proforma_id', 'mode_paiement', 'etat'];

    public static function envoyerProforma($idFournisseur, $idDemandeProforma, $modePaiement)
    {
        $proforma = Proforma::create([
            'fournisseur_id' => $idFournisseur,
            'demande_proforma_id' => $idDemandeProforma,
            'mode_paiement' => $modePaiement,
            'etat' => 1
        ]);
        $proforma->envoyerLeProforma();
    }

    // Tonga de mi-inserer an'ilay demande proformat sy ny nonbre ana quandite ilainy fotsiny
    public function envoyerLeProforma()
    {
        $detaiProformat = $this->getProduitDispoParDemande();
        foreach ($detaiProformat as $detaiProform) {
            ProformaDetail::create([
                'proforma_id' => $this->id,
                'produit_dispo_id' => $detaiProform->id
            ]);
        }
    }

    public function getProduitDispoParDemande()
    {
        $demande = DemandeProforma::where('id', $this->demande_proforma_id)->first();
        $detailsDemande = $demande->getTousDetailDemande();
        echo ("idFournisseur: " . $this->fournisseur_id);
        $allProduct = ProduitDispo::where('fournisseur_id', $this->fournisseur_id)->get();
        $productDispo = array();
        // dd($detailsDemande);
        foreach ($detailsDemande as $detail) {
            foreach ($allProduct as $produit) {
                echo ($detail->product->id . "-------" . $produit->id);
                if ($detail->product->id == $produit->id) {
                    array_push($productDispo, $produit);
                }
            }
        }
        return $productDispo;
    }

    public static function getProduitDispo($proforma, $idProduit)
    {
        $produiDispos = $proforma->getProduitDispoParDemande();
        foreach ($produiDispos as $dispo) {
            if ($dispo->id == $idProduit) {
                return $dispo;
            }
        }
    }

    public static function getMoinDisantProduit($proformas, $product)
    {
        $min = $proformas[0];
        $disp = Proforma::getProduitDispo($proformas[0], $product->id);
        foreach ($proformas as $proforma) {
            $produiDispo = Proforma::getProduitDispo($proforma, $product->id);
            if ($produiDispo->prix_unitaire < $disp->prix_unitaire) {
                $min = $proforma;
                $disp = $produiDispo;
            }
        }
        return $min;
    }

    public static function getMoinDisantParProduit($proformas, $products)
    {
        $moinsDisants = array();
        foreach ($products as $product) {
            $moinsDisant = new MoinDisant();
            $temp = Proforma::getMoinDisantProduit($proformas, $product);
            $moinsDisant->product = $product;
            $moinsDisant->proformat = $temp;
            array_push($moinsDisants, $moinsDisant);
        }
        return $moinsDisants;
    }

    public function fournisseur()
    {
        return $this->belongsTo(\App\Models\Fournisseur::class);
    }
    public function demandeProformat()
    {
        return $this->belongsTo(\App\Models\DemandeProforma::class);
    }
}
