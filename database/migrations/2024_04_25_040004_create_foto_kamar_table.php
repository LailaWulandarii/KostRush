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
        Schema::create('foto_kamar', function (Blueprint $table) {
            $table->bigIncrements('id_foto_kamar');
            $table->bigInteger('id_kamar')->unsigned()->nullable();
            $table->foreign('id_kamar')->references('id')->on('kamars')->onDelete('cascade');
            $table->string('foto_kamar')->nullable();
            $table->timestamps();
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
