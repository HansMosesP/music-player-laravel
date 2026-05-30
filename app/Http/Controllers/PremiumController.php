<?php

namespace App\Http\Controllers;

use App\Models\Premium;
use Illuminate\Http\Request;

class PremiumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data premium untuk user 
        $premium = Premium::where('user_id', Auth::id())->first(); 

        // Mengirim data status premium ke halaman view
        return view('premium.index', compact('premium'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan halaman pilihan paket premium 
        return view ('premium.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input paket yang dipilih oleh user
        $request->validate([
            'package_name' => 'required|string|max:255',
        ]);

        // Simpan data premium baru ke database terhubung dengan ID User
        Premium::create([
            'user_id' => Auth::id(),
            'package_name' => $request->package_name,
            'status' => 'active', // setelah membeli akan langsung aktif paketnya
        ]);

        // Kembali ke halaman premium dengan pesan sukses
        return redirect()->route('premium.index')->with('success', 'Selamat! Akun Anda berhasil di-upgrade ke Premium.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Premium $premium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Premium $premium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Premium $premium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Premium $premium)
    {
        //
    }
}
