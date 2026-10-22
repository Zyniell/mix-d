# Mix-D — Men's Footwear Catalog & WhatsApp Checkout

**Mix-D** adalah platform web katalog & toko online spesialis sepatu pria (_Men's Footwear_) yang dirancang dengan antarmuka maskulin dan premium. Aplikasi ini dilengkapi dengan alur pemesanan langsung ke WhatsApp (_WhatsApp Direct Checkout_) dengan pesan otomatis yang rapi, serta panel administrasi (_back-office_) untuk memantau trafik pengunjung dan mengelola katalog sepatu secara menyeluruh.

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

Jalankan perintah berikut di terminal:

```bash
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

1. Pastikan servis **Apache** dan **MySQL** telah berjalan (_Started_).
2. Buka browser dan akses:
   - **Katalog Publik**: [http://localhost/mix-d/](http://localhost/mix-d/)
   - **Panel Admin**: [http://localhost/mix-d/admin/login](http://localhost/mix-d/admin/login)

#### Opsi B: Menggunakan PHP Built-in Web Server

Jika Anda ingin menjalankan server langsung via terminal dari folder proyek:

```bash
php -S localhost:8000
```

Lalu buka [http://localhost:8000/](http://localhost:8000/) di browser Anda.
