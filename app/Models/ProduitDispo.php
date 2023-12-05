<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitDispo extends Model
{
    use HasFactory;
    protected $fillable = ['quantite','prix_unitaire'];

    public function fournisseur() {
        return $this->belongsTo(\App\Models\Fournisseur::class);
    }
    public function product() {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
