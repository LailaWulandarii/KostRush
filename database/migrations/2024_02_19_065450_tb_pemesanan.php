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
        Schema::create('tb_pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->unsignedBigInteger('id_kamar'); // Tambahkan kolom id_kamar
            $table->unsignedBigInteger('id_user'); // Tambahkan kolom id_user
            $table->string('status');
            $table->text('foto_tf');
            $table->string('metode_bayar')->nullable();
            $table->dateTime('tanggal_masuk');
            $table->timestamps();

            $table->foreign('id_kamar')
                ->references('id_kamar')
                ->on('tb_kamar')
                ->onDelete('cascade');

            $table->foreign('id_user')
                ->references('id_user')
                ->on('tb_user')
                ->onDelete('cascade');
        });

        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pemesanan');

        //
    }
};
