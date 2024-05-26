<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->integer('pasien_id')->unsigned()->nullable();
            $table->integer('doctor_id')->unsigned()->nullable();
            $table->date('tanggal')->default(now());
            $table->text('keluhan')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('status')->nullable();
            $table->integer('total_harga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
