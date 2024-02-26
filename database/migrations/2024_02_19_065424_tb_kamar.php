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
        Schema::create('tb_kamar', function (Blueprint $table) {
            $table->id('id_kamar');
            $table->unsignedBigInteger('id_kost');
            $table->string('nama_kamar');
            $table->string('fasilitas_kamar');
            $table->integer('harga_bulanan');
            $table->integer('harga_harian');
            $table->timestamps();

            $table->foreign('id_kost')
                ->references('id_kost')
                ->on('tb_kost')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kamar');

        //
    }
};
