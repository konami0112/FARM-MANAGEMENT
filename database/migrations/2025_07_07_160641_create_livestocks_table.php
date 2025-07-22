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
    Schema::create('livestocks', function (Blueprint $table) {
        $table->id();
        $table->string('type'); // cattle, poultry, sheep, etc.
        $table->string('breed')->nullable();
        $table->foreignId('farm_id')->constrained()->onDelete('cascade');
        $table->integer('quantity');
        $table->date('acquisition_date');
        $table->string('purpose'); // dairy, meat, breeding, etc.
        $table->text('health_status')->nullable();
        $table->text('notes')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestocks');
    }
};
