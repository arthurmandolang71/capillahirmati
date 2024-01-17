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
        Schema::create('kabkota', function (Blueprint $table) {
            $table->id();
            $table->string('parent_id');
            $table->string('nama');
            $table->string('level_wilayah');
            $table->string('level_label');
            $table->string('kode_prov');
            $table->string('kode_kab');
            $table->string('kode_kec');
            $table->string('kode_kel');
            $table->string('zona_waktu');
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
            $table->string('flag_hide');
            $table->string('kode_wilayah');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabkota');
    }
};
