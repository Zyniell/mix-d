<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id" class="h-full bg-stone-50 scroll-smooth">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= isset($page_title) ? html_escape($page_title) . ' | ' : '' ?><?= html_escape(isset($store_settings['store_name']) ? $store_settings['store_name'] : 'Mix-D Men\'s Footwear') ?></title>
	<meta name="description" content="<?= html_escape(isset($store_settings['store_tagline']) ? $store_settings['store_tagline'] : 'Sepatu Pria Berkualitas & Berkarakter • Handcrafted Footwear') ?>">
	<meta name="theme-color" content="#0c0a09">

	<!-- Google Fonts: Playfair Display + Plus Jakarta Sans + JetBrains Mono -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;0,900;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">

	<!-- Tailwind CSS CDN -->
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					fontFamily: {
						sans: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
						serif: ['"Playfair Display"', 'Georgia', 'serif'],
						mono: ['"JetBrains Mono"', 'monospace'],
					},
					colors: {
						brand: {
							50: '#fdf8f0',
							100: '#f8edd8',
							200: '#f0d9b1',
							300: '#e5be82',
							400: '#d9a155',
							500: '#c27803',
							600: '#b45309',
							700: '#92400e',
							800: '#78350f',
							900: '#451a03',
							950: '#260e02',
						},
						stone: {
							50: '#faf8f5',
							100: '#f5f2eb',
							200: '#eae5db',
							300: '#d6cfc2',
							400: '#a89f91',
							500: '#78716c',
							600: '#57534e',
							700: '#44403c',
							800: '#292524',
							900: '#1c1917',
							950: '#0c0a09',
						}
					},
					boxShadow: {
						'leather': '0 10px 30px -5px rgba(180, 83, 9, 0.12), 0 4px 6px -2px rgba(180, 83, 9, 0.05)',
						'warm': '0 20px 40px -15px rgba(28, 25, 23, 0.08)',
						'card': '0 1px 3px 0 rgba(0, 0, 0, 0.02), 0 4px 12px 0 rgba(28, 25, 23, 0.04)',
					}
				}
			}
		}
	</script>

	<style>
		body {
			font-family: 'Plus Jakarta Sans', sans-serif;
			background-color: #faf8f5;
		}
		.font-tabular {
			font-variant-numeric: tabular-nums;
		}
		.bg-noise {
			background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.04'/%3E%3C/svg%3E");
		}
		/* Focus accessibility outline */
		a:focus-visible, button:focus-visible, input:focus-visible, select:focus-visible, textarea:focus-visible {
			outline: 2px solid #b45309;
			outline-offset: 2px;
		}
	</style>
