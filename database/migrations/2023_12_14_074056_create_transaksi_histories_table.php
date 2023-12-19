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
        Schema::create('transaksi_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id');
            $table->string('field_changed'); // Nama kolom yang diubah
            $table->string('old_value'); // Nilai lama
            $table->string('new_value'); // Nilai baru
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_histories');
    }
};
