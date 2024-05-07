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
        Schema::table('putusan_pn', function (Blueprint $table) {
            $table->string('penggugat')->nullable();
            $table->string('tergugat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('putusan_pn', function (Blueprint $table) {
            //
        });
    }
};
