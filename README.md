# Music Player Laravel

Project **Music Player Laravel** adalah aplikasi web berbasis Laravel yang dibuat untuk mengelola dan menampilkan daftar musik. Aplikasi ini memiliki fitur autentikasi user, pencarian lagu, discovery song, favorite song, lyrics, history pemutaran lagu, recommendation, dan premium account.

Project ini dibuat sebagai bagian dari **Final Project UAS Backend Programming** menggunakan framework Laravel dan database MySQL.

---

## Anggota Kelompok

- Setiawan Harefa, Andreas `[535230105]`
- Nursalim, James `[535230107]`
- Moses Perwari, Hans `[535250055]`
- Yensen Lemuel, Kornelius `[535250062]`
- Emanuel Suhendra, Calvin `[535250080]`

---

## Tech Stack

- PHP
- Laravel
- MySQL
- phpMyAdmin
- Composer
- Blade Template
- Eloquent ORM
- Laravel Migration
- Laravel Seeder
- GitHub

---

## Fitur Aplikasi

### 1. Auth & User

Fitur autentikasi user digunakan untuk mengelola akun pengguna.

Fitur yang tersedia:

- Register akun baru
- Login user
- Logout user
- Melihat profile user
- Menyimpan password menggunakan bcrypt
- Menampilkan data user seperti nama, email, dan tanggal akun dibuat

Endpoint:

```bash
GET /register
POST /register
GET /login
POST /login
POST /logout
GET /profile
```

---

### 2. Search & Discovery

Fitur ini digunakan untuk mencari dan menemukan lagu yang tersedia di aplikasi.

Fitur Search:

- Menampilkan semua lagu jika keyword kosong
- Mencari lagu berdasarkan judul lagu
- Mencari lagu berdasarkan nama artis

Fitur Discovery:

- Menampilkan lagu terbaru
- Menampilkan lagu populer berdasarkan jumlah views
- Menampilkan audio player untuk lagu tertentu

Endpoint:

```bash
GET /search
GET /discovery
```

---

### 3. Library & Favorites

Fitur Favorite digunakan agar user dapat menyimpan lagu yang disukai ke dalam daftar favorit.

Fitur yang tersedia:

- Menampilkan daftar lagu favorit user
- Menambahkan lagu ke favorit
- Menghapus lagu dari favorit
- Toggle favorite, jika lagu belum favorit maka akan ditambahkan, jika sudah favorit maka akan dihapus

Endpoint:

```bash
GET /favorites
POST /favorites/toggle
DELETE /favorites
```

---

### 4. Lyrics

Fitur Lyrics digunakan untuk menampilkan daftar lirik lagu dan detail lirik dari lagu tertentu.

Fitur yang tersedia:

- Menampilkan daftar lagu yang memiliki lirik
- Menampilkan detail lirik lagu
- Menyimpan lirik lagu pada tabel songs
- Mengambil data lirik dari database

Endpoint:

```bash
GET /lyrics
POST /lyrics
GET /lyrics/{song}
```

---

### 5. User Activity & History

Fitur History digunakan untuk menyimpan riwayat lagu yang pernah diputar oleh user.

Fitur yang tersedia:

- Menyimpan lagu ke history saat user menekan tombol play
- Menampilkan riwayat lagu yang pernah diputar
- Menghapus data history yang tidak diinginkan

Endpoint:

```bash
GET /history
POST /history
DELETE /history
```

---

### 6. Recommendation

Fitur Recommendation digunakan untuk menampilkan, menambahkan, menghapus, dan memberikan vote pada rekomendasi lagu.

Fitur yang tersedia:

- Menampilkan daftar rekomendasi musik
- Menambahkan rekomendasi lagu baru
- Menghapus rekomendasi lagu
- Memberikan like atau dislike pada rekomendasi lagu
- Menampilkan detail rekomendasi lagu

Endpoint:

```bash
GET /recommendations
GET /recommendations/create
POST /recommendations
DELETE /recommendations
PUT /recommendations/{recommendation}/vote
```

---

### 7. Premium

Fitur Premium digunakan untuk mengelola status akun premium user.

Fitur yang tersedia:

- Menampilkan status akun user
- Menampilkan pilihan paket premium
- Membeli paket premium bulanan
- Membeli paket premium tahunan
- Mengubah paket dari bulanan ke tahunan
- Membatalkan langganan premium
- Menampilkan tombol berbeda berdasarkan status akun user

Endpoint:

```bash
GET /premiums
GET /premiums/create
POST /premiums
PUT /premiums/{premium}
DELETE /premiums/{premium}
```

---

## Persyaratan Sistem

Sebelum menjalankan project, pastikan perangkat sudah memiliki:

- PHP 8.2 atau lebih baru
- Composer
- MySQL
- phpMyAdmin
- XAMPP
- Git
- Web browser

---

## Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/HansMosesP/music-player-laravel.git
```

Masuk ke folder project:

```bash
cd music-player-laravel
```

---

### 2. Install Dependency Laravel

Jalankan perintah berikut:

```bash
composer install
```

---

### 3. Copy File Environment

Buat file `.env` dari file `.env.example`.

Untuk Windows:

```bash
copy .env.example .env
```

Untuk Linux atau Mac:

```bash
cp .env.example .env
```

---

### 4. Generate Application Key

Jalankan perintah berikut:

```bash
php artisan key:generate
```

---

### 5. Buat Database MySQL

Buka phpMyAdmin melalui browser:

```bash
http://localhost/phpmyadmin
```

Buat database baru dengan nama:

```bash
music_player_laravel
```

---

### 6. Konfigurasi Database di File .env

Buka file `.env`, lalu sesuaikan konfigurasi database menjadi seperti berikut:

```env
APP_NAME="Music Player Laravel"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=music_player_laravel
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

CACHE_STORE=database
QUEUE_CONNECTION=database

BCRYPT_ROUNDS=12

FILESYSTEM_DISK=local
```

Setelah mengubah file `.env`, jalankan perintah berikut agar konfigurasi terbaru terbaca:

```bash
php artisan config:clear
php artisan cache:clear
```

---

### 7. Jalankan Migration

Untuk membuat semua tabel database, jalankan:

```bash
php artisan migrate
```

Jika ingin menghapus semua tabel lama dan membuat ulang dari awal:

```bash
php artisan migrate:fresh
```

---

### 8. Jalankan Seeder

Untuk mengisi data awal seperti lagu, user, rekomendasi, atau data lainnya, jalankan:

```bash
php artisan db:seed
```

Jika ingin migration ulang sekaligus menjalankan seeder:

```bash
php artisan migrate:fresh --seed
```

---

### 9. Jalankan Laravel Server

Jalankan project dengan perintah:

```bash
php artisan serve
```

Setelah server berjalan, buka aplikasi melalui browser:

```bash
http://127.0.0.1:8000
```

---

## Alur Instalasi Cepat

Gunakan perintah berikut jika ingin menjalankan project dari awal secara cepat.

Untuk Windows:

```bash
git clone https://github.com/HansMosesP/music-player-laravel.git
cd music-player-laravel
composer install
copy .env.example .env
php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan migrate:fresh --seed
php artisan serve
```

Untuk Linux atau Mac:

```bash
git clone https://github.com/HansMosesP/music-player-laravel.git
cd music-player-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan migrate:fresh --seed
php artisan serve
```

---

## Struktur Folder Penting

```bash
music-player-laravel
├── app
│   ├── Http
│   │   └── Controllers
│   └── Models
├── database
│   ├── migrations
│   └── seeders
├── public
├── resources
│   └── views
├── routes
│   └── web.php
├── .env
├── composer.json
└── README.md
```

---

## Folder dan File yang Sering Digunakan

### routes/web.php

File ini digunakan untuk mengatur semua route aplikasi seperti register, login, profile, recommendations, favorites, lyrics, history, premium, search, dan discovery.

### app/Http/Controllers

Folder ini berisi controller yang mengatur logic backend aplikasi.

### app/Models

Folder ini berisi model Laravel seperti User, Song, Favorite, History, Premium, dan Recommendation.

### resources/views

Folder ini berisi file tampilan Blade untuk halaman web.

### database/migrations

Folder ini berisi file migration untuk membuat struktur tabel database.

### database/seeders

Folder ini berisi seeder untuk mengisi data awal ke database.

---

## Contoh Route Aplikasi

Beberapa halaman yang dapat dibuka setelah menjalankan server:

```bash
http://127.0.0.1:8000/register
http://127.0.0.1:8000/login
http://127.0.0.1:8000/profile
http://127.0.0.1:8000/recommendations
http://127.0.0.1:8000/recommendations/create
http://127.0.0.1:8000/search
http://127.0.0.1:8000/discovery
http://127.0.0.1:8000/favorites
http://127.0.0.1:8000/lyrics
http://127.0.0.1:8000/history
http://127.0.0.1:8000/premiums
http://127.0.0.1:8000/premiums/create
```

---

## Cara Menggunakan Aplikasi

### 1. Register Akun

Buka halaman:

```bash
http://127.0.0.1:8000/register
```

Isi data:

- Nama
- Email
- Password
- Konfirmasi password

Setelah berhasil register, data user akan tersimpan di database.

---

### 2. Login

Buka halaman:

```bash
http://127.0.0.1:8000/login
```

Masukkan email dan password yang sudah terdaftar.

---

### 3. Melihat Profile

Setelah login, user dapat membuka halaman:

```bash
http://127.0.0.1:8000/profile
```

Halaman ini menampilkan data user seperti nama, email, dan tanggal akun dibuat.

---

### 4. Melihat Rekomendasi Musik

Buka halaman:

```bash
http://127.0.0.1:8000/recommendations
```

User dapat melihat daftar rekomendasi musik yang tersedia.

---

### 5. Menambahkan Rekomendasi Musik

Buka halaman:

```bash
http://127.0.0.1:8000/recommendations/create
```

User dapat menambahkan rekomendasi lagu baru melalui form.

---

### 6. Mencari Lagu

Buka halaman:

```bash
http://127.0.0.1:8000/search
```

User dapat mencari lagu berdasarkan judul lagu atau nama artis.

---

### 7. Melihat Discovery Song

Buka halaman:

```bash
http://127.0.0.1:8000/discovery
```

User dapat melihat daftar lagu terbaru dan lagu populer.

---

### 8. Menambahkan Lagu ke Favorite

Pada halaman rekomendasi, user dapat menekan tombol favorite untuk menyimpan lagu ke daftar favorite.

Daftar favorite dapat dilihat melalui:

```bash
http://127.0.0.1:8000/favorites
```

---

### 9. Melihat Lirik Lagu

Buka halaman:

```bash
http://127.0.0.1:8000/lyrics
```

User dapat memilih lagu dan melihat detail lirik dari lagu tersebut.

---

### 10. Melihat History Lagu

Buka halaman:

```bash
http://127.0.0.1:8000/history
```

User dapat melihat riwayat lagu yang pernah diputar.

---

### 11. Menggunakan Premium

Buka halaman:

```bash
http://127.0.0.1:8000/premiums
```

User dapat melihat status akun dan memilih paket premium.

---

## Perintah Artisan yang Sering Digunakan

Menjalankan server Laravel:

```bash
php artisan serve
```

Menjalankan migration:

```bash
php artisan migrate
```

Menjalankan migration ulang dari awal:

```bash
php artisan migrate:fresh
```

Menjalankan seeder:

```bash
php artisan db:seed
```

Menjalankan migration ulang sekaligus seeder:

```bash
php artisan migrate:fresh --seed
```

Membersihkan cache konfigurasi:

```bash
php artisan config:clear
```

Membersihkan cache aplikasi:

```bash
php artisan cache:clear
```

Membersihkan cache route:

```bash
php artisan route:clear
```

Melihat daftar route:

```bash
php artisan route:list
```

---

## Troubleshooting

### 1. Error Database Tidak Terkoneksi

Pastikan MySQL di XAMPP sudah menyala.

Cek konfigurasi `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=music_player_laravel
DB_USERNAME=root
DB_PASSWORD=
```

Lalu jalankan:

```bash
php artisan config:clear
php artisan cache:clear
```

---

### 2. Error Table Tidak Ditemukan

Jalankan migration:

```bash
php artisan migrate
```

Jika masih error, jalankan ulang dari awal:

```bash
php artisan migrate:fresh --seed
```

---

### 3. Error APP_KEY Tidak Ada

Jalankan:

```bash
php artisan key:generate
```

---

### 4. Error 500 Setelah Mengubah .env

Jalankan:

```bash
php artisan config:clear
php artisan cache:clear
php artisan serve
```

---

### 5. Error Route Tidak Ditemukan

Cek daftar route dengan:

```bash
php artisan route:list
```

Jika route sudah benar tetapi masih error, jalankan:

```bash
php artisan route:clear
php artisan cache:clear
```

---

### 6. Error Composer Dependency

Jalankan ulang install dependency:

```bash
composer install
```

Jika masih bermasalah:

```bash
composer update
```

---

### 7. Halaman Tidak Bisa Dibuka

Pastikan server Laravel sudah berjalan:

```bash
php artisan serve
```

Kemudian buka:

```bash
http://127.0.0.1:8000
```

---

## Catatan Pengembangan

Project ini menggunakan Laravel sebagai framework utama untuk membangun backend dan tampilan web sederhana. Database menggunakan MySQL yang dikelola melalui phpMyAdmin. Setiap fitur dibuat menggunakan route, controller, model, migration, seeder, dan blade view.

Project ini juga menggunakan GitHub sebagai media kolaborasi kelompok sehingga setiap anggota dapat mengerjakan fitur masing-masing secara terpisah.

---

## Status Project

Project Music Player Laravel sudah memiliki fitur utama berikut:

- Auth user selesai
- Register selesai
- Login selesai
- Logout selesai
- Profile selesai
- Search song selesai
- Discovery song selesai
- Favorite song selesai
- Lyrics selesai
- History selesai
- Recommendation selesai
- Premium selesai

---

## Repository

Repository GitHub:

```bash
https://github.com/HansMosesP/music-player-laravel.git
```

---

## Author

Final Project UAS Backend Programming  
Program Studi Teknik Informatika  
Fakultas Teknologi Informasi  
Universitas Tarumanagara  
Jakarta  
2026
