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
            $table->tinyInteger('status');

            $table->foreign('pemilik_id')
                ->references('id')
                ->on('users')
                ->where('user_role_id', 3);

            $table->foreign('psr_id')
                ->references('id')
                ->on('users')
                ->where('user_role_id', 4);

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
