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
                'reason' => 'Beat-nya asik dan bikin nagih banget, cocok masuk daftar rekomendasi utama.'
            ],
            (object) [
                'song_title' => 'Malu Malu',
                'artist' => 'Indahkus',
                'reason' => 'Vibes lagunya ceria dan santai, pas banget buat didengerin kalo lagi santai.'
            ],
            (object) [
                'song_title' => 'Dirimu Yang Dulu',
                'artist' => 'Anggis Devaki',
                'reason' => 'Lagu dengan sadvibes yang berasa banget dihati.'
            ]
        ];
        
        // Mengembalikan tampilan (view) bersama datanya
        return view('recommendations.index', compact('recommendations'));
    }
}