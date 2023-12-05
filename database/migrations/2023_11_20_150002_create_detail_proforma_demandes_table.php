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
        Schema::create('detail_proforma_demandes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('detail_proforma_demandes', function (Blueprint $table){
            $table->foreignIdFor(\App\Models\DemandeProforma::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Product::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_proforma_demandes');
    }
};
