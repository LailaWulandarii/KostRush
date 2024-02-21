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
        Schema::create('tb_kost', function (Blueprint $table) {
            $table->id('id_kost');
            $table->string('nama_kost');
            $table->string('fasilitas_kost');
            $table->string('peraturan_kost');
            $table->string('alamat');
            $table->string('jenis_bank');
            $table->string('no_rek');
            $table->string('nama_rek');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kost');
    }
};
