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
        Schema::create('obat_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('obat_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('tipe');
            $table->integer('stok_sebelum');
            $table->integer('stok');
            $table->integer('stok_setelah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat_histories');
    }
};
