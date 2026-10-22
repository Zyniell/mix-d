<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id" class="h-full bg-stone-100">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= isset($page_title) ? html_escape($page_title) . ' | ' : '' ?>Panel Admin Mix-D</title>

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">

	<!-- Tailwind CSS CDN -->
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					fontFamily: {
						sans: ['"Plus Jakarta Sans"', 'sans-serif'],
						serif: ['"Playfair Display"', 'serif'],
						mono: ['"JetBrains Mono"', 'monospace'],
					},
					colors: {
						brand: {
							50: '#fdf8f0',
							100: '#f8edd8',
							500: '#c27803',
							600: '#b45309',
							700: '#92400e',
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
						'card': '0 1px 3px 0 rgba(0, 0, 0, 0.02), 0 4px 12px 0 rgba(28, 25, 23, 0.04)',
					}
				}
			}
		}
	</script>

	<style>
		body {
			font-family: 'Plus Jakarta Sans', sans-serif;
			background-color: #f5f2eb;
		}
		.font-tabular {
			font-variant-numeric: tabular-nums;
		}
		.bg-noise {
			background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.04'/%3E%3C/svg%3E");
		}
	</style>
</head>
<body class="flex h-screen overflow-hidden bg-stone-100 text-stone-800 antialiased selection:bg-brand-600 selection:text-white">

	<!-- Admin Sidebar -->
	<aside id="adminSidebar" class="w-64 h-screen bg-stone-950 text-stone-300 flex-shrink-0 hidden md:flex flex-col justify-between border-r border-stone-800/80 z-30 relative overflow-hidden">
		<div class="absolute inset-0 bg-noise opacity-30 pointer-events-none"></div>

		<div class="overflow-y-auto flex-1 relative z-10">
			<!-- Sidebar Brand -->
			<div class="h-20 flex items-center gap-3.5 px-6 border-b border-stone-800/80 flex-shrink-0">
				<div class="w-9 h-9 bg-brand-700 text-white rounded-xl flex items-center justify-center font-serif font-black text-base shadow border border-brand-600/30">
					MD
				</div>
				<div>
					<div class="flex items-center gap-1.5">
						<span class="block font-serif font-extrabold text-lg text-white tracking-tight">MIX-D</span>
						<span class="w-1.5 h-1.5 rounded-full bg-brand-500 inline-block"></span>
					</div>
					<span class="block text-[10px] font-bold tracking-[0.2em] text-brand-400 uppercase">Panel Admin</span>
				</div>
			</div>

			<!-- Navigation Links (Vector SVGs instead of emojis) -->
			<nav class="p-4 space-y-1.5 text-xs font-semibold tracking-wide">
				<?php 
				$seg2 = $this->uri->segment(2); 
				?>
				<a href="<?= base_url('admin/dashboard') ?>" 
				   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition duration-200 <?= ($seg2 == 'dashboard' || $seg2 == '') ? 'bg-brand-700 text-white shadow-sm' : 'text-stone-400 hover:bg-stone-900 hover:text-white' ?>">
					<svg class="w-4 h-4 <?= ($seg2 == 'dashboard' || $seg2 == '') ? 'text-white' : 'text-stone-400' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
					</svg>
					<span>Dashboard Utama</span>
				</a>

				<a href="<?= base_url('admin/products') ?>" 
				   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition duration-200 <?= ($seg2 == 'products') ? 'bg-brand-700 text-white shadow-sm' : 'text-stone-400 hover:bg-stone-900 hover:text-white' ?>">
					<svg class="w-4 h-4 <?= ($seg2 == 'products') ? 'text-white' : 'text-stone-400' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
					</svg>
					<span>Katalog Produk Sepatu</span>
				</a>

				<a href="<?= base_url('admin/categories') ?>" 
				   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition duration-200 <?= ($seg2 == 'categories') ? 'bg-brand-700 text-white shadow-sm' : 'text-stone-400 hover:bg-stone-900 hover:text-white' ?>">
					<svg class="w-4 h-4 <?= ($seg2 == 'categories') ? 'text-white' : 'text-stone-400' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
					</svg>
					<span>Kelola Kategori</span>
				</a>

				<a href="<?= base_url('admin/settings') ?>" 
				   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition duration-200 <?= ($seg2 == 'settings') ? 'bg-brand-700 text-white shadow-sm' : 'text-stone-400 hover:bg-stone-900 hover:text-white' ?>">
					<svg class="w-4 h-4 <?= ($seg2 == 'settings') ? 'text-white' : 'text-stone-400' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
					</svg>
					<span>Pengaturan Toko & WA</span>
				</a>
			</nav>
		</div>

		<!-- Bottom Store Link -->
		<div class="p-4 border-t border-stone-800/80 space-y-2 flex-shrink-0 relative z-10">
			<a href="<?= base_url() ?>" target="_blank" class="flex items-center justify-between px-3.5 py-2 rounded-xl bg-stone-900 hover:bg-stone-800 text-[11px] text-brand-300 font-semibold transition border border-stone-800">
				<span>Buka Website Toko</span>
				<span>↗</span>
			</a>
			<div class="px-2 py-1 text-[11px] text-stone-400">
				Admin: <strong class="text-stone-300"><?= html_escape(isset($admin_name) ? $admin_name : 'Admin') ?></strong>
			</div>
		</div>
	</aside>

	<!-- Main Wrapper -->
	<div class="flex-1 flex flex-col h-screen overflow-hidden min-w-0">
		
		<!-- Top Bar -->
		<header class="h-20 bg-white border-b border-stone-200/80 px-6 sm:px-8 flex items-center justify-between flex-shrink-0 z-20 shadow-sm">
			<div class="flex items-center gap-4">
				<button id="adminSidebarToggle" type="button" aria-label="Buka Menu Sidebar" class="md:hidden p-2 rounded-xl text-stone-600 hover:text-stone-900 hover:bg-stone-100 border border-stone-200 focus:outline-none">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</button>
				<h2 class="text-lg sm:text-xl font-serif font-bold text-stone-950 tracking-tight">
					<?= isset($page_title) ? html_escape($page_title) : 'Dashboard Admin' ?>
				</h2>
			</div>

			<div class="flex items-center gap-3.5">
				<a href="<?= base_url() ?>" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-stone-200 text-xs font-semibold text-stone-700 hover:bg-stone-50 transition">
					<span>Lihat Toko</span>
					<span>↗</span>
				</a>

				<!-- Logout Button -->
				<a href="<?= base_url('admin/logout') ?>" 
				   onclick="return confirm('Keluar dari sesi admin sekarang?')" 
				   class="px-3.5 py-1.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 font-semibold text-xs transition active:scale-95">
					<span>Logout</span>
				</a>
			</div>
		</header>

		<!-- Scrollable Viewport -->
		<div class="flex-1 overflow-y-auto flex flex-col min-w-0 bg-stone-100">
			
			<!-- Floating Flash Toast Notifications -->
			<?php $this->load->view('partials/flash_toast'); ?>


			<!-- Page Body -->
			<main class="p-6 sm:px-8 pb-16 flex-1">

