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
            $table->unsignedBigInteger('id_kost'); // Menambahkan kolom 'id_kost' sebagai foreign key
            $table->string('nama_kamar');
            $table->string('fasilitas_kamar');
            $table->integer('harga_bulanan');
            $table->integer('harga_harian');
            $table->timestamps();
        
            $table->foreign('id_kost')
                ->references('id_kost') // Mengacu pada kolom 'id_kost' di tabel 'kost'
                ->on('tb_kost')
                ->onDelete('cascade'); // Aksi ketika data di tabel 'kost' dihapus
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
