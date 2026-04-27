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
        Schema::create('referral_bonuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('referrer_id')->unsigned(); // Person who referred
            $table->bigInteger('referred_id')->unsigned(); // Person who was referred
            $table->decimal('bonus_amount', 10, 2);
            $table->enum('status', ['pending', 'credited'])->default('pending');
            $table->timestamp('credited_at')->nullable();
            $table->timestamps();
            
            $table->foreign('referrer_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('referred_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->index('referrer_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referral_bonuses');
    }
};
