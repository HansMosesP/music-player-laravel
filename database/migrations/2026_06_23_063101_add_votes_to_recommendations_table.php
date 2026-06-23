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
        Schema::table('recommendations', function (Blueprint $table) {
            // Tambahin kolom likes dan dislikes, default-nya mulai dari 0
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            // Buat ngapus kolom kalau sewaktu-waktu di-rollback
            $table->dropColumn(['likes', 'dislikes']);
        });
    }
};
