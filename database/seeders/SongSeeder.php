<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert genres
        $genres = [
            ['name' => 'Pop'],
            ['name' => 'Rock'],
            ['name' => 'Jazz'],
        ];

        foreach ($genres as $genre) {
            Genre::firstOrCreate($genre);
        }

        // Insert songs
        $pop = Genre::where('name', 'Pop')->first();
        $rock = Genre::where('name', 'Rock')->first();
        $jazz = Genre::where('name', 'Jazz')->first();

        Song::updateOrCreate(
            ['title' => 'Perfect', 'artist' => 'Ed Sheeran'],
            ['genre_id' => $pop->id, 'album' => 'Divide', 'views' => 150, 'lyrics' => "I found a love for me\nDarling, just dive right in and follow my lead"]
        );

        Song::updateOrCreate(
            ['title' => 'Numb', 'artist' => 'Linkin Park'],
            ['genre_id' => $rock->id, 'album' => 'Meteora', 'views' => 300, 'lyrics' => "I'm tired of being what you want me to be\nI've become so numb, I can't feel you there"]
        );

        Song::updateOrCreate(
            ['title' => 'Fly Me To The Moon', 'artist' => 'Frank Sinatra'],
            ['genre_id' => $jazz->id, 'album' => 'Jazz Collection', 'views' => 100, 'lyrics' => "Fly me to the moon\nLet me play among the stars"]
        );
    }
}
