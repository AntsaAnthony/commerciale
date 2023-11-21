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
        Schema::create('proformas', function (Blueprint $table) {
            $table->id();
            $table->string('mode_paiement');
            $table->integer('etat');
            $table->timestamps();
        });
        Schema::table('proformas',function (Blueprint $table){
            $table->foreignIdFor(\App\Models\Fournisseur::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\DemandeProforma::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proformas');
    }
};
