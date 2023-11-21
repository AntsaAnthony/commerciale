<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produit_dispos', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->float('prix_unitaire');
            $table->timestamps();
        });

        Schema::table('produit_dispos',function (Blueprint $table){
            $table->foreignIdFor(\App\Models\Product::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Fournisseur::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_dispo');
    }
};
