<!DOCTYPE html>
<html>
<head>
    <title>Status Akun Premium</title>
</head>
<body>

    <h2>Status Akun Anda</h2>

    @if(session('success'))
        <p style="color: green;"><b>{{ session('success') }}</b></p>
    @endif

    @if($premium && $premium->status == 'active')
        <p>Status: <b> AKUN PREMIUM </b></p>
        <p>Jenis Paket: <b>{{ $premium->package_name }}</b></p>
        <p>Nikmati akses pemutar musik tanpa batas!</p>

        <br>
        
        @if($premium->package_name == 'Bulanan' || $premium->package_name == 'bulanan')
            <form action="{{ route('premium.update', $premium->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit">Ubah ke Paket Tahunan</button>
            </form>
            <br>
        @endif

        <form action="{{ route('premium.destroy', $premium->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan premium?')">
            @csrf
            @method('DELETE')
            <button type="submit">Cancel Premium</button>
        </form>
            
    @else
        <p>Status: <b>User Biasa (Gratisan)</b></p>
        <p>Upgrade ke premium sekarang untuk membuka semua fitur exclusif.</p>
        <p>
            <a href="{{ route('premium.create') }}"><button type="button">Beli Paket Premium</button></a>
        </p>
    @endif

    <br><br>
    <a href="/recommendations">← Kembali ke Daftar Rekomendasi</a>

</body>
</html>