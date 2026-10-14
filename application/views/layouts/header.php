<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= isset($page_title) ? html_escape($page_title) . ' | ' : '' ?><?= html_escape(isset($store_settings['store_name']) ? $store_settings['store_name'] : 'Mix-D Men\'s Footwear') ?></title>
	<meta name="description" content="<?= html_escape(isset($store_settings['store_tagline']) ? $store_settings['store_tagline'] : 'Toko Sepatu Pria Berkualitas & Berkarakter') ?>">

	<!-- Tailwind CSS CDN -->
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					fontFamily: {
						sans: ['"Plus Jakarta Sans"', 'sans-serif'],
					},
					colors: {
						brand: {
							50: '#fbf7ee',
							100: '#f4ebd4',
							500: '#c28b26',
							600: '#a56f1a',
							700: '#845316',
							800: '#6d4217',
							900: '#5c3716',
						},
						dark: {
							800: '#1e293b',
							900: '#0f172a',
							950: '#020617',
						}
					}
				}
			}
		}
	</script>

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

	<style>
		body {
			font-family: 'Plus Jakarta Sans', sans-serif;
		}
	</style>
</head>
<body class="flex flex-col min-h-screen text-slate-800 antialiased selection:bg-amber-600 selection:text-white">

	<!-- Top Bar -->
	<div class="bg-dark-950 text-slate-300 text-xs py-2 px-4 border-b border-slate-800">
		<div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
			<div class="flex items-center gap-2 text-center sm:text-left">
				<span class="inline-block w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
				<span><?= html_escape(isset($store_settings['store_tagline']) ? $store_settings['store_tagline'] : 'Spesialis Sepatu Pria Berkualitas & Berkarakter') ?></span>
			</div>
			<div class="flex items-center gap-4 text-slate-400">
				<?php if (!empty($store_settings['store_email'])): ?>
					<span class="hidden md:inline">✉ <?= html_escape($store_settings['store_email']) ?></span>
				<?php endif; ?>
				<?php if (!empty($store_settings['whatsapp_number'])): ?>
					<a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $store_settings['whatsapp_number']) ?>" target="_blank" class="hover:text-amber-400 transition flex items-center gap-1">
						<span>WhatsApp: <?= html_escape($store_settings['whatsapp_number']) ?></span>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Main Navbar -->
	<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md shadow-sm border-b border-slate-200">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex items-center justify-between h-20">
				
				<!-- Brand Logo -->
				<a href="<?= base_url() ?>" class="flex items-center gap-3 group">
					<div class="w-11 h-11 bg-dark-950 text-white rounded-xl flex items-center justify-center font-extrabold text-xl tracking-wider shadow-md group-hover:bg-amber-600 transition duration-300">
						M<span class="text-amber-500 group-hover:text-white">D</span>
					</div>
					<div>
						<span class="block font-extrabold text-xl tracking-tight text-dark-900 group-hover:text-amber-700 transition">MIX-D</span>
						<span class="block text-[10px] font-semibold tracking-widest text-slate-500 uppercase">Men's Footwear</span>
					</div>
				</a>

				<!-- Desktop Nav Links -->
				<nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
					<a href="<?= base_url() ?>" class="hover:text-dark-900 transition py-1 <?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'beranda') ? 'text-amber-600 border-b-2 border-amber-600' : '' ?>">Beranda</a>
					<a href="<?= base_url('produk') ?>" class="hover:text-dark-900 transition py-1 <?= ($this->uri->segment(1) == 'produk' || $this->uri->segment(1) == 'products') ? 'text-amber-600 border-b-2 border-amber-600' : '' ?>">Katalog Sepatu</a>
					<a href="<?= base_url('tentang-kami') ?>" class="hover:text-dark-900 transition py-1 <?= ($this->uri->segment(1) == 'tentang-kami' || $this->uri->segment(1) == 'about') ? 'text-amber-600 border-b-2 border-amber-600' : '' ?>">Tentang Kami</a>
				</nav>

				<!-- Header Right Actions -->
				<div class="flex items-center gap-4">
					
					<!-- Cart Button -->
					<a href="<?= base_url('keranjang') ?>" class="relative inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-dark-900 font-semibold text-sm transition">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
						</svg>
						<span class="hidden sm:inline">Keranjang</span>
						<span id="headerCartCount" class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold leading-none text-white bg-amber-600 rounded-full">
							<?= isset($cart_count) ? (int)$cart_count : 0 ?>
						</span>
					</a>

					<!-- Mobile Menu Button -->
					<button id="mobileMenuBtn" type="button" class="md:hidden p-2 rounded-lg text-slate-600 hover:text-dark-900 hover:bg-slate-100 focus:outline-none">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
						</svg>
					</button>
				</div>
			</div>
		</div>

		<!-- Mobile Navigation Menu -->
		<div id="mobileMenu" class="hidden md:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-4 space-y-2">
			<a href="<?= base_url() ?>" class="block px-3 py-2 rounded-lg text-base font-semibold <?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'beranda') ? 'bg-amber-50 text-amber-700' : 'text-slate-700 hover:bg-slate-100' ?>">Beranda</a>
			<a href="<?= base_url('produk') ?>" class="block px-3 py-2 rounded-lg text-base font-semibold <?= ($this->uri->segment(1) == 'produk' || $this->uri->segment(1) == 'products') ? 'bg-amber-50 text-amber-700' : 'text-slate-700 hover:bg-slate-100' ?>">Katalog Sepatu</a>
			<a href="<?= base_url('tentang-kami') ?>" class="block px-3 py-2 rounded-lg text-base font-semibold <?= ($this->uri->segment(1) == 'tentang-kami' || $this->uri->segment(1) == 'about') ? 'bg-amber-50 text-amber-700' : 'text-slate-700 hover:bg-slate-100' ?>">Tentang Kami</a>
			<a href="<?= base_url('keranjang') ?>" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100">
				Keranjang (<?= isset($cart_count) ? (int)$cart_count : 0 ?> item)
			</a>
		</div>
	</header>

	<!-- Flash Messages / Toast Alerts -->
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 w-full">
		<?php if ($this->session->flashdata('success')): ?>
			<div class="mb-4 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-start justify-between shadow-sm">
				<div class="flex items-center gap-3">
					<svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
					</svg>
					<span class="text-sm font-medium"><?= $this->session->flashdata('success') ?></span>
				</div>
				<button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">✕</button>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('error')): ?>
			<div class="mb-4 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 flex items-start justify-between shadow-sm">
				<div class="flex items-center gap-3">
					<svg class="w-5 h-5 text-rose-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
					</svg>
					<span class="text-sm font-medium"><?= $this->session->flashdata('error') ?></span>
				</div>
				<button type="button" onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-700">✕</button>
			</div>
		<?php endif; ?>
	</div>

	<!-- Main Content Container -->
	<main class="flex-grow">
