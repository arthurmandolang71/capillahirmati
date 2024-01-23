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
        Schema::create('akte_lahir', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamp('waktu_input');
            $table->string('file_keterangan');
            $table->string('nama');
            $table->string('nik');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('nik_saksi_1');
            $table->string('nama_saksi_1');
            $table->string('foto_ktp_saksi_1');
            $table->string('nik_saksi_2');
            $table->string('nama_saksi_2');
            $table->string('foto_ktp_saksi_2');
            $table->string('file_akte_lahir');
            $table->string('file_kk');
            $table->integer('status_capil');
            $table->integer('status_dinsos');
            $table->integer('status_bpjs');
            $table->timestamp('waktu_input_capil');
            $table->timestamp('waktu_input_dinsos');
            $table->timestamp('waktu_input_bpjs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akte_lahir');
    }
};
