<?php

namespace Database\Seeders;

use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            [
                'email' => 'admin@example.com',
            ],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        $songs = [
            [
                'title' => 'Night Changes',
                'artist' => 'One Direction',
                'album' => 'Four',
                'views' => 0,
            ],
            [
                'title' => 'Perfect',
                'artist' => 'Ed Sheeran',
                'album' => 'Divide',
                'views' => 0,
            ],
            [
                'title' => 'Faded',
                'artist' => 'Alan Walker',
                'album' => 'Different World',
                'views' => 0,
            ],
            [
                'title' => 'Ku Mau Dia',
                'artist' => 'Andmesh',
                'album' => 'Cinta Luar Biasa',
                'views' => 0,
            ],
            [
                'title' => 'Happier',
                'artist' => 'Marshmello ft. Bastille',
                'album' => 'Happier',
                'views' => 0,
            ],
        ];

        foreach ($songs as $song) {
            Song::firstOrCreate(
                [
                    'title' => $song['title'],
                    'artist' => $song['artist'],
                ],
                $song
            );
        }
    }
}