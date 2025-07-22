<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// Create a new migration
public function up()
{
    Schema::table('market_linkages', function (Blueprint $table) {
        $table->string('product_subtype')->nullable()->after('product_type');
    });

    // Update existing records
    DB::table('market_linkages')
        ->whereIn('product_type', ['Maize', 'Soybean'])
        ->update([
            'product_subtype' => DB::raw('product_type'),
            'product_type' => 'crop'
        ]);

    DB::table('market_linkages')
        ->where('product_type', 'Poultry')
        ->update([
            'product_subtype' => DB::raw('product_type'),
            'product_type' => 'livestock'
        ]);
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
