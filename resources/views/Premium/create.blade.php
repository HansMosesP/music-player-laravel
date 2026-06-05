<!DOCTYPE html>
<html>
<head>
    <title>Pilih Paket Premium</title>
</head>
<body>

    <h2>Pilih Paket Premium Kamu</h2>
    <p>Dengarkan musik favorit tanpa iklan mengganggu.</p>

    <h3>Paket Bulanan</h3>
    <p>Harga: Rp 49.000 / bulan</p>
    <form action="{{ route('premium.store') }}" method="POST">
        @csrf
        <input type="hidden" name="package_name" value="Bulanan">
        <button type="submit">Beli Sekarang</button>
    </form>

    <h3>Paket Tahunan</h3>
    <p>Harga: Rp 399.000 / tahun</p>
    <form action="{{ route('premium.store') }}" method="POST">
        @csrf
        <input type="hidden" name="package_name" value="Tahunan">
        <button type="submit">Beli Sekarang</button>
    </form>

    <br><br>
    <a href="/premium">← Kembali ke Status Akun</a>

</body>
</html>