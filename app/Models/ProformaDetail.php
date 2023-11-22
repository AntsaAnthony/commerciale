<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProformaDetail extends Model
{
    use HasFactory;
    protected $fillable =['proforma_id','produit_dispo_id']; 


}
