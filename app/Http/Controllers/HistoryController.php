<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{   // Kode di comment and taruh [PLACEHOLDER] sementara
    // 1.Menampilkan History
    public function index()
    {
        // $history = [PLACEHOLDER];
        // return view('history.index', compact('history'));
    }
    public function store(Request $request)
    {   // 2. Menyimpan History
        // $request->validate([
        //     ['[PLACEHOLDER]' => 'required|exists:[PLACEHOLDER]']  
        // ]);

        // History::create([
        //     '[PLACEHOLDER]' => Auth::id(),
        //     '[PLACEHOLDER]' => $request->[PLACEHOLDER],
        // ]);

        // return redirect()->back()->with('Lagu diputar!');
    }
}

