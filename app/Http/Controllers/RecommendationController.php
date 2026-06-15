<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Recommendation;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data rekomendasi dari database
        $recommendations = Recommendation::with('song')->get();
        $favoriteKeys = Favorite::where('user_id', Auth::id())
            ->get()
            ->map(function ($favorite) {
                return $favorite->song_title . '|' . $favorite->artist;
            })
            ->all();
        
        // Mengembalikan tampilan (view) bersama datanya
        return view('recommendations.index', compact('recommendations', 'favoriteKeys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan halaman form untuk menambah lagu rekomendasi baru
        $songs = Song::orderBy('title')->get();

        return view('recommendations.create', compact('songs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi input form agar tidak kosong
        $validated = $request->validate([
            'song_id'    => 'required|exists:songs,id',
            'song_title' => 'required|string|max:255',
            'artist'     => 'required|string|max:255',
            'reason'     => 'required|string',
        ]);

        $song = Song::findOrFail($validated['song_id']);

        // 2. Simpan ke database menggunakan data user 
        Recommendation::create([
            'user_id'    => Auth::id(), // Mengambil ID user yang sedang login
            'song_id'    => $song->id,
            'song_title' => $song->title,
            'artist'     => $song->artist,
            'reason'     => $validated['reason'],
        ]);

        // 3. Redirect kembali ke halaman utama 
        return redirect('/recommendations')->with('success', 'Rekomendasi lagu berhasil ditambahkan!');
    }
    
    /**
     * Search songs by keyword.
     */
    public function search(Request $request)
    {
        $keyword = $request->query('keyword');

        $songs = Song::when($keyword, function ($query, $keyword) {
            $query->where('title', 'like', "%{$keyword}%")
                  ->orWhere('artist', 'like', "%{$keyword}%")
                  ->orWhere('album', 'like', "%{$keyword}%");
        })->get();

        return view('search.index', compact('songs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Recommendation $recommendation)
    {
        return view('recommendations.show', compact('recommendation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recommendation $recommendation)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recommendation $recommendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recommendation $recommendation)
    {
        //
    }
}
