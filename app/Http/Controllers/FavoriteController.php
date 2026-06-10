<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class FavoriteController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    public function index()
    {
        $favorites = Auth::user()->favorites;
        return view('favorite.index', compact('favorites'));
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'song_title' => 'required|string',
            'artist' => 'required|string',
        ]);

        $userId = Auth::id();
        $songTitle = $request->song_title;
        $artist = $request->artist;

        $favorite = Favorite::where('user_id', $userId)
                            ->where('song_title', $songTitle)
                            ->where('artist', $artist)
                            ->first();

        if ($favorite) {
            $favorite->delete();
            return redirect()->back()->with('success', 'Lagu dihapus dari favorit!');
        } else {
            Favorite::create([
                'user_id' => $userId,
                'song_title' => $songTitle,
                'artist' => $artist,
            ]);
            return redirect()->back()->with('success', 'Lagu ditambahkan ke favorit!');
        }
    }
}