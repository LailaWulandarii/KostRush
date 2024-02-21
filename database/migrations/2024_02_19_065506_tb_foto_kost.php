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
        Schema::create('tb_foto_kost', function (Blueprint $table) {
            $table->id('id_f_kost');
            $table->unsignedBigInteger('id_kost'); // Tambahkan kolom id_kost
            $table->text('foto_kost');
            $table->timestamps();

            $table->foreign('id_kost')
                ->references('id_kost')
                ->on('tb_kost')
                ->onDelete('cascade');
        });

        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_foto_kost');

        //
    }
};
