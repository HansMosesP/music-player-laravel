<?php

namespace App\Http\Controllers;

use App\Models\Song;

class LyricsController extends Controller
{
    public function index()
    {
        $songs = Song::whereNotNull('lyrics')
            ->where('lyrics', '!=', '')
            ->orderBy('title')
            ->get();

        return view('lyrics.index', compact('songs'));
    }

    public function show(Song $song)
    {
        return view('lyrics.show', compact('song'));
    }
}