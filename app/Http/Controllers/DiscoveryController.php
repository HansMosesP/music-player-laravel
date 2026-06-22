<?php
// {{-- Andreas   --}}
namespace App\Http\Controllers;

use App\Models\Song;

class DiscoveryController extends Controller
{
    public function index()
    {
        $latestSongs = Song::latest()->take(10)->get();

        $popularSongs = Song::orderBy('views', 'desc')
                            ->take(10)
                            ->get();

        $fadedSong = Song::where('title', 'Faded')
            ->where('artist', 'Alan Walker')
            ->first();

        return view('discovery.index', compact(
            'latestSongs',
            'popularSongs',
            'fadedSong'
        ));
    }
} 
