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
                'lyrics' => null,
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
                'lyrics' => null,
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
                'lyrics' => null,
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
                'lyrics' => null,
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
                'lyrics' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );
    }
}