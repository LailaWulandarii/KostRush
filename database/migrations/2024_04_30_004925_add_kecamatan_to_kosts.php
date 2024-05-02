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
        Schema::table('kosts', function (Blueprint $table) {
            $table->enum('kecamatan', [
                'Bagor',
                'Baron',
                'Berbek',
                'Gondang',
                'Jatikalen',
                'Kertosono',
                'Lengkong',
                'Loceret',
                'Nganjuk',
                'Ngetos',
                'Ngluyu',
                'Ngronggot',
                'Pace',
                'Patianrowo',
                'Plemahan',
                'Prambon',
                'Rejoso',
                'Sawahan',
                'Sukomoro',
                'Tanjunganom'
            ])->after('alamat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kosts', function (Blueprint $table) {
        });
    }
};
