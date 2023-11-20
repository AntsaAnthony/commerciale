<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProformaDemande extends Model
{
    use HasFactory;
    protected $fillable = ['demande_proforma_id','product_id'];

    public function demandeProformat()
    {
        return $this->belongsTo(\App\Models\DemandeProforma::class);
    }
    public function product() {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
