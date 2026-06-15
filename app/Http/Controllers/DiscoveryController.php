<?php

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

        return view('discovery.index', compact(
            'latestSongs',
            'popularSongs'
        ));
    }
} 
