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
Schema::create('advisories', function (Blueprint $table) {
    $table->id();
    $table->foreignId('farm_id')->constrained()->onDelete('cascade');
    $table->string('title');
    $table->text('content');
    $table->foreignId('advisor_id')->constrained('staff')->onDelete('cascade');
    $table->date('issue_date');
    $table->date('due_date')->nullable();
    $table->string('priority')->default('medium'); // low, medium, high
    $table->string('status')->default('pending'); // pending, in_progress, completed
    $table->text('response')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advisories');
    }
};
