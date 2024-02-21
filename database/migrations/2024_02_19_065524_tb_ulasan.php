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
        Schema::create('tb_ulasan', function (Blueprint $table) {
            $table->id('id_ulasan');
            $table->string('ulasan');
            $table->unsignedBigInteger('id_user'); // Tambahkan kolom id_user
            $table->timestamps();

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
        Schema::dropIfExists('tb_ulasan');

        //
    }
};
