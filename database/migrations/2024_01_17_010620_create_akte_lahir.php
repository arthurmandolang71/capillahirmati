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
            $table->string('no_kk')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('email')->nullable();
            $table->string('nama_anak')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('berat_bayi')->nullable();
            $table->string('panjang_bayi')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('waktu_input_rs_kelurahan')->nullable();
            $table->string('waktu_input_capil')->nullable();
            $table->string('waktu_input_dinsos')->nullable();
            $table->string('waktu_input_bpjs')->nullable();
            $table->string('file_surat_lahir')->nullable();
            $table->string('file_akte_nikah')->nullable();
            $table->string('file_sptjm')->nullable();
            $table->string('file_kartu_keluarga')->nullable();
            $table->string('file_kk_baru')->nullable();
            $table->string('file_akte_lahir')->nullable();
            $table->string('catatan_rs_kelurahan')->nullable();
            $table->string('catatan_capil')->nullable();
            $table->integer('status_akte')->nullable();
            $table->integer('status_dinsos')->nullable();
            $table->integer('status_bpjs')->nullable();
            $table->string('user_id')->nullable();
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
