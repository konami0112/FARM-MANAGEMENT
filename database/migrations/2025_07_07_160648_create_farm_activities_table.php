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
Schema::create('farm_activities', function (Blueprint $table) {
    $table->id();
    $table->foreignId('farm_id')->constrained()->onDelete('cascade');
    $table->string('activity_type'); // planting, harvesting, feeding, etc.
    $table->string('related_type')->nullable(); // crops, livestock
    $table->foreignId('related_id')->nullable(); // crop_id or livestock_id
    $table->date('date');
    $table->time('start_time')->nullable();
    $table->time('end_time')->nullable();
    $table->text('description');
    $table->foreignId('assigned_to')->constrained('staff')->onDelete('cascade');
    $table->string('status')->default('pending'); // pending, in_progress, completed
    $table->text('notes')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_activities');
    }
};
