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
        Schema::create('tb_foto_kamar', function (Blueprint $table) {
            $table->id('id_f_kamar');
            $table->unsignedBigInteger('id_kamar'); // Tambahkan kolom id_kamar
            $table->text('foto_kamar');
            $table->timestamps();
        
            $table->foreign('id_kamar')
                ->references('id_kamar')
                ->on('tb_kamar')
                ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_foto_kamar');

        //
    }
};
