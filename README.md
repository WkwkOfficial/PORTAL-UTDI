# Portal Layanan Mahasiswa — Universitas Teknologi Digital Indonesia (UTDI)

Portal web terpusat yang memudahkan mahasiswa **Universitas Teknologi Digital Indonesia (UTDI)** mengakses berbagai tautan layanan kampus secara cepat dan terstruktur. Dilengkapi dengan fitur pencarian instan, filter kategori layanan, informasi kontak bantuan resmi, serta dashboard admin untuk mengelola data layanan secara dinamis.

---

## Fitur Utama

### Halaman Publik (Mahasiswa)
- **Direktori Layanan Terkategori:** Pengelompokan tautan berdasarkan kategori **Akademik**, **Perpustakaan**, dan **UPT Lab & Sertifikasi**.
- **Pencarian & Filter Real-Time:** Pencarian cepat berdasarkan nama maupun deskripsi layanan tanpa memuat ulang halaman.
- **Penanda Akun Khusus:** Label peringatan *Wajib Akun Student* untuk formulir atau layanan yang memerlukan email institusi (`@students.utdi.ac.id`).
- **Kontak Bantuan Resmi:** Akses langsung ke layanan informasi resmi kampus melalui WhatsApp, Instagram, dan Email.
- **Desain Responsif:** Tampilan dioptimalkan untuk perangkat Desktop, Laptop, Tablet, maupun Smartphone.

### Panel Administrator
- **Manajemen Layanan (CRUD):** Menambah, mengubah, mengurutkan, mengaktifkan/menonaktifkan, serta menghapus item layanan kampus.
- **Manajemen Akun & Keamanan:** Fitur pembaruan kata sandi administrator secara mandiri melalui dashboard.

---

## Teknologi yang Digunakan

- **Backend:** PHP 8.x & Laravel
- **Frontend:** Blade Templates, Tailwind CSS, Vanilla JavaScript
- **Database:** MySQL / MariaDB / SQLite
- **Containerization:** Docker & Docker Compose (Nginx, PHP-FPM, Supervisor)

---

## Panduan Instalasi (Lokal)

1. **Clone repositori:**
   ```bash
   git clone https://github.com/WkwkOfficial/PORTAL-UTDI.git
   cd PORTAL-UTDI
   ```

2. **Install dependensi PHP & Frontend:**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Konfigurasi file environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Sesuaikan pengaturan koneksi database (`DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) di dalam file `.env`.

4. **Jalankan migrasi database dan data awal (seeder):**
   ```bash
   php artisan migrate --seed
   ```

5. **Jalankan server pengembangan:**
   ```bash
   php artisan serve
   ```
   Akses aplikasi melalui browser di `http://127.0.0.1:8000`.

---

## Menjalankan dengan Docker

Pastikan Docker dan Docker Compose sudah terpasang di server atau perangkat Anda:

1. **Salin dan sesuaikan file environment:**
   ```bash
   cp .env.example .env
   ```

2. **Build dan jalankan container:**
   ```bash
   docker compose up -d --build
   ```

3. **Jalankan migrasi di dalam container (jika pertama kali deploy):**
   ```bash
   docker compose exec app php artisan migrate --seed
   ```

---

## Struktur Direktori Penting

```text
├── app/Http/Controllers/   # Logika halaman publik, autentikasi, dan manajemen admin
├── database/
│   ├── migrations/         # Skema tabel layanan dan pengguna
│   └── seeders/            # Data awal tautan layanan UTDI & akun admin default
├── docker/                 # Konfigurasi Nginx dan Supervisor untuk container
├── public/                 # Aset publik & favicon
├── resources/views/        # Tampilan Blade (home, login, dan dashboard admin)
├── routes/web.php          # Definisi rute publik dan rute terproteksi admin
├── Dockerfile              # Konfigurasi image aplikasi
└── docker-compose.yml      # Orkestrasi layanan container
```

---

## Catatan Keamanan Deployment
- Pastikan nilai `APP_ENV=production` dan `APP_DEBUG=false` diterapkan saat rilis ke server kampus.
- Segera ubah kata sandi akun administrator bawaan setelah proses `db:seed` selesai dilakukan pada lingkungan produksi.
