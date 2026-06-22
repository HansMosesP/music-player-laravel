<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan; // 1. Tambahkan ini di bagian atas
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
 
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
 
            $table->foreignId('song_id')
                ->constrained('songs')
                ->cascadeOnDelete();
 
            $table->timestamps();
        });

        // 2. Tambahkan baris ini untuk memanggil seeder otomatis
        Artisan::call('db:seed', [
            '--class' => 'DatabaseSeeder',
            '--force' => true // Memaksa seeder jalan tanpa konfirmasi tambahan
        ]);
    }
 
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};