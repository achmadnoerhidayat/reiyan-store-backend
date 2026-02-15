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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('replied_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('transaksi_id')->nullable()->constrained('transactions')->cascadeOnDelete();
            $table->foreignId('produk_id')->nullable()->constrained('products')->cascadeOnDelete();
            $table->bigInteger('rating')->default(0);
            $table->longText('comment')->nullable();
            $table->boolean('is_publish')->default(false);
            $table->longText('reply_message')->nullable();
            $table->timestamp('replied_at')->nullable();
            $table->integer('edit_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
