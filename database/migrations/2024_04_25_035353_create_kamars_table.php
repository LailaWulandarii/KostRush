<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kamar')->nullable();
            $table->integer('harga')->nullable();
            $table->string('fasilitas')->nullable();
            $table->enum('status', ['dipesan', 'terisi', 'kosong'])->nullable();
            $table->bigInteger('id_kost')->unsigned()->nullable();
            $table->foreign('id_kost')->references('id')->on('kosts')->onDelete('cascade');
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
