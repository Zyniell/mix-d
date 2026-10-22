# AGENTS.md — Mix-D Men's Footwear (CodeIgniter 3.1.13)

> [!IMPORTANT]
> **CRITICAL DIRECTIVE FOR ALL AI AGENTS & COLLABORATORS:**
> **Setiap kali melakukan penambahan fitur, perbaikan bug, refactor, atau modifikasi pada kode dan struktur proyek (controllers, models, views, libraries, routes, database, config, styles, atau dependencies), Anda WAJIB memperbarui file [AGENTS.md](file:///c:/laragon/www/mix-d/AGENTS.md) ini pada sesi/turn yang sama agar selalu merefleksikan kondisi proyek terkini.**

---

## 1. Project Overview & Identity
**Mix-D** adalah aplikasi web e-commerce & katalog spesialis sepatu pria (*Men's Footwear*) dengan sistem pemesanan langsung (*direct checkout*) terformat ke WhatsApp serta panel administrasi komprehensif (*back-office dashboard*).

- **Framework**: CodeIgniter 3.1.13 (PHP 8.2+ / PHP 8.3 via Laragon)
- **Database**: MySQL `mix_d` (Koneksi default Laragon: `localhost`, user `root`, tanpa password)
- **Frontend Stack**: Tailwind CSS (via CDN), Google Fonts ([Plus Jakarta Sans](https://fonts.google.com/specimen/Plus+Jakarta+Sans)), FontAwesome 6 & Phosphor Icons
- **Theme & Aesthetic**: Maskulin & Premium — Slate gelap (`slate-950`, `slate-900`) dipadukan dengan aksen *amber leather* (`amber-600`, `amber-500`, `amber-400`) serta tata letak modern dan responsif
- **Metode Transaksi**: WhatsApp Direct Checkout dengan pesan detail pesanan terformat otomatis (*auto-generated structured text*)

---

## 2. Mandatory Protocol: Synchronous Maintenance of AGENTS.md
Setiap agen yang bertugas di repositori ini harus mematuhi siklus kerja berikut:
1. **Analisis Awal**: Baca [AGENTS.md](file:///c:/laragon/www/mix-d/AGENTS.md) untuk memahami arsitektur, rute, skema database, dan aturan sistem sebelum membuat perubahan.
2. **Implementasi**: Kerjakan fitur, perbaikan bug, atau refactor sesuai instruksi dengan tetap mempertahankan standar kode CI3.
3. **Verifikasi**: Lakukan uji sintaks (`php -l`), pastikan CSRF token disertakan pada form POST, dan periksa keutuhan tampilan/alur logika.
4. **Sinkronisasi Dokumentasi (WAJIB)**:
   - Jika ada rute baru, perbarui **Section 7 (Complete Route Mapping)**.
   - Jika ada tabel/kolom baru, perbarui **Section 5 (Database Schema)**.
   - Jika ada controller/model/library baru, perbarui **Section 6 (Architecture & Core Classes)**.
   - Jika ada perubahan konfigurasi, perbarui **Section 4 (Key Configuration)**.
   - Pastikan tidak ada informasi kadaluarsa yang tertinggal di [AGENTS.md](file:///c:/laragon/www/mix-d/AGENTS.md).

---

## 3. Directory Structure
```
mix-d/
├── .agents/                                # Workspace agent rules & skills
│   └── rules/                              # Workspace custom rules (antigravity-rtk-rules.md)
├── application/
│   ├── config/                             # Konfigurasi sistem CodeIgniter
│   │   ├── autoload.php                    # Autoload libraries & helpers
│   │   ├── config.php                      # Base URL dinamis, CSRF token, session, cookie
│   │   ├── database.php                    # Pengaturan koneksi MySQL mix_d
│   │   └── routes.php                      # Pemetaan rute katalog publik & panel admin
│   ├── controllers/                        # Public controllers
│   │   ├── About.php                       # Halaman Tentang Kami
│   │   ├── Auth.php                        # Autentikasi Admin (Login & Logout)
│   │   ├── Cart.php                        # Keranjang belanja & WhatsApp checkout
│   │   ├── Home.php                        # Halaman utama / etalase unggulan
│   │   ├── Products.php                    # Katalog produk, filter kategori, search, detail produk
│   │   ├── Welcome.php                     # Default controller bawaan framework
│   │   └── admin/                          # Protected admin controllers
│   │       ├── Categories.php              # Manajemen kategori (CRUD)
│   │       ├── Dashboard.php               # Ringkasan KPI, total pengunjung, & analitik
│   │       ├── Products.php                # Manajemen produk (CRUD + upload foto)
│   │       └── Settings.php                # Pengaturan toko & nomor WhatsApp tujuan
│   ├── core/
│   │   └── MY_Controller.php               # Base Controller: MY_Controller & Admin_Controller
│   ├── libraries/
│   │   └── Cart_service.php                # Service keranjang berbasis session & builder pesan WA
│   ├── models/
│   │   ├── Category_model.php              # Model kategori produk
│   │   ├── Product_model.php               # Model katalog, filter, stok, views, dan slug
│   │   ├── Setting_model.php               # Model key-value store_settings
│   │   ├── User_model.php                  # Model admin user & rate-limiting login
│   │   └── Visitor_model.php               # Model analitik dan pencatatan kunjungan unik
│   └── views/
│       ├── about/                          # View profil & nilai keunggulan Mix-D
│       ├── admin/                          # View template & halaman admin back-office
│       │   ├── categories/                 # Index & Form tambah/edit kategori
│       │   ├── dashboard/                  # Dashboard cards, chart pengunjung 7 hari, stok tipis
│       │   ├── layouts/                    # Header (sidebar + topbar) & footer admin
│       │   ├── products/                   # Index katalog produk & Form tambah/edit produk
│       │   └── settings/                   # Form pengaturan toko & kontak WhatsApp
│       ├── auth/                           # Halaman login administrator
│       ├── cart/                           # Tampilan keranjang & form data pemesan WhatsApp
│       ├── home/                           # Hero banner, etalase kategori, & produk unggulan
│       ├── layouts/                        # Header & footer publik
│       ├── partials/                       # Shared partials: flash_toast.php (Floating toast notifications)
│       └── products/                       # Grid katalog (filter/sort) & detail produk
├── database.sql                            # DDL Skema tabel MySQL & seed data awal
├── index.php                               # Front controller CodeIgniter
├── uploads/
│   └── products/                           # Direktori penyimpanan gambar katalog produk
└── vendor/                                 # Dependensi Composer (jika digunakan)
```

---

## 4. Key Configuration & Conventions

### Dynamic Base URL ([config.php](file:///c:/laragon/www/mix-d/application/config/config.php))
Base URL dikonfigurasi secara otomatis membaca protokol dan host browser (`$_SERVER['HTTP_HOST']`), dengan fallback ke `http://localhost/mix-d/`. `index_page` dikosongkan (`''`) bekerja sama dengan `.htaccess` mod_rewrite.

### Autoload ([autoload.php](file:///c:/laragon/www/mix-d/application/config/autoload.php))
- **Libraries**: `database`, `session`, `form_validation`
- **Helpers**: `url`, `file`, `form`, `html`, `security`

### Database ([database.php](file:///c:/laragon/www/mix-d/application/config/database.php))
- **Hostname**: `localhost`
- **Username**: `root`
- **Password**: `''`
- **Database**: `mix_d`
- **Driver**: `mysqli`
- **Charset / Collat**: `utf8mb4` / `utf8mb4_unicode_ci`

### CSRF Protection ([config.php](file:///c:/laragon/www/mix-d/application/config/config.php))
CSRF Protection **aktif secara global**:
- `csrf_token_name`: `csrf_mixd_token`
- `csrf_cookie_name`: `csrf_mixd_cookie`
- `csrf_expire`: 7200 detik (2 jam)
- `csrf_regenerate`: `FALSE` (mencegah token expired pada tab ganda/request asinkron)
> [!IMPORTANT]
> Setiap form POST **wajib** menyertakan hidden input CSRF token:
> ```html
> <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
> ```

### Session & Media Uploads
- Session dikelola oleh CodeIgniter session driver.
- Gambar produk diunggah ke folder [uploads/products/](file:///c:/laragon/www/mix-d/uploads/products/) dengan validasi ekstensi (`jpg|jpeg|png|webp`) dan batas ukuran maksimal 3MB.

---

## 5. Database Schema & Initial Data
Skema lengkap dan data awal tersedia di [database.sql](file:///c:/laragon/www/mix-d/database.sql).

### Tabel Database (`mix_d`)
1. **`users`**: Akun administrator sistem (`id`, `username`, `name`, `email`, `password`, `created_at`, `updated_at`).
2. **`categories`**: Kategori sepatu (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`).
   - Contoh data awal: *Sneakers*, *Formal & Oxford*, *Boots Pria*, *Loafers & Slip-on*, *Sandal Pria*.
3. **`products`**: Data katalog sepatu (`id`, `category_id`, `name`, `slug`, `price`, `original_price`, `stock`, `available_sizes`, `image`, `description`, `views`, `is_active`, `created_at`, `updated_at`).
   - Mendukung opsi ukuran jamak dipisahkan koma (contoh: `39,40,41,42,43,44`).
4. **`store_settings`**: Konfigurasi toko format key-value (`setting_key`, `setting_value`).
   - Kunci utama: `store_name`, `store_tagline`, `whatsapp_number`, `store_email`, `store_address`, `about_text`.
5. **`visitor_logs`**: Catatan analitik kunjungan harian per IP (`id`, `ip_address`, `user_agent`, `page_url`, `visit_date`, `created_at`).
6. **`login_attempts`**: Proteksi brute-force login admin per alamat IP (`id`, `ip_address`, `attempt_time`).

### Akun Administrator Bawaan
- **URL Login**: `http://localhost/mix-d/admin/login` atau `http://localhost/mix-d/login`
- **Username**: `admin`
- **Email**: `admin@mixd.com`
- **Password**: `admin123` *(di-enkripsi menggunakan `PASSWORD_BCRYPT`)*

---

## 6. Architecture & Core Classes

### Base Controllers ([MY_Controller.php](file:///c:/laragon/www/mix-d/application/core/MY_Controller.php))
- **[MY_Controller](file:///c:/laragon/www/mix-d/application/core/MY_Controller.php#L8-L74)**:
  - Base class untuk seluruh controller publik ([Home](file:///c:/laragon/www/mix-d/application/controllers/Home.php), [Products](file:///c:/laragon/www/mix-d/application/controllers/Products.php), [Cart](file:///c:/laragon/www/mix-d/application/controllers/Cart.php), [About](file:///c:/laragon/www/mix-d/application/controllers/About.php)).
  - Memuat [Setting_model](file:///c:/laragon/www/mix-d/application/models/Setting_model.php), [Visitor_model](file:///c:/laragon/www/mix-d/application/models/Visitor_model.php), dan [Cart_service](file:///c:/laragon/www/mix-d/application/libraries/Cart_service.php).
  - Menyediakan data toko global `$this->data['store_settings']` dan badge total keranjang `$this->data['cart_count']`.
  - Melacak pengunjung unik publik secara otomatis via `$this->trackVisitor()` ke tabel `visitor_logs`.
  - Helper rendering publik: `$this->render($viewPath, $viewData)` yang otomatis membungkus tampilan dengan `layouts/header` dan `layouts/footer`.
- **[Admin_Controller](file:///c:/laragon/www/mix-d/application/core/MY_Controller.php#L77-L108)**:
  - Base class untuk seluruh controller di subdirektori `admin/`.
  - Memverifikasi session `admin_logged_in`. Jika tidak valid, me-redirect ke rute `admin/login` dengan flash error.
  - Helper rendering admin: `$this->renderAdmin($viewPath, $viewData)` yang membungkus tampilan dengan `admin/layouts/header` (sidebar + top navbar) dan `admin/layouts/footer`.

### Cart & WhatsApp Service ([Cart_service.php](file:///c:/laragon/www/mix-d/application/libraries/Cart_service.php))
- Menyimpan item keranjang dalam session `mixd_cart`.
- Kunci item unik menggabungkan ID produk dan ukuran yang dipilih: `$key = $product_id . '_' . $size`.
- Mendukung penambahan item dengan ukuran tertentu, perubahan kuantitas, penghapusan baris, pembersihan total keranjang, dan kalkulasi subtotal.
- Metode `buildWhatsAppMessage($customer, $storeName)` merangkai format teks WhatsApp rapi yang mencantumkan nama sepatu, ukuran, kuantitas, harga, total belanja, serta nama penerima, no handphone, dan alamat pengiriman lengkap.

### Floating Toast Notifications ([flash_toast.php](file:///c:/laragon/www/mix-d/application/views/partials/flash_toast.php))
- Komponen notifikasi terpusat untuk menampilkan pesan flash (`success`, `error`, `warning`, `info`) di bagian paling atas tengah layar (*fixed top-5 left-1/2 -translate-x-1/2 z-[9999]*).
- Tidak menggeser tata letak konten halaman (*zero layout shift*).
- Dilengkapi timer otomatis (*auto-dismiss* 4.5 detik), indikator *progress bar* countdown, tombol tutup manual `✕`, efek *pause-on-hover*, dan animasi halus (*slide-in/fade-in & slide-up/fade-out*).
- Di-include secara terpadu oleh [layouts/header.php](file:///c:/laragon/www/mix-d/application/views/layouts/header.php), [admin/layouts/header.php](file:///c:/laragon/www/mix-d/application/views/admin/layouts/header.php), dan [auth/login.php](file:///c:/laragon/www/mix-d/application/views/auth/login.php).

### Models ([application/models/](file:///c:/laragon/www/mix-d/application/models/))
- **[Product_model.php](file:///c:/laragon/www/mix-d/application/models/Product_model.php)**: Penanganan katalog produk, filter pencarian & kategori, sorting (harga rendah/tinggi, terpopuler, terbaru), slug generator unik, pencatatan view produk, deteksi stok menipis.
- **[Category_model.php](file:///c:/laragon/www/mix-d/application/models/Category_model.php)**: Pengelolaan kategori sepatu dan penghitungan jumlah produk aktif per kategori.
- **[Setting_model.php](file:///c:/laragon/www/mix-d/application/models/Setting_model.php)**: Pengambilan pengaturan toko key-value dan update batch pengaturan.
- **[User_model.php](file:///c:/laragon/www/mix-d/application/models/User_model.php)**: Verifikasi password bcrypt admin dan mekanisme proteksi rate limiting (*maksimal 5 kesalahan login per 15 menit*).
- **[Visitor_model.php](file:///c:/laragon/www/mix-d/application/models/Visitor_model.php)**: Logging hit pengunjung harian, rekap total views, dan data statistik 7 hari untuk grafik analitik dashboard.

---

## 7. Complete Route Mapping ([routes.php](file:///c:/laragon/www/mix-d/application/config/routes.php))

### Rute Publik (Toko & Katalog)
- `GET /` atau `GET /beranda` → `Home/index`
- `GET /produk` atau `GET /products` → `Products/index`
  - Mendukung query parameter: `?category=slug&search=keyword&sort=latest|price_asc|price_desc|popular&page=1`
- `GET /produk/(:any)` atau `GET /products/(:any)` → `Products/detail/$1`
- `GET /tentang-kami` atau `GET /about` → `About/index`
- `GET /keranjang` atau `GET /cart` → `Cart/index`
- `POST /cart/add` → `Cart/add` (Input: `product_id`, `size`, `qty`)
- `POST /cart/update` → `Cart/update` (Input: `quantities[key]`)
- `GET /cart/remove/(:any)` → `Cart/remove/$1`
- `GET /cart/clear` → `Cart/clear`
- `POST /cart/checkout` → `Cart/checkout` (Input data penerima, merangkai teks WA, dan redirect ke API WhatsApp)

### Rute Autentikasi Admin
- `GET /login` atau `GET /admin/login` → `Auth/login` (Tampilan login)
- `POST /login` atau `POST /admin/login` → `Auth/login` (Proses verifikasi kredensial)
- `GET /logout` atau `GET /admin/logout` → `Auth/logout` (Hapus session admin)

### Rute Panel Admin (Dilindungi `Admin_Controller`)
- `GET /admin` atau `GET /admin/dashboard` → `admin/Dashboard/index`
- `GET /admin/categories` → `admin/Categories/index`
- `GET /admin/categories/create` → `admin/Categories/create`
- `POST /admin/categories/store` → `admin/Categories/store`
- `GET /admin/categories/edit/(:num)` → `admin/Categories/edit/$1`
- `POST /admin/categories/update/(:num)` → `admin/Categories/update/$1`
- `GET /admin/categories/delete/(:num)` → `admin/Categories/delete/$1`
- `GET /admin/products` → `admin/Products/index`
- `GET /admin/products/create` → `admin/Products/create`
- `POST /admin/products/store` → `admin/Products/store`
- `GET /admin/products/edit/(:num)` → `admin/Products/edit/$1`
- `POST /admin/products/update/(:num)` → `admin/Products/update/$1`
- `GET /admin/products/delete/(:num)` → `admin/Products/delete/$1`
- `GET /admin/settings` → `admin/Settings/index`
- `POST /admin/settings/update` → `admin/Settings/update`

---

## 8. Coding Standards & Development Guidelines
- **Header Script Guard**: Setiap file PHP aplikasi wajib diawali dengan:
  ```php
  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  ```
- **File & Class Naming**:
  - Controller: `application/controllers/NamaController.php` dengan class `NamaController extends MY_Controller` (atau `Admin_Controller`).
  - Model: `application/models/Nama_model.php` dengan class `Nama_model extends CI_Model`.
- **Formatting Style**: Indentasi Tabs, line endings `LF`, format file `UTF-8`.
- **Form POST Security**: Wajib menyertakan token CSRF di setiap form.
- **Validasi Syntax**: Lakukan pengecekan syntax menggunakan `php -l <filepath>` untuk mencegah error tak terduga.
- **Laragon Apache**: Buka browser di `http://localhost/mix-d/`.
- **Built-in PHP Server**: Jalankan `php -S localhost:8000` dari root direktori proyek.
