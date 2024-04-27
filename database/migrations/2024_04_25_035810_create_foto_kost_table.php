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
        Schema::create('foto_kost', function (Blueprint $table) {
            $table->bigIncrements('id_foto_kost');
            $table->bigInteger('id_kost')->unsigned()->nullable();
            $table->foreign('id_kost')->references('id')->on('kosts')->onDelete('cascade');
            $table->string('foto_kost')->nullable();
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
