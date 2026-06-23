<?php

namespace App\Http\Controllers;

use App\Models\Premium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $premium = Premium::where('user_id', Auth::id())->first();
        return view('premium.index', compact('premium'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('premium.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
        ]);

        Premium::create([
            'user_id' => Auth::id(),
            'package_name' => $request->package_name,
            'status' => 'active',
        ]);

        return redirect()->route('premium.index')->with('success', 'Selamat! Akun Anda sudah menjadi Premium.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Premium $premium)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Premium $premium)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Premium $premium)
    {
        if ($premium->user_id !== Auth::id()) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        $premium->update([
            'package_name' => 'Tahunan',
        ]);

        return redirect()->route('premium.index')->with('success', 'Paket langganan berhasil diubah menjadi Tahunan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Premium $premium)
    {
        if ($premium->user_id !== Auth::id()) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        $premium->delete();

        return redirect()->route('premium.index')->with('success', 'Langganan premium Anda telah berhasil dibatalkan.');
    }
}
