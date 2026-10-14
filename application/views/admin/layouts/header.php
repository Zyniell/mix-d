<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= isset($page_title) ? html_escape($page_title) . ' | ' : '' ?>Panel Admin Mix-D</title>

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
							600: '#a56f1a',
							700: '#845316',
						},
						dark: {
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
<body class="flex h-screen overflow-hidden bg-slate-100 text-slate-800 antialiased">

	<!-- Sidebar -->
	<aside id="adminSidebar" class="w-64 h-screen bg-dark-950 text-slate-300 flex-shrink-0 hidden md:flex flex-col justify-between border-r border-slate-800 z-30">
		<div class="overflow-y-auto flex-1">
			<!-- Sidebar Brand -->
			<div class="h-20 flex items-center gap-3 px-6 border-b border-slate-800 flex-shrink-0">
				<div class="w-9 h-9 bg-amber-600 text-white rounded-xl flex items-center justify-center font-extrabold text-base shadow">
					MD
				</div>
				<div>
					<span class="block font-extrabold text-lg text-white tracking-tight">MIX-D</span>
					<span class="block text-[10px] font-bold tracking-widest text-amber-500 uppercase">Panel Admin</span>
				</div>
			</div>

			<!-- Navigation Links -->
			<nav class="p-4 space-y-1 text-sm font-semibold">
				<?php 
				$seg2 = $this->uri->segment(2); 
				?>
				<a href="<?= base_url('admin/dashboard') ?>" 
				   class="flex items-center gap-3 px-4 py-3 rounded-xl transition <?= ($seg2 == 'dashboard' || $seg2 == '') ? 'bg-amber-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white' ?>">
					<span class="text-lg">📊</span>
					<span>Dashboard</span>
				</a>

				<a href="<?= base_url('admin/products') ?>" 
				   class="flex items-center gap-3 px-4 py-3 rounded-xl transition <?= ($seg2 == 'products') ? 'bg-amber-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white' ?>">
					<span class="text-lg">👞</span>
					<span>Kelola Produk</span>
				</a>

				<a href="<?= base_url('admin/categories') ?>" 
				   class="flex items-center gap-3 px-4 py-3 rounded-xl transition <?= ($seg2 == 'categories') ? 'bg-amber-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white' ?>">
					<span class="text-lg">🏷️</span>
					<span>Kelola Kategori</span>
				</a>

				<a href="<?= base_url('admin/settings') ?>" 
				   class="flex items-center gap-3 px-4 py-3 rounded-xl transition <?= ($seg2 == 'settings') ? 'bg-amber-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white' ?>">
					<span class="text-lg">⚙️</span>
					<span>Pengaturan Toko</span>
				</a>
			</nav>
		</div>

		<!-- Bottom External Link -->
		<div class="p-4 border-t border-slate-800 space-y-2 flex-shrink-0">
			<a href="<?= base_url() ?>" target="_blank" class="flex items-center justify-between px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-xs text-amber-400 font-semibold transition">
				<span>Lihat Website Toko</span>
				<span>↗</span>
			</a>
			<div class="px-4 py-2 text-[11px] text-slate-400">
				Login sebagai: <strong class="text-slate-300"><?= html_escape(isset($admin_name) ? $admin_name : 'Admin') ?></strong>
			</div>
		</div>
	</aside>

	<!-- Main Wrapper -->
	<div class="flex-1 flex flex-col h-screen overflow-hidden min-w-0">
		
		<!-- Fixed Header (Topbar) - Pinned at top, never scrolls away -->
		<header class="h-20 bg-white border-b border-slate-200 px-6 sm:px-8 flex items-center justify-between flex-shrink-0 z-20 shadow-sm">
			<div class="flex items-center gap-4">
				<button id="adminSidebarToggle" type="button" class="md:hidden p-2 rounded-xl text-slate-600 hover:text-dark-900 hover:bg-slate-100 focus:outline-none">
					<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</button>
				<h2 class="text-lg sm:text-xl font-bold text-dark-900 tracking-tight">
					<?= isset($page_title) ? html_escape($page_title) : 'Dashboard Admin' ?>
				</h2>
			</div>

			<div class="flex items-center gap-4">
				<a href="<?= base_url() ?>" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-slate-200 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition">
					<span>Buka Toko</span>
					<span>↗</span>
				</a>

				<!-- Logout Button -->
				<a href="<?= base_url('admin/logout') ?>" 
				   onclick="return confirm('Apakah Anda yakin ingin keluar dari panel admin?')" 
				   class="px-4 py-2 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 font-bold text-xs transition flex items-center gap-1.5">
					<span>Keluar (Logout)</span>
				</a>
			</div>
		</header>

		<!-- Scrollable Content Viewport -->
		<div class="flex-1 overflow-y-auto flex flex-col min-w-0">
			
			<!-- Flash Message Container -->
			<div class="px-6 sm:px-8 pt-6">
				<?php if ($this->session->flashdata('success')): ?>
					<div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center justify-between shadow-sm">
						<div class="flex items-center gap-2">
							<span>✓</span>
							<span><?= $this->session->flashdata('success') ?></span>
						</div>
						<button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">✕</button>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('error')): ?>
					<div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center justify-between shadow-sm">
						<div class="flex items-center gap-2">
							<span>⚠️</span>
							<span><?= $this->session->flashdata('error') ?></span>
						</div>
						<button type="button" onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-700">✕</button>
					</div>
				<?php endif; ?>
			</div>

			<!-- Page Body -->
			<main class="p-6 sm:px-8 pb-16 flex-1">
