<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-900">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= html_escape($page_title) ?> | Mix-D</title>
	
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
<body class="h-full flex items-center justify-center p-4 selection:bg-amber-600 selection:text-white">

	<div class="w-full max-w-md">
		
		<!-- Brand Header -->
		<div class="text-center mb-8">
			<a href="<?= base_url() ?>" class="inline-flex items-center gap-3 group">
				<div class="w-12 h-12 bg-amber-600 text-white rounded-2xl flex items-center justify-center font-extrabold text-2xl shadow-lg">
					MD
				</div>
				<div class="text-left">
					<span class="block font-extrabold text-2xl tracking-tight text-white">MIX-D</span>
					<span class="block text-[10px] font-bold tracking-widest text-amber-500 uppercase">Admin Portal</span>
				</div>
			</a>
			<p class="text-xs text-slate-400 mt-3">Silakan masuk untuk mengelola toko sepatu Mix-D</p>
		</div>

		<!-- Login Card -->
		<div class="bg-white rounded-3xl p-8 sm:p-10 shadow-2xl border border-slate-700/50">
			
			<!-- Alert Messages -->
			<?php if ($this->session->flashdata('error')): ?>
				<div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center gap-2">
					<span>⚠️</span>
					<span><?= $this->session->flashdata('error') ?></span>
				</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata('success')): ?>
				<div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-2">
					<span>✓</span>
					<span><?= $this->session->flashdata('success') ?></span>
				</div>
			<?php endif; ?>

			<?php if (validation_errors()): ?>
				<div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs">
					<?= validation_errors() ?>
				</div>
			<?php endif; ?>

			<!-- Login Form -->
			<form method="POST" action="<?= base_url('admin/login') ?>" class="space-y-5">
				<!-- CSRF Token -->
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

				<div>
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Username / Email
					</label>
					<input type="text" 
					       name="username" 
					       value="<?= set_value('username') ?>" 
					       required 
					       autofocus 
					       placeholder="Masukkan username admin" 
					       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
				</div>

				<div>
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Password
					</label>
					<input type="password" 
					       name="password" 
					       required 
					       placeholder="••••••••" 
					       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
				</div>

				<div class="pt-2">
					<button type="submit" class="w-full py-3.5 px-4 bg-slate-900 hover:bg-amber-600 text-white rounded-xl text-sm font-bold transition shadow-lg shadow-slate-900/20">
						Masuk ke Dashboard →
					</button>
				</div>
			</form>

			<!-- Default Credentials Note -->
			<div class="mt-6 pt-6 border-t border-slate-100 text-center">
				<div class="text-[11px] text-slate-500 bg-slate-50 p-3 rounded-xl border border-slate-200">
					Default Login: <strong>admin</strong> | Password: <strong>admin123</strong>
				</div>
			</div>

		</div>

		<!-- Back Link -->
		<div class="text-center mt-6">
			<a href="<?= base_url() ?>" class="text-xs text-slate-400 hover:text-white transition">
				← Kembali ke Website Toko
			</a>
		</div>

	</div>

</body>
</html>
