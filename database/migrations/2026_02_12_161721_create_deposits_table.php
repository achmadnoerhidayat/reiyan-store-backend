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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('payment_id')->constrained('payment_methods')->cascadeOnDelete();
            $table->string('order_id');
            $table->bigInteger('amount')->default(0);
            $table->string('va_number')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('reference')->nullable();
            $table->enum('status', ['pending', 'success', 'failed', 'expire'])->default('pending');
            $table->timestamp('date_exp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
