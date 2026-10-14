-- =======================================================
-- Database Schema & Seed Data for Mix-D (Men's Shoes Store)
-- Framework: CodeIgniter 3.1.13 | PHP 8.2+
-- =======================================================

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `login_attempts`;
DROP TABLE IF EXISTS `visitor_logs`;
DROP TABLE IF EXISTS `store_settings`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `users`;
SET FOREIGN_KEY_CHECKS = 1;

-- 1. Users Table (Admin)
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Categories Table
CREATE TABLE `categories` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `slug` VARCHAR(120) NOT NULL UNIQUE,
  `description` TEXT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Products Table
CREATE TABLE `products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT NULL,
  `name` VARCHAR(200) NOT NULL,
  `slug` VARCHAR(220) NOT NULL UNIQUE,
  `price` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `original_price` DECIMAL(12,2) NULL DEFAULT NULL,
  `stock` INT NOT NULL DEFAULT 0,
  `available_sizes` VARCHAR(255) NOT NULL DEFAULT '39,40,41,42,43,44',
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `description` TEXT NULL,
  `views` INT NOT NULL DEFAULT 0,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Store Settings Table (Key-Value)
CREATE TABLE `store_settings` (
  `setting_key` VARCHAR(50) PRIMARY KEY,
  `setting_value` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Visitor Logs Table (Analytics)
CREATE TABLE `visitor_logs` (
  `id` BIGINT AUTO_INCREMENT PRIMARY KEY,
  `ip_address` VARCHAR(45) NOT NULL,
  `user_agent` VARCHAR(255) NULL,
  `page_url` VARCHAR(255) NULL,
  `visit_date` DATE NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_visit_date` (`visit_date`),
  INDEX `idx_ip_date` (`ip_address`, `visit_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Login Attempts Table (Rate Limiting)
CREATE TABLE `login_attempts` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `ip_address` VARCHAR(45) NOT NULL,
  `attempt_time` INT NOT NULL,
  INDEX `idx_ip_time` (`ip_address`, `attempt_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =======================================================
-- Seed Initial Data
-- =======================================================

-- Default Admin User (Password: admin123)
INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator Mix-D', 'admin@mixd.com', '$2y$10$.xBsyNZcbSnXbvy9oMnb2eesUHwBSAW4LOZ/zhvNTeUceZT7n6R1q', NOW(), NOW());

-- Initial Categories for Men\'s Shoes
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`) VALUES
(1, 'Sneakers', 'sneakers', 'Koleksi sneakers pria modern, trendi, dan nyaman untuk mobilitas harian santai maupun semi-formal.', NOW()),
(2, 'Formal & Oxford', 'formal-oxford', 'Sepatu kerja dan pesta pria dengan gaya klasik oxford dan derby yang mewah dan berkelas.', NOW()),
(3, 'Boots Pria', 'boots-pria', 'Sepatu boots pria model chelsea dan lace-up berkarakter maskulin untuk tampilan tangguh dan stylish.', NOW()),
(4, 'Loafers & Slip-on', 'loafers-slip-on', 'Sepatu slip-on tanpa tali yang praktis, fleksibel, dan elegan untuk gaya smart-casual.', NOW()),
(5, 'Sandal Pria', 'sandal-pria', 'Sandal santai pria dengan bantalan empuk dan strap kokoh untuk kenyamanan maksimal.', NOW());

-- Initial Products (Men\'s Footwear Catalog)
INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `price`, `original_price`, `stock`, `available_sizes`, `image`, `description`, `views`, `is_active`, `created_at`) VALUES
(1, 2, 'Mix-D Oxford Classic Leather Brown', 'mix-d-oxford-classic-leather-brown', 485000.00, 550000.00, 15, '39,40,41,42,43,44', 'oxford_classic_brown.jpg', 'Sepatu formal pria berbahan premium synthetic leather dengan finishing glossy elegan. Dilengkapi insole memory foam anti-pegal dan outsole karet anti-slip kokoh. Pilihan terbaik untuk kantor, meeting penting, wisuda, maupun pesta formal.', 142, 1, NOW()),
(2, 1, 'Mix-D Urban Low Sneakers White', 'mix-d-urban-low-sneakers-white', 349000.00, 420000.00, 28, '39,40,41,42,43,44,45', 'urban_sneakers_white.jpg', 'Sneakers kasual pria berwarna putih bersih dengan desain minimalis modern. Outsole vulkanisir lentur dan lining mesh berpori yang membuat sirkulasi udara tetap sejuk saat dipakai beraktivitas seharian.', 215, 1, NOW()),
(3, 3, 'Mix-D Chelsea Boots Vintage Tan', 'mix-d-chelsea-boots-vintage-tan', 529000.00, 599000.00, 12, '40,41,42,43,44', 'chelsea_boots_tan.jpg', 'Boots pria model Chelsea dengan panel karet elastis di sisi samping untuk kemudahan pakai. Nuansa vintage tan bertekstur tangguh memberikan aura maskulin khas petualang perkotaan.', 188, 1, NOW()),
(4, 4, 'Mix-D Penny Loafers Noir Black', 'mix-d-penny-loafers-noir-black', 399000.00, 465000.00, 20, '39,40,41,42,43,44', 'penny_loafers_black.jpg', 'Loafers pria tanpa tali yang praktis dan berkelas. Detail saddle klasik dengan jahitan tangan presisi, cocok dipadukan dengan celana ankle pant, chino, maupun setelan jas santai.', 164, 1, NOW()),
(5, 1, 'Mix-D High Top Canvas Navy', 'mix-d-high-top-canvas-navy', 299000.00, 350000.00, 18, '39,40,41,42,43,44', 'high_top_canvas_navy.jpg', 'Sneakers kanvas pria high-top warna navy dengan eyelet kuningan tahan karat. Konstruksi sol tebal namun ringan, pas untuk gaya jalanan dan outfit kasual akhir pekan.', 98, 1, NOW()),
(6, 2, 'Mix-D Derby Brogue Dark Coffee', 'mix-d-derby-brogue-dark-coffee', 499000.00, 580000.00, 10, '40,41,42,43,44', 'derby_brogue_coffee.jpg', 'Sepatu Derby pria beraksen brogue klasik warna dark coffee pekat. Detail perforasi artistik memberikan sentuhan maskulin abadi yang meningkatkan rasa percaya diri pria sejati.', 135, 1, NOW()),
(7, 4, 'Mix-D Casual Slip-On Suede Khaki', 'mix-d-casual-slip-on-suede-khaki', 325000.00, 380000.00, 22, '39,40,41,42,43,44', 'slipon_suede_khaki.jpg', 'Sepatu slip-on berbahan faux suede lembut warna khaki yang ringan dan breathable. Dilengkapi bantalan tumit empuk untuk sensasi melangkah santai tanpa beban.', 87, 1, NOW()),
(8, 5, 'Mix-D Leather Slide Sandals Black', 'mix-d-leather-slide-sandals-black', 189000.00, 220000.00, 35, '39,40,41,42,43,44', 'slide_sandals_black.jpg', 'Sandal slide pria bertali ganda dengan buckle kokoh. Sol ergonomis mengikuti lekuk telapak kaki, memberikan kenyamanan maksimal untuk waktu santai di rumah atau liburan.', 76, 1, NOW());

-- Initial Store Settings
INSERT INTO `store_settings` (`setting_key`, `setting_value`) VALUES
('store_name', 'Mix-D Men\'s Footwear'),
('store_tagline', 'Spesialis Sepatu Pria Berkualitas & Berkarakter'),
('whatsapp_number', '6281234567890'),
('store_email', 'halo@mixd-shoes.com'),
('store_address', 'Jl. Pria Sejati No. 88, Kebayoran Baru, Jakarta Selatan, DKI Jakarta 12180'),
('about_text', 'Mix-D hadir sebagai solusi kebutuhan alas kaki pria modern Indonesia. Kami berfokus menghadirkan koleksi sepatu pria mulai dari formal, sneakers, boots, hingga loafers yang memadukan kenyamanan maksimal, daya tahan tinggi, dan desain maskulin berkelas tanpa kompromi. Setiap pasang sepatu Mix-D dirancang dengan teliti untuk menemani setiap langkah dan pencapaian pria sejati.');

-- Seed Initial Visitor Logs for Dashboard Analytics
INSERT INTO `visitor_logs` (`ip_address`, `user_agent`, `page_url`, `visit_date`, `created_at`) VALUES
('127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', '/', CURDATE(), NOW()),
('127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', '/produk', CURDATE(), NOW()),
('127.0.0.2', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X)', '/', CURDATE(), NOW()),
('127.0.0.3', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', '/', CURDATE(), NOW());
