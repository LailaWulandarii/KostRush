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
        Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->enum('role', ['admin', 'penyewa', 'pemilik']);
                $table->string('alamat');
                $table->string('pekerjaan')->nullable();
                $table->date('tgl_lahir');
                $table->string('no_hp');
                $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
                $table->text('foto_ktp')->nullable();

            $table->bigInteger('id_kost')->unsigned()->nullable();
            $table->foreign('id_kost')->references('id')->on('kosts')->onDelete('cascade');

            $table->bigInteger('id_kamar')->unsigned()->nullable();
            $table->foreign('id_kamar')->references('id')->on('kamars')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
