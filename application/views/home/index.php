<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Hero Section -->
<section class="relative bg-dark-950 text-white overflow-hidden py-16 lg:py-24">
	<div class="absolute inset-0 opacity-10 bg-[radial-gradient(#d97706_1px,transparent_1px)] [background-size:16px_16px]"></div>
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
			
			<div class="lg:col-span-7 space-y-6 text-center lg:text-left">
				<div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-400 text-xs font-semibold uppercase tracking-wider">
					<span>✨ Koleksi Sepatu Pria Terbaru</span>
				</div>
				<h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
					Langkah Gagah & Nyaman Bersama <span class="text-amber-500">MIX-D</span>
				</h1>
				<p class="text-lg text-slate-300 max-w-2xl leading-relaxed">
					Temukan sepatu pria impian Anda. Dari sneakers kasual, oxford kantor yang elegan, boots tangguh, hingga loafers praktis. Kualitas bahan pilihan dengan kemudahan checkout langsung ke WhatsApp.
				</p>
				<div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
					<a href="<?= base_url('produk') ?>" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-amber-600 hover:bg-amber-500 text-white font-bold text-base transition shadow-lg shadow-amber-900/40 text-center">
						Jelajahi Katalog
					</a>
					<a href="<?= base_url('tentang-kami') ?>" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-semibold text-base transition border border-slate-700 text-center">
						Tentang Mix-D
					</a>
				</div>
				
				<!-- Highlights -->
				<div class="pt-8 border-t border-slate-800 grid grid-cols-3 gap-4 text-center lg:text-left">
					<div>
						<div class="text-2xl font-extrabold text-amber-400">100%</div>
						<div class="text-xs text-slate-400 mt-1 font-medium">Khusus Pria</div>
					</div>
					<div>
						<div class="text-2xl font-extrabold text-amber-400">39 - 45</div>
						<div class="text-xs text-slate-400 mt-1 font-medium">Varian Ukuran</div>
					</div>
					<div>
						<div class="text-2xl font-extrabold text-amber-400">WhatsApp</div>
						<div class="text-xs text-slate-400 mt-1 font-medium">Checkout Mudah</div>
					</div>
				</div>
			</div>

			<!-- Hero Visual / Showcase Card -->
			<div class="lg:col-span-5 flex justify-center">
				<div class="w-full max-w-md bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-3xl border border-slate-700 shadow-2xl relative overflow-hidden group">
					<div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/10 rounded-full blur-2xl"></div>
					<div class="text-amber-500 font-bold text-xs uppercase tracking-widest mb-2">Paling Diminati</div>
					<h3 class="text-2xl font-bold text-white mb-2">Oxford Classic Leather</h3>
					<p class="text-sm text-slate-400 mb-6">Finishing glossy elegan, insole empuk untuk acara formal & meeting penting.</p>
					
					<div class="h-56 bg-slate-950/60 rounded-2xl flex items-center justify-center p-6 border border-slate-800 mb-6 group-hover:border-amber-600/40 transition">
						<div class="text-center">
							<span class="text-6xl">👞</span>
							<div class="text-xs text-slate-400 mt-3 font-medium">Premium Leather Craftsmanship</div>
						</div>
					</div>

					<div class="flex items-center justify-between">
						<div>
							<span class="text-xs text-slate-400 block line-through">Rp 550.000</span>
							<span class="text-2xl font-extrabold text-amber-400">Rp 485.000</span>
						</div>
						<a href="<?= base_url('produk/mix-d-oxford-classic-leather-brown') ?>" class="px-5 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-500 text-white text-xs font-bold transition">
							Pesan Sekarang →
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- Kategori Pilihan -->
<section class="py-16 bg-white border-b border-slate-200">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="text-center max-w-2xl mx-auto mb-12">
			<h2 class="text-xs font-bold text-amber-600 uppercase tracking-widest mb-2">Kategori Sepatu Pria</h2>
			<p class="text-3xl font-extrabold text-dark-900 tracking-tight">Koleksi Lengkap Sesuai Kebutuhan Anda</p>
			<p class="text-sm text-slate-500 mt-2">Pilih kategori yang sesuai dengan aktivitas dan gaya personal Anda hari ini.</p>
		</div>

		<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
			<?php 
			$icons = array(
				'sneakers' => '👟',
				'formal-oxford' => '👞',
				'boots-pria' => '🥾',
				'loafers-slip-on' => '👞',
				'sandal-pria' => '🩴'
			);
			foreach ($categories as $cat): 
				$icon = isset($icons[$cat['slug']]) ? $icons[$cat['slug']] : '👟';
			?>
				<a href="<?= base_url('produk?kategori=' . $cat['slug']) ?>" class="group p-6 rounded-2xl bg-slate-50 hover:bg-amber-50 border border-slate-200 hover:border-amber-300 transition duration-300 flex flex-col items-center text-center">
					<div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition">
						<?= $icon ?>
					</div>
					<h3 class="font-bold text-base text-dark-900 group-hover:text-amber-800 transition"><?= html_escape($cat['name']) ?></h3>
					<span class="text-xs text-slate-500 mt-1"><?= (int)$cat['total_products'] ?> Produk</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Produk Unggulan / Featured Shoes -->
