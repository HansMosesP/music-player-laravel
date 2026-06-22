<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('users')->updateOrInsert(
            [
                'email' => 'admin@example.com',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('genres')->updateOrInsert(
            [
                'name' => 'Pop',
            ],
            [
                'name' => 'Pop',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('genres')->updateOrInsert(
            [
                'name' => 'EDM',
            ],
            [
                'name' => 'EDM',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('genres')->updateOrInsert(
            [
                'name' => 'Indonesian Pop',
            ],
            [
                'name' => 'Indonesian Pop',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        $popGenreId = DB::table('genres')->where('name', 'Pop')->value('id');
        $edmGenreId = DB::table('genres')->where('name', 'EDM')->value('id');
        $indoPopGenreId = DB::table('genres')->where('name', 'Indonesian Pop')->value('id');

        DB::table('songs')->updateOrInsert(
            [
                'title' => 'Night Changes',
                'artist' => 'One Direction',
            ],
            [
                'genre_id' => $popGenreId,
                'title' => 'Night Changes',
                'artist' => 'One Direction',
                'album' => 'Four',
                'views' => 0,
                'lyrics' => "Malam berjalan pelan\nKita tertawa tanpa beban\nWaktu berubah diam-diam\nTapi kenangan tetap tersimpan\n\nLangkah kecil di bawah cahaya\nCerita lama terasa nyata\nWalau semua tak selalu sama\nHati ini masih mengingatnya",
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('songs')->updateOrInsert(
            [
                'title' => 'Perfect',
                'artist' => 'Ed Sheeran',
            ],
            [
                'genre_id' => $popGenreId,
                'title' => 'Perfect',
                'artist' => 'Ed Sheeran',
                'album' => 'Divide',
                'views' => 0,
                'lyrics' => "Di bawah langit yang tenang\nAku menemukan alasan\nSenyummu jadi jawaban\nUntuk semua perjalanan\n\nHari ini terasa indah\nSaat kita melangkah bersama\nTak perlu kata yang mewah\nCukup hati yang saling percaya",
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('songs')->updateOrInsert(
            [
                'title' => 'Faded',
                'artist' => 'Alan Walker',
            ],
            [
                'genre_id' => $edmGenreId,
                'title' => 'Faded',
                'artist' => 'Alan Walker',
                'album' => 'Different World',
                'views' => 0,
                'lyrics' => "Cahaya jauh mulai menghilang\nSuara hati perlahan tenggelam\nAku mencari arah pulang\nDi antara bayangan malam\n\nLangkahku terus berjalan\nMelewati ruang yang sepi\nWalau dunia terasa hilang\nHarapan masih menemani",
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('songs')->updateOrInsert(
            [
                'title' => 'Ku Mau Dia',
                'artist' => 'Andmesh',
            ],
            [
                'genre_id' => $indoPopGenreId,
                'title' => 'Ku Mau Dia',
                'artist' => 'Andmesh',
                'album' => 'Cinta Luar Biasa',
                'views' => 0,
                'lyrics' => "Aku melihat senyum sederhana\nYang membuat hati terasa berbeda\nBukan karena sempurna dirinya\nTapi karena tulus rasanya\n\nAku ingin tetap di sini\nMenjaga cerita yang mulai berarti\nBila hati boleh memilih\nDialah yang ingin kumiliki",
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('songs')->updateOrInsert(
            [
                'title' => 'Happier',
                'artist' => 'Marshmello ft. Bastille',
            ],
            [
                'genre_id' => $edmGenreId,
                'title' => 'Happier',
                'artist' => 'Marshmello ft. Bastille',
                'album' => 'Happier',
                'views' => 0,
                'lyrics' => "Kadang cinta harus merelakan\nMeski hati sulit menerima\nBila senyummu bisa kembali\nAku belajar pergi perlahan\n\nBukan karena tak lagi peduli\nBukan juga ingin melukai\nAku hanya ingin kau bahagia\nWalau bukan aku alasannya",
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );
    }
}