<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE VIEW v_besoins_non_valides AS
            SELECT \"besoins\".\"id\", \"services\".\"name\" AS \"service\", \"products\".\"name\" AS \"produit\",
            \"besoins\".\"quantity\", \"besoins\".\"etat\"
            FROM \"besoins\"
            JOIN \"services\" ON \"besoins\".\"service_id\" = \"services\".\"id\"
            JOIN \"products\" ON \"besoins\".\"product_id\" = \"products\".\"id\"
            WHERE \"besoins\".\"etat\" = 0;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('besoins_non_valides');
    }
};
