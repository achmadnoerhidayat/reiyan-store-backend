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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->enum('kategori', ['Tanya Admin', 'Masalah Transaksi', 'Salah Tulis Nominal/TF Dibulatkan'])->default('Tanya Admin');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->enum('status', ['open', 'processing', 'resolved'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
