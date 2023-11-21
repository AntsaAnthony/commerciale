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
        Schema::create('bon_de_commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('tva');
            $table->integer('etat');
            $table->timestamps();
        });
        Schema::table('bon_de_commandes',function (Blueprint $table){
            $table->foreignIdFor(\App\Models\Proforma::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_de_commandes');
    }
};