<section class="py-16 bg-slate-50">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-12 gap-4">
			<div>
				<h2 class="text-xs font-bold text-amber-600 uppercase tracking-widest mb-2">Koleksi Terlaris</h2>
				<p class="text-3xl font-extrabold text-dark-900 tracking-tight">Sepatu Pria Pilihan Minggu Ini</p>
				<p class="text-sm text-slate-500 mt-2">Model paling banyak dicari dan diminati oleh customer Mix-D.</p>
			</div>
			<a href="<?= base_url('produk') ?>" class="inline-flex items-center gap-2 text-sm font-bold text-amber-700 hover:text-amber-800 transition">
				Lihat Semua Produk <span>→</span>
			</a>
		</div>

		<!-- Product Cards Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
			<?php if (!empty($featured_products)): ?>
				<?php foreach ($featured_products as $product): ?>
					<div class="bg-white rounded-2xl border border-slate-200 hover:border-amber-300 hover:shadow-xl transition duration-300 overflow-hidden flex flex-col group">
						
						<!-- Product Thumbnail -->
						<a href="<?= base_url('produk/' . $product['slug']) ?>" class="block relative h-56 bg-slate-100 overflow-hidden">
							<?php 
							$imagePath = 'uploads/products/' . $product['image'];
							if (!empty($product['image']) && file_exists(FCPATH . $imagePath)): 
							?>
								<img src="<?= base_url($imagePath) ?>" alt="<?= html_escape($product['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
							<?php else: ?>
								<div class="w-full h-full flex flex-col items-center justify-center bg-slate-100 text-slate-400 group-hover:bg-amber-50/50 transition">
									<span class="text-5xl mb-2">👞</span>
									<span class="text-xs font-semibold tracking-wider text-slate-400 uppercase">Mix-D Men's Footwear</span>
								</div>
							<?php endif; ?>

							<!-- Category Tag -->
							<?php if (!empty($product['category_name'])): ?>
								<span class="absolute top-3 left-3 bg-dark-950/80 backdrop-blur-sm text-white text-[11px] font-semibold px-2.5 py-1 rounded-lg">
									<?= html_escape($product['category_name']) ?>
								</span>
							<?php endif; ?>

							<!-- Views Badge -->
							<span class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm text-slate-600 text-[11px] font-semibold px-2 py-0.5 rounded-lg flex items-center gap-1 shadow-sm">
								👁 <?= (int)$product['views'] ?>
							</span>
						</a>

						<!-- Product Details -->
						<div class="p-5 flex-1 flex flex-col justify-between">
							<div>
								<div class="text-[11px] text-slate-500 font-medium mb-1">
									Ukuran: <span class="font-bold text-dark-900"><?= html_escape($product['available_sizes']) ?></span>
								</div>
								<h3 class="font-bold text-base text-dark-900 group-hover:text-amber-700 transition line-clamp-2 leading-snug">
									<a href="<?= base_url('produk/' . $product['slug']) ?>">
										<?= html_escape($product['name']) ?>
									</a>
								</h3>
							</div>

							<div class="pt-4 border-t border-slate-100 mt-4 flex items-center justify-between">
								<div>
									<?php if (!empty($product['original_price']) && $product['original_price'] > $product['price']): ?>
										<span class="block text-xs text-slate-400 line-through">
											Rp <?= number_format($product['original_price'], 0, ',', '.') ?>
										</span>
									<?php endif; ?>
									<span class="text-base font-extrabold text-amber-600">
										Rp <?= number_format($product['price'], 0, ',', '.') ?>
									</span>
								</div>

								<a href="<?= base_url('produk/' . $product['slug']) ?>" class="p-2.5 rounded-xl bg-slate-900 text-white hover:bg-amber-600 transition" title="Lihat Detail & Pilih Ukuran">
									<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
									</svg>
								</a>
							</div>
						</div>

					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-span-full text-center py-12 text-slate-500">
					Belum ada produk aktif yang tersedia.
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- Nilai Keunggulan Mix-D -->
<section class="py-16 bg-white border-t border-slate-200">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="grid grid-cols-1 md:grid-cols-4 gap-8">
			
			<div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 text-center">
				<div class="w-12 h-12 mx-auto bg-amber-100 text-amber-700 rounded-xl flex items-center justify-center text-2xl mb-4">
					🎯
				</div>
				<h3 class="font-bold text-dark-900 mb-2">Spesialis Sepatu Pria</h3>
				<p class="text-xs text-slate-500 leading-relaxed">Didesain khusus untuk proporsi anatomi telapak kaki pria agar nyaman dipakai lama.</p>
			</div>

			<div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 text-center">
				<div class="w-12 h-12 mx-auto bg-amber-100 text-amber-700 rounded-xl flex items-center justify-center text-2xl mb-4">
					🛡️
				</div>
				<h3 class="font-bold text-dark-900 mb-2">Material Pilihan</h3>
				<p class="text-xs text-slate-500 leading-relaxed">Kombinasi bahan sintetis premium & kanvas kuat dengan sol anti-slip yang awet.</p>
			</div>

			<div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 text-center">
				<div class="w-12 h-12 mx-auto bg-amber-100 text-amber-700 rounded-xl flex items-center justify-center text-2xl mb-4">
					📲
				</div>
				<h3 class="font-bold text-dark-900 mb-2">Checkout Langsung WA</h3>
				<p class="text-xs text-slate-500 leading-relaxed">Pesan tanpa ribet registrasi akun. Keranjang langsung terhubung ke chat admin WhatsApp.</p>
			</div>

			<div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 text-center">
				<div class="w-12 h-12 mx-auto bg-amber-100 text-amber-700 rounded-xl flex items-center justify-center text-2xl mb-4">
					📐
				</div>
				<h3 class="font-bold text-dark-900 mb-2">Panduan Ukuran Jelas</h3>
				<p class="text-xs text-slate-500 leading-relaxed">Pilihan ukuran standar 39 hingga 45 dengan kebebasan konsultasi fitting sebelum beli.</p>
			</div>

		</div>
	</div>
</section>
