<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $history = History::with('song')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('history.index', compact('history'));
    }

    public function store(Request $request)
    {
        History::create([
            'user_id' => Auth::id(),
            'song_id' => $request->song_id,
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy(History $history)
    {
        if ($history->user_id !== Auth::id()) {
            abort(403);
        }

        $history->delete();

        return redirect()
            ->route('history.index')
            ->with('success', 'Riwayat berhasil dihapus.');
    }
}