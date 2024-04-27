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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->bigInteger('id_kost')->unsigned()->nullable();
            $table->foreign('id_kost')->references('id')->on('kosts')->onDelete('cascade');
            $table->bigInteger('id_kamar')->unsigned()->nullable();
            $table->foreign('id_kamar')->references('id')->on('kamars')->onDelete('cascade');
            $table->bigInteger('id')->unsigned()->nullable();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('biaya')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
