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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id', 50)->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['credit'])->default('credit');
            $table->enum('category', ['registration_bonus', 'referral_bonus', 'admin_credit']);
            $table->decimal('amount', 10, 2);
            $table->decimal('balance_after', 10, 2);
            $table->text('description')->nullable();
            $table->string('reference_id', 100)->nullable();
            $table->timestamps();
            $table->index('transaction_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
