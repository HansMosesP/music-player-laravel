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
        Schema::table('songs', function (Blueprint $table) {
            $table->longText('lyrics')->nullable()->after('views');
        });

        Schema::table('recommendations', function (Blueprint $table) {
            $table->foreignId('song_id')->nullable()->after('user_id')->constrained('songs')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropConstrainedForeignId('song_id');
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->dropColumn('lyrics');
        });
    }
};