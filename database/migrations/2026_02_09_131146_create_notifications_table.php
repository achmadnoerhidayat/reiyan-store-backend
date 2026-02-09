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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('transaksi_id')->nullable()->constrained('transactions')->cascadeOnDelete();
            $table->enum('type', ['ORDER_PENDING', 'ORDER_SUCCESS', 'ORDER_FAILED', 'TOPUP_PENDING', 'TOPUP_SUCCESS', 'TOPUP_FAILED', 'VOUCHER_USED', 'SYSTEM_INFO', 'PROMO_ALERT']);
            $table->string('title');
            $table->longText('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
