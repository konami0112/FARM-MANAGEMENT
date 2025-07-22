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
    Schema::create('crops', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('variety')->nullable();
        $table->foreignId('farm_id')->constrained()->onDelete('cascade');
        $table->date('planting_date');
        $table->date('harvest_date')->nullable();
        $table->decimal('planted_area', 10, 2); // in hectares
        $table->decimal('expected_yield', 10, 2)->nullable();
        $table->decimal('actual_yield', 10, 2)->nullable();
        $table->string('status')->default('planted'); // planted, growing, harvested, failed
        $table->text('notes')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};
