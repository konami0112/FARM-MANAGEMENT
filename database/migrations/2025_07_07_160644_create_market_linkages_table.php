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
Schema::create('market_linkages', function (Blueprint $table) {
    $table->id();
    $table->foreignId('farm_id')->constrained()->onDelete('cascade');
    $table->string('buyer_name');
    $table->string('contact_person')->nullable();
    $table->string('contact_email')->nullable();
    $table->string('contact_phone')->nullable();
    $table->string('product_type'); // crop or livestock
    $table->foreignId('product_id')->nullable(); // could be crop_id or livestock_id
    $table->string('product_category')->nullable();
    $table->decimal('quantity', 10, 2)->nullable();
    $table->string('unit')->nullable();
    $table->decimal('price_per_unit', 10, 2)->nullable();
    $table->date('agreement_date')->nullable();
    $table->date('delivery_date')->nullable();
    $table->string('status')->default('pending'); // pending, active, completed, cancelled
    $table->text('notes')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_linkages');
    }
};
