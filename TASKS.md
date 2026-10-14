# Task Management - Toko Online Mix-D

Status Legend:
- [ ] Belum dikerjakan
- [/] Sedang dikerjakan
- [x] Selesai

---

## Phase 1: Inisialisasi & Konfigurasi Dasar
- [x] Rencana implementasi disetujui
- [x] Buat file `TASKS.md`
- [x] Konfigurasi `application/config/config.php` (dynamic `base_url`, session, CSRF protection)
- [x] Konfigurasi `application/config/database.php` (MySQL `mix_d`, user `root`)
- [x] Konfigurasi `application/config/autoload.php` (database, session, form_validation, url, form, html, security)
- [x] Konfigurasi `application/config/routes.php` (routing customer & admin yang rapi)
- [x] Buat folder uploads `uploads/products` dan pastikan perizinan tulis

## Phase 2: Skema Database & Migrasi
- [x] Rancang dan buat file `database.sql` (tabel `users`, `categories`, `products`, `store_settings`, `visitor_logs`, `login_attempts`)
- [x] Sertakan data awal (seeding) untuk admin default, kategori sepatu pria, produk contoh, dan pengaturan toko
- [x] Import `database.sql` ke database MySQL `mix_d`

## Phase 3: Core Architecture, Library, & Models
- [x] Buat `application/core/MY_Controller.php` (`MY_Controller` & `Admin_Controller`)
- [x] Buat `application/libraries/Cart_service.php` (sistem keranjang berbasis session dengan varian ukuran sepatu)
- [x] Buat `application/models/Product_model.php` (CRUD, filter, search, top viewed, counter views)
- [x] Buat `application/models/Category_model.php` (CRUD kategori & counter produk)
- [x] Buat `application/models/Setting_model.php` (identitas toko & no WhatsApp)
- [x] Buat `application/models/User_model.php` (autentikasi admin, verifikasi hash BCRYPT, rate limiting)
- [x] Buat `application/models/Visitor_model.php` (tracking kunjungan website)

## Phase 4: Fitur & Halaman Customer (Frontend)
- [x] Buat layout customer: `views/layouts/header.php` & `views/layouts/footer.php` (Tailwind CSS CDN, navigasi responsif, badge keranjang)
- [x] Buat controller & view Beranda: `Home.php` & `views/home/index.php` (Hero, kategori, produk unggulan)
- [x] Buat controller & view Katalog: `Products.php` & `views/products/index.php` (Filter kategori, search, sort, pagination)
- [x] Buat controller & view Detail Produk: `Products.php::detail()` & `views/products/detail.php` (Pilihan ukuran 39-45, galeri, tombol beli, auto counter view)
- [x] Buat controller & view Tentang Kami: `About.php` & `views/about/index.php`
- [x] Buat controller & view Keranjang: `Cart.php` & `views/cart/index.php` (Kelola qty, hapus item, form data pemesan)
- [x] Implementasi checkout WhatsApp terstruktur dengan integrasi link `wa.me`

## Phase 5: Panel Admin
- [x] Buat controller autentikasi & view login: `Auth.php` & `views/auth/login.php` (Proteksi brute-force, flash messages, logout)
- [x] Buat layout admin: `views/admin/layouts/header.php` & `views/admin/layouts/footer.php`
- [x] Buat controller & view Dashboard: `admin/Dashboard.php` & `views/admin/dashboard/index.php` (Statistik pengunjung, top viewed products)
- [x] Buat controller & view Kelola Kategori: `admin/Categories.php` & `views/admin/categories/index.php` & `form.php` (CRUD kategori)
- [x] Buat controller & view Kelola Produk: `admin/Products.php` & `views/admin/products/index.php` & `form.php` (CRUD produk, upload foto, pemilihan varian ukuran)
- [x] Buat controller & view Pengaturan: `admin/Settings.php` & `views/admin/settings/index.php` (Pengaturan toko & no WhatsApp)

## Phase 6: Verifikasi, Polish, & Dokumentasi
- [x] Uji sintaks PHP (`php -l`) pada semua controller, model, dan view
- [x] Uji alur customer (katalog -> detail -> tambah keranjang -> checkout WA)
- [x] Uji alur admin (login -> dashboard -> kelola kategori/produk -> pengaturan)
- [x] Update `AGENTS.md` dengan catatan arsitektur, konvensi, dan kredensial
- [x] Buat walkthrough artifact untuk laporan hasil kerja