</head>
<body class="flex flex-col min-h-screen text-stone-800 antialiased selection:bg-brand-600 selection:text-white bg-stone-50">

	<!-- Skip to Content for Keyboard Accessibility -->
	<a href="#mainContent" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2 focus:bg-stone-950 focus:text-white focus:rounded-xl focus:shadow-2xl text-xs font-bold tracking-wider uppercase">
		Langsung ke Konten Utama
	</a>

	<!-- Top Editorial Announcement Bar -->
	<div class="bg-stone-950 text-stone-300 text-xs py-2 px-4 border-b border-stone-800/80 relative overflow-hidden">
		<div class="absolute inset-0 bg-noise pointer-events-none opacity-40"></div>
		<div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2 relative z-10">
			<div class="flex items-center gap-2 text-center sm:text-left text-[11px] font-medium text-stone-300">
				<span class="inline-block w-1.5 h-1.5 rounded-full bg-brand-500 animate-pulse"></span>
				<span class="tracking-wide">Koleksi Sepatu Pria Terpilih • Konsultasi Ukuran Gratis via WhatsApp</span>
			</div>
			<div class="flex items-center gap-5 text-[11px] text-stone-400">
				<?php if (!empty($store_settings['store_email'])): ?>
					<span class="hidden md:inline hover:text-stone-300 transition">
						✉ <?= html_escape($store_settings['store_email']) ?>
					</span>
				<?php endif; ?>
				<?php if (!empty($store_settings['whatsapp_number'])): ?>
					<a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $store_settings['whatsapp_number']) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-brand-400 transition flex items-center gap-1.5 font-semibold text-stone-300">
						<svg class="w-3.5 h-3.5 text-emerald-400 fill-current" viewBox="0 0 24 24">
							<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
						</svg>
						<span>CS WhatsApp: <?= html_escape($store_settings['whatsapp_number']) ?></span>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Main Navbar -->
	<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-stone-200/80 transition-shadow duration-300 shadow-sm">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex items-center justify-between h-20">
				
				<!-- Brand Logo -->
				<a href="<?= base_url() ?>" class="flex items-center gap-3.5 group">
					<div class="w-11 h-11 bg-stone-950 text-white rounded-xl flex items-center justify-center font-serif font-black text-xl tracking-wider shadow-md border border-stone-800 group-hover:bg-brand-700 transition duration-300">
						M<span class="text-brand-400 group-hover:text-amber-200">D</span>
					</div>
					<div>
						<div class="flex items-center gap-1.5">
							<span class="font-serif font-extrabold text-xl tracking-tight text-stone-950 group-hover:text-brand-700 transition">MIX-D</span>
							<span class="w-1.5 h-1.5 rounded-full bg-brand-600 inline-block"></span>
						</div>
						<span class="block text-[10px] font-semibold tracking-[0.2em] text-stone-500 uppercase">Men's Footwear</span>
					</div>
				</a>

				<!-- Desktop Nav Links -->
				<nav class="hidden md:flex items-center gap-10 text-sm font-semibold tracking-wide text-stone-600">
					<a href="<?= base_url() ?>" class="relative py-2 hover:text-stone-950 transition <?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'beranda') ? 'text-brand-700 font-bold' : '' ?>">
						Beranda
						<?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'beranda'): ?>
							<span class="absolute bottom-0 left-0 w-full h-0.5 bg-brand-600 rounded-full"></span>
						<?php endif; ?>
					</a>
					<a href="<?= base_url('produk') ?>" class="relative py-2 hover:text-stone-950 transition <?= ($this->uri->segment(1) == 'produk' || $this->uri->segment(1) == 'products') ? 'text-brand-700 font-bold' : '' ?>">
						Katalog Sepatu
						<?php if ($this->uri->segment(1) == 'produk' || $this->uri->segment(1) == 'products'): ?>
							<span class="absolute bottom-0 left-0 w-full h-0.5 bg-brand-600 rounded-full"></span>
						<?php endif; ?>
					</a>
					<a href="<?= base_url('tentang-kami') ?>" class="relative py-2 hover:text-stone-950 transition <?= ($this->uri->segment(1) == 'tentang-kami' || $this->uri->segment(1) == 'about') ? 'text-brand-700 font-bold' : '' ?>">
						Tentang Mix-D
						<?php if ($this->uri->segment(1) == 'tentang-kami' || $this->uri->segment(1) == 'about'): ?>
							<span class="absolute bottom-0 left-0 w-full h-0.5 bg-brand-600 rounded-full"></span>
						<?php endif; ?>
					</a>
				</nav>

				<!-- Header Right Actions -->
				<div class="flex items-center gap-3.5">
					
					<!-- Cart Button with Refined Badge -->
					<a href="<?= base_url('keranjang') ?>" class="relative inline-flex items-center gap-2.5 px-4 py-2.5 rounded-xl bg-stone-100 hover:bg-stone-200/90 text-stone-900 font-semibold text-xs tracking-wide transition active:scale-[0.98] border border-stone-200">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-stone-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
						</svg>
						<span class="hidden sm:inline">Keranjang</span>
						<span id="headerCartCount" class="inline-flex items-center justify-center min-w-[20px] h-5 px-1.5 text-[11px] font-bold leading-none text-white bg-brand-600 rounded-full shadow-sm font-tabular">
							<?= isset($cart_count) ? (int)$cart_count : 0 ?>
						</span>
					</a>

					<!-- Mobile Menu Toggle Button -->
					<button id="mobileMenuBtn" type="button" aria-label="Buka Menu Navigasi" class="md:hidden p-2.5 rounded-xl text-stone-700 hover:text-stone-950 hover:bg-stone-100 border border-stone-200 focus:outline-none">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
						</svg>
					</button>
				</div>
			</div>
		</div>

		<!-- Mobile Navigation Menu -->
		<div id="mobileMenu" class="hidden md:hidden border-t border-stone-200 bg-white px-5 pt-3 pb-5 space-y-2 shadow-lg">
			<a href="<?= base_url() ?>" class="block px-3.5 py-2.5 rounded-xl text-sm font-semibold transition <?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'beranda') ? 'bg-brand-50 text-brand-800' : 'text-stone-700 hover:bg-stone-100' ?>">Beranda</a>
			<a href="<?= base_url('produk') ?>" class="block px-3.5 py-2.5 rounded-xl text-sm font-semibold transition <?= ($this->uri->segment(1) == 'produk' || $this->uri->segment(1) == 'products') ? 'bg-brand-50 text-brand-800' : 'text-stone-700 hover:bg-stone-100' ?>">Katalog Sepatu</a>
			<a href="<?= base_url('tentang-kami') ?>" class="block px-3.5 py-2.5 rounded-xl text-sm font-semibold transition <?= ($this->uri->segment(1) == 'tentang-kami' || $this->uri->segment(1) == 'about') ? 'bg-brand-50 text-brand-800' : 'text-stone-700 hover:bg-stone-100' ?>">Tentang Mix-D</a>
			<a href="<?= base_url('keranjang') ?>" class="block px-3.5 py-2.5 rounded-xl text-sm font-semibold text-stone-800 hover:bg-stone-100 border border-stone-200">
				Keranjang Belanja (<?= isset($cart_count) ? (int)$cart_count : 0 ?> item)
			</a>
		</div>
	</header>

	<!-- Floating Flash Toast Notifications -->
	<?php $this->load->view('partials/flash_toast'); ?>


	<!-- Main Content Container -->
	<main id="mainContent" class="flex-grow">

