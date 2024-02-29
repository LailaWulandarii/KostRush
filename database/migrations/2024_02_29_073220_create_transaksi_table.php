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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->unsignedBigInteger('id_kamar');
            $table->unsignedBigInteger('id_user');
            $table->string('status');
            $table->text('foto_tf');
            $table->string('metode_bayar')->nullable();
            $table->dateTime('tanggal_masuk');
            $table->timestamps();
        
            $table->foreign('id_kamar')
                ->references('id_kamar')
                ->on('kamar')
                ->onDelete('cascade');
        
            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
