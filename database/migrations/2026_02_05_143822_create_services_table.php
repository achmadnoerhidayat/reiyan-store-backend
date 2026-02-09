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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->nullable()->constrained('products')->cascadeOnDelete();
            $table->string('code')->nullable();
            $table->string('nominal')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('price_provider')->default(0);
            $table->json('member_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
