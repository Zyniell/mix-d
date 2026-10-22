<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id" class="h-full bg-stone-950">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= html_escape($page_title) ?> | Mix-D Men's Footwear</title>
	
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
							800: '#292524',
							900: '#1c1917',
							950: '#0c0a09',
						}
					}
				}
			}
		}
	</script>

	<style>
		body {
			font-family: 'Plus Jakarta Sans', sans-serif;
			background-color: #0c0a09;
		}
		.bg-noise {
			background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.04'/%3E%3C/svg%3E");
		}
	</style>
</head>
<body class="h-full flex items-center justify-center p-4 selection:bg-brand-600 selection:text-white relative overflow-hidden">
	
	<!-- Floating Flash Toast Notifications -->
	<?php $this->load->view('partials/flash_toast'); ?>

	<!-- Noise Texture & Glow -->

	<div class="absolute inset-0 bg-noise opacity-40 pointer-events-none"></div>
	<div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-brand-600/10 rounded-full blur-3xl pointer-events-none"></div>

	<div class="w-full max-w-md relative z-10">
		
		<!-- Brand Header -->
		<div class="text-center mb-8">
			<a href="<?= base_url() ?>" class="inline-flex items-center gap-3.5 group">
				<div class="w-12 h-12 bg-stone-900 border border-brand-500/40 text-white rounded-2xl flex items-center justify-center font-serif font-black text-2xl shadow-xl group-hover:border-brand-500 transition">
					M<span class="text-brand-400">D</span>
				</div>
				<div class="text-left">
					<div class="flex items-center gap-1.5">
						<span class="font-serif font-extrabold text-2xl tracking-tight text-white">MIX-D</span>
						<span class="w-1.5 h-1.5 rounded-full bg-brand-500 inline-block"></span>
					</div>
					<span class="block text-[10px] font-bold tracking-[0.2em] text-brand-400 uppercase">Admin Portal</span>
				</div>
			</a>
			<p class="text-xs text-stone-400 mt-3 font-medium">Sistem Pengelolaan Toko Sepatu Pria Mix-D</p>
		</div>

		<!-- Login Card -->
		<div class="bg-white rounded-3xl p-8 sm:p-10 shadow-2xl border border-stone-200">
			
			<!-- Validation Error Messages -->


			<?php if (validation_errors()): ?>
				<div class="mb-5 p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs">
					<?= validation_errors() ?>
				</div>
			<?php endif; ?>

			<!-- Login Form -->
			<form method="POST" action="<?= base_url('admin/login') ?>" class="space-y-4">
				<!-- CSRF Token -->
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

				<div>
					<label class="block text-xs font-bold text-stone-800 uppercase tracking-wider mb-1.5">
						Username / Email
					</label>
					<input type="text" 
					       name="username" 
					       value="<?= set_value('username') ?>" 
					       required 
					       autofocus 
					       placeholder="admin" 
					       class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-xs text-stone-900 focus:outline-none focus:ring-2 focus:ring-brand-500/50">
				</div>

				<div>
					<label class="block text-xs font-bold text-stone-800 uppercase tracking-wider mb-1.5">
						Kata Sandi
					</label>
					<input type="password" 
					       name="password" 
					       required 
					       placeholder="••••••••" 
					       class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-xs text-stone-900 focus:outline-none focus:ring-2 focus:ring-brand-500/50">
				</div>

				<div class="pt-2">
					<button type="submit" class="w-full py-3 px-4 bg-stone-900 hover:bg-brand-600 text-white rounded-xl text-xs font-bold tracking-wide transition active:scale-[0.98] shadow-md">
						Masuk ke Panel Admin →
					</button>
				</div>
			</form>

			<!-- Default Credentials Note -->
			<div class="mt-6 pt-5 border-t border-stone-100 text-center">
				<div class="text-[11px] text-stone-500 bg-stone-50 p-3 rounded-xl border border-stone-200/80 font-mono">
					User: <strong class="text-stone-800">admin</strong> &bull; Pass: <strong class="text-stone-800">admin123</strong>
				</div>
			</div>

		</div>

		<!-- Back Link -->
		<div class="text-center mt-6">
			<a href="<?= base_url() ?>" class="text-xs text-stone-400 hover:text-white transition">
				← Kembali ke Halaman Toko
			</a>
		</div>

	</div>

</body>
</html>

