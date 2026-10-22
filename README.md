# Mix-D — Men's Footwear Catalog & WhatsApp Checkout

**Mix-D** adalah platform web katalog & toko online spesialis sepatu pria (*Men's Footwear*) yang dirancang dengan antarmuka maskulin dan premium. Aplikasi ini dilengkapi dengan alur pemesanan langsung ke WhatsApp (*WhatsApp Direct Checkout*) dengan pesan otomatis yang rapi, serta panel administrasi (*back-office*) untuk memantau trafik pengunjung dan mengelola katalog sepatu secara menyeluruh.

---

## Fitur Utama

### 🛍️ Toko & Katalog Publik
- **Katalog Sepatu Pria**: Koleksi kategori sepatu pria seperti *Sneakers*, *Formal & Oxford*, *Boots Pria*, *Loafers & Slip-on*, dan *Sandal Pria*.
- **Filter & Pencarian**: Filter berdasarkan kategori, pencarian nama sepatu, serta pengurutan (*sorting*) berdasarkan harga terendah, harga tertinggi, terpopuler, dan produk terbaru.
- **Detail Produk & Pemilihan Ukuran**: Tampilan gambar produk, deskripsi material, status stok, serta pemilihan ukuran sepatu (*variants* ukuran 39 s/d 45).
- **Keranjang Belanja (*Session Cart*)**: Penambahan item per varian ukuran, update kuantitas, dan kalkulasi total belanja.
- **WhatsApp Direct Checkout**: Mengubah pesanan dan data pengiriman penerima secara instan menjadi format pesan WhatsApp terstruktur yang siap dikirim langsung ke admin toko.
- **Floating Toast Notification**: Sistem notifikasi melayang di atas layar dengan timer *auto-dismiss*, *progress bar*, dan jeda saat kursor diarahkan (*pause-on-hover*).

### ⚙️ Panel Administrasi (*Back-Office*)
- **Dashboard Analitik**: Grafik batang analitik kunjungan harian (7 hari terakhir), 4 metrik KPI utama, dan tabel produk paling banyak dilihat (*top views*).
- **Manajemen Produk (CRUD)**: Tambah, edit, hapus produk sepatu lengkap dengan upload foto produk dan opsi multi-ukuran.
- **Manajemen Kategori (CRUD)**: Pengelolaan kategori sepatu beserta pemantauan jumlah produk aktif.
- **Pengaturan Toko**: Pengaturan nama toko, tagline, alamat, email, dan nomor tujuan WhatsApp untuk transaksi.
- **Keamanan Akun**: Autentikasi berbasis session, enkripsi password `PASSWORD_BCRYPT`, proteksi CSRF global, dan pencegahan *brute-force* (*rate limiting* percobaan login).

---

## Teknologi yang Digunakan
- **Framework**: [CodeIgniter 3.1.13](https://codeigniter.com/) (PHP 8.2+ / PHP 8.3)
- **Database**: MySQL / MariaDB
- **Frontend / Styling**: [Tailwind CSS](https://tailwindcss.com/) (via CDN)
- **Typography & Icons**: Google Fonts ([Plus Jakarta Sans](https://fonts.google.com/specimen/Plus+Jakarta+Sans)), FontAwesome 6, Phosphor Icons
- **Web Server**: Apache (via Laragon / XAMPP) atau PHP Built-in Server

---

## Panduan Instalasi & Clone Proyek

### 1. Prasyarat Sistem
Pastikan komputer Anda telah terinstal:
- **PHP** versi 8.1, 8.2, atau 8.3
- **MySQL / MariaDB** (direkomendasikan menggunakan [Laragon](https://laragon.org/) atau [XAMPP](https://www.apachefriends.org/))
- **Git**

---

### 2. Clone Repositori
Buka terminal / command prompt, lalu clone repositori ini ke folder root web server Anda:

#### Melalui Laragon (`C:\laragon\www\`):
```bash
cd C:\laragon\www
git clone https://github.com/Zyniell/mix-d.git
cd mix-d
```

#### Melalui XAMPP (`C:\xampp\htdocs\`):
```bash
cd C:\xampp\htdocs
git clone https://github.com/Zyniell/mix-d.git
cd mix-d
```

---

### 3. Konfigurasi Database
1. Buka phpMyAdmin atau database manager pilihan Anda (HeidiSQL / DBeaver).
2. Buat database baru dengan nama `mix_d`:
   ```sql
   CREATE DATABASE mix_d CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
3. Import skema tabel dan data awal ke database `mix_d`.
4. Sesuaikan kredensial koneksi database jika diperlukan pada file `application/config/database.php`:
   ```php
   $db['default'] = array(
       'hostname' => 'localhost',
       'username' => 'root',
       'password' => '',
       'database' => 'mix_d',
       'dbdriver' => 'mysqli',
       ...
   );
   ```

---

### 4. Konfigurasi Base URL
Aplikasi telah dikonfigurasi untuk membaca base URL secara dinamis sesuai host yang sedang dibuka. Namun jika Anda perlu mengaturnya secara manual, Anda dapat memeriksanya di file `application/config/config.php`:
```php
$config['base_url'] = 'http://localhost/mix-d/';
```

---

### 5. Menjalankan Aplikasi

#### Opsi A: Menggunakan Laragon / XAMPP (Direkomendasikan)
1. Pastikan servis **Apache** dan **MySQL** telah berjalan (*Started*).
2. Buka browser dan akses:
   - **Katalog Publik**: [http://localhost/mix-d/](http://localhost/mix-d/)
   - **Panel Admin**: [http://localhost/mix-d/admin/login](http://localhost/mix-d/admin/login)

#### Opsi B: Menggunakan PHP Built-in Web Server
Jika Anda ingin menjalankan server langsung via terminal dari folder proyek:
```bash
php -S localhost:8000
```
Lalu buka [http://localhost:8000/](http://localhost:8000/) di browser Anda.

---

## Kredensial Administrator Bawaan
Untuk login ke panel pengelola toko (*Admin Panel*):
- **URL Login**: `http://localhost/mix-d/admin/login` (atau `http://localhost/mix-d/login`)
- **Username**: `admin`
- **Email**: `admin@mixd.com`
- **Password**: `admin123`

---

## Lisensi & Hak Cipta
Dikembangkan untuk toko sepatu pria **Mix-D**. Dirancang dengan fokus pada kesederhanaan transaksi, performa cepat, dan tampilan maskulin modern.
