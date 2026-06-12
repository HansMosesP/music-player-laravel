<?php

namespace App\Http\Controllers;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{   
    // 1. Menampilkan History
    public function index()
    {
        // Fetch only the logged-in user's history, newest first
        $history = History::where('user_id', Auth::id())->latest()->get();
        return view('history.index', compact('history'));
    }

    // 2. Menyimpan History
    public function store(Request $request)
    {   
        // Validate that title and artist are provided
        $request->validate([
            'song_title' => 'required|string',
            'artist'     => 'required|string',
        ]);

        // Create the record
        History::create([
            'user_id'    => Auth::id(),
            'song_title' => $request->song_title,
            'artist'     => $request->artist,
        ]);

        return redirect()->back()->with('success', 'Lagu diputar!');
    }

    // 3. Menghapus History
    public function destroy($id)
    {
        $historyItem = History::findOrFail($id);

        // Untuk memastikan bahwa hanya pemilik user id yang menghapus
        if ($historyItem->user_id == Auth::id()) {
            $historyItem->delete();
            return redirect()->back()->with('Berhasil', 'History berhasil dihapus!');
        }

        // jika bukan pemilik dari historynya
        return redirect()->back()->with('error', 'Tidak ada akses...');
    }
}
