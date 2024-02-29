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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id('id_ulasan');
            $table->string('ulasan');
            $table->unsignedBigInteger('id'); // Kolom untuk menyimpan id user
            $table->timestamps();
        
            $table->foreign('id') // Menggunakan kolom 'id' sebagai kunci asing
                ->references('id') // Merujuk ke kolom 'id' di tabel 'tb_user'
                ->on('users')
                ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
