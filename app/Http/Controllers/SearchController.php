<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $songs = Song::when($keyword, function ($query) use ($keyword) {
            $query->where('title', 'like', "%{$keyword}%")
                  ->orWhere('artist', 'like', "%{$keyword}%");
        })->get();

        return view('search.index', compact('songs'));
    }
} 