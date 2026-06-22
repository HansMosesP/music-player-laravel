<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Akun Premium</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
            color: #333;
            line-height: 1.6;
        }
        .alert-success {
            color: green;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .premium-box {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 500px;
            margin-bottom: 20px;
            background-color: #fafafa;
        }
        .btn-submit {
            background-color: #f0f0f0;
            border: 1px solid #a6a6a6;
            padding: 6px 12px;
            cursor: pointer;
            font-size: 0.9rem;
        }
        .btn-submit:hover {
            background-color: #e0e0e0;
        }
        .btn-danger {
            color: red;
            border-color: #cc0000;
        }
        .package-option {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #ccc;
        }
    </style>
</head>
<body>

    <h2>Status Akun Anda</h2>

    @if(session('success'))
        <p class="alert-success">{{ session('success') }}</p>
    @endif

    @if($premium && $premium->status == 'active')
        
        <div class="premium-box" style="border-color: #d4af37;">
            <p>Status Akun: <b>AKUN PREMIUM (AKTIF) 👑</b></p>
            <p>Jenis Paket: <b>{{ $premium->package_name }}</b></p>
            <p>Tanggal Aktivasi: <b>{{ $premium->created_at->format('d M Y, H:i') }} WIB</b></p>
            <p>Berlaku Sampai: 
                <b>
                    @if(strtolower($premium->package_name) == 'bulanan')
                        {{ $premium->created_at->addDays(30)->format('d M Y, H:i') }} WIB (Paket 30 Hari)
                    @else
                        {{ $premium->created_at->addYear()->format('d M Y, H:i') }} WIB (Paket 1 Tahun)
                    @endif
                </b>
            </p>
            <p>Nikmati akses pemutar musik tanpa batas!</p>
        </div>

        <!-- Tombol Aksi Kelola Paket -->
        @if(strtolower($premium->package_name) == 'bulanan')
            <form action="{{ route('premium.update', $premium->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin beralih ke langganan tahunan?\nHarganya Rp. 399.000 / tahun')">
                @csrf
                @method('PUT')
                <button type="submit" class="btn-submit">Ubah ke Paket Tahunan</button>
            </form>
            <br>
        @endif

        <form action="{{ route('premium.destroy', $premium->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan premium?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-submit btn-danger">Cancel Premium</button>
        </form>

    @else
        
        <p>Status Akun: <b>User Biasa (Gratisan)</b></p>
        <p>Upgrade ke premium sekarang untuk membuka semua fitur eksklusif.</p>
        
        <hr>
        <h3>Pilih Paket Premium Kamu</h3>

        <div style="max-width: 600px;">
            <!-- Pilihan 1: Paket Bulanan -->
            <div class="package-option">
                <h4>1. Paket Bulanan</h4>
                <p>Harga: <b>Rp 49.000 / bulan</b></p>
                <p>Benefit:</p>
                <ul>
                    <li>Tambah rekomendasi tanpa batas</li>
                    <li>Simpan lagu favorit ⭐</li>
                    <li>Buka semua lirik musik</li>
                </ul>
                <form action="{{ route('premium.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="package_name" value="Bulanan">
                    <button type="submit" class="btn-submit">Beli Sekarang</button>
                </form>
            </div>

            <!-- Pilihan 2: Paket Tahunan -->
            <div class="package-option" style="border: none;">
                <h4>2. Paket Tahunan</h4>
                <p>Harga: <b>Rp 399.000 / tahun</b></p>
                <p>Benefit:</p>
                <ul>
                    <li>Semua benefit paket bulanan</li>
                    <li>Masa aktif 1 tahun penuh</li>
                    <li>Lebih hemat harganya</li>
                </ul>
                <form action="{{ route('premium.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="package_name" value="Tahunan">
                    <button type="submit" class="btn-submit">Beli Sekarang</button>
                </form>
            </div>
        </div>

    @endif

    <br>
    <a href="/recommendations" style="text-decoration: none;">← Kembali ke Daftar Rekomendasi</a>

</body>
</html>