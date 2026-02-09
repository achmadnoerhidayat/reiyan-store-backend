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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categori_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->foreignId('provider_id')->nullable()->constrained('providers')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('brand')->nullable();
            $table->bigInteger('sale')->default(0);
            $table->string('code')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->boolean('is_check_id')->default(false);
            $table->boolean('is_check_server')->default(false);
            $table->boolean('is_check_name')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
