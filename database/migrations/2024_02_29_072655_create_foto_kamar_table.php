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
        Schema::create('foto_kamar', function (Blueprint $table) {
            $table->id('id_foto_kamar');
            $table->unsignedBigInteger('id_kamar'); // Tambahkan kolom id_kost
            $table->text('foto_kamar');
            $table->timestamps();

            $table->foreign('id_kamar')
                ->references('id_kamar')
                ->on('kamar')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_kamar');
    }
};
