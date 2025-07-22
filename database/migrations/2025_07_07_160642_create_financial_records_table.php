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
    Schema::create('financial_records', function (Blueprint $table) {
        $table->id();
        $table->foreignId('farm_id')->constrained()->onDelete('cascade');
        $table->string('transaction_type'); // income, expense
        $table->string('category');
        $table->decimal('amount', 12, 2);
        $table->date('date');
        $table->text('description')->nullable();
        $table->string('payment_method')->nullable();
        $table->string('reference')->nullable();
        $table->foreignId('recorded_by')->constrained('staff')->onDelete('cascade');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_records');
    }
};
