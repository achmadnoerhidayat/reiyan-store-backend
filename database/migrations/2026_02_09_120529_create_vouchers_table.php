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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->nullable()->constrained('products')->cascadeOnDelete();
            $table->string('code')->unique();
            $table->enum('type', ['percent', 'flat'])->default('flat');
            $table->bigInteger('value')->default(0);
            $table->bigInteger('quota')->default(0);
            $table->bigInteger('used')->default(0);
            $table->bigInteger('min_order')->default(0);
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
