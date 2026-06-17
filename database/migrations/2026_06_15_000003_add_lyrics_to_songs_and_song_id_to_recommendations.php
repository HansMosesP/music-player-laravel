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
        if (Schema::hasTable('songs')) {
            Schema::table('songs', function (Blueprint $table) {
                if (!Schema::hasColumn('songs', 'lyrics')) {
                    if (Schema::hasColumn('songs', 'views')) {
                        $table->longText('lyrics')->nullable()->after('views');
                    } else {
                        $table->longText('lyrics')->nullable();
                    }
                }
            });
        }

        if (Schema::hasTable('recommendations')) {
            Schema::table('recommendations', function (Blueprint $table) {
                if (!Schema::hasColumn('recommendations', 'song_id')) {
                    $table->foreignId('song_id')
                        ->nullable()
                        ->after('id')
                        ->constrained('songs')
                        ->nullOnDelete();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('recommendations')) {
            Schema::table('recommendations', function (Blueprint $table) {
                if (Schema::hasColumn('recommendations', 'song_id')) {
                    $table->dropForeign(['song_id']);
                    $table->dropColumn('song_id');
                }
            });
        }

        if (Schema::hasTable('songs')) {
            Schema::table('songs', function (Blueprint $table) {
                if (Schema::hasColumn('songs', 'lyrics')) {
                    $table->dropColumn('lyrics');
                }
            });
        }
    }
};