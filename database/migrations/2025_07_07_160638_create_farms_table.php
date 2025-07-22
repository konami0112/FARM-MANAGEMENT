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
    Schema::create('farms', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('location');
        $table->decimal('size', 10, 2); // in hectares
        $table->text('description')->nullable();
        $table->foreignId('manager_id')->constrained('staff')->onDelete('cascade');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farms');
    }
};
