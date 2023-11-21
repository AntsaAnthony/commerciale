<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BonDeCommande extends Model
{
    use HasFactory;

    public function valideBonDeCommande() {
        $user = Auth::user();
        if($user->auth_level >= env('ADMIN_LEVEL')){
            $this->etat = 10;
            $this->save();
        }
    }

    public function proforma() {
        return $this->belongsTo(\App\Models\Proforma::class);
    }
}
