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
        Schema::create('credit_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_id', 50)->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('request_type', ['registration_bonus', 'referral_bonus'])->default('referral_bonus');
            $table->decimal('amount', 10, 2);
            $table->text('reason')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('admin_id', 50)->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
            $table->index('request_id');
            $table->index('user_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_requests');
    }
};
