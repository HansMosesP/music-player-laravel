<?php
// Calvin
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    // Fungsinya untuk menampilkan semua rekomendasi lagu
    public function index()
    {
        // Menyediakan data musik langsung di dalam codingan (Bypass Database)
        $recommendations = [
            (object) [
                'song_title' => 'Kasih Aba Aba',
                'artist' => 'Tenxi',
                'reason' => 'Beat-nya asyik dan bikin semangat, cocok banget masuk daftar rekomendasi utama.'
            ],
            (object) [
                'song_title' => 'Malu Malu',
                'artist' => 'Indahkus',
                'reason' => 'Vibe lagunya ceria dan santai, pas buat didengerin sambil rehat santai.'
            ],
            (object) [
                'song_title' => 'Dirimu Yang Dulu',
                'artist' => 'Anggis Devaki',
                'reason' => 'Lagu dengan lirik mendalam dan aransemen yang enak banget di telinga.'
            ]
        ];
        
        // Mengembalikan tampilan (view) bersama datanya
        return view('recommendations.index', compact('recommendations'));
    }
}