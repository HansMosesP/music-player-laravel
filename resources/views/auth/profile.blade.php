<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
</head>
<body>
    <h1>Profil Saya</h1>
    <p>Nama: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Dibuat pada: {{ $user->created_at ? $user->created_at->format('d M Y H:i') : '-' }}</p>
    <p><a href="{{ route('recommendations.index') }}">Rekomendasi</a></p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
