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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('harga');
            $table->dateTime('tanggal_pengerjaan');
            $table->enum('status', ['Menunggu', 'Ditolak', 'Diproses', 'Selesai']);

            $table->uuid('pemilik_id');
            $table->foreign('pemilik_id')
                ->references('id')
                ->on('users')->comment('Untuk menentukan pemilik pemesanan');

            $table->uuid('psr_id');
            $table->foreign('psr_id')
                ->references('id')
                ->on('users')->comment('Untuk menentukan psr');

            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')
                ->references('id')
                ->on('produk');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
