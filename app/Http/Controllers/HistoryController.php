<?php
 
namespace App\Http\Controllers;
 
use App\Models\History;
use Illuminate\Support\Facades\Auth;
 
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