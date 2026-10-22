<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Hero Section with Editorial Photography & Artisanal Menswear Ambiance -->
<section class="relative bg-stone-950 text-white overflow-hidden py-16 lg:py-24 border-b border-stone-800">
	<!-- Background Editorial Photo with Dark Gradient & Noise -->
	<div class="absolute inset-0 z-0">
		<img src="<?= base_url('uploads/products/hero_mens_footwear.jpg') ?>" alt="Bespoke Men's Footwear Workshop" class="w-full h-full object-cover object-center opacity-25 filter saturate-50 scale-105 transform">
		<div class="absolute inset-0 bg-gradient-to-r from-stone-950 via-stone-950/90 to-stone-950/70"></div>
		<div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-transparent to-transparent"></div>
		<div class="absolute inset-0 bg-noise opacity-40 pointer-events-none"></div>
	</div>

	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
			
			<!-- Left Headline & Narrative (7 cols) -->
			<div class="lg:col-span-7 space-y-6 text-center lg:text-left">
				<div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-brand-500/10 border border-brand-500/30 text-brand-300 text-xs font-semibold tracking-wider uppercase backdrop-blur-sm">
					<span class="w-2 h-2 rounded-full bg-brand-500 animate-pulse"></span>
					<span>Koleksi Terpilih Sepatu Pria 2026</span>
				</div>

				<h1 class="text-4xl sm:text-5xl lg:text-6xl font-serif font-black tracking-tight leading-[1.1] text-white">
					Langkah Berkarakter <br class="hidden sm:inline">
					<span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-300 via-brand-400 to-amber-200">Pria Modern.</span>
				</h1>

				<p class="text-base sm:text-lg text-stone-300 max-w-xl leading-relaxed mx-auto lg:mx-0">
					Dibuat untuk pria yang menghargai ketahanan, keanggunan siluet, dan kenyamanan melangkah seharian. Dari ruang rapat formal hingga jalanan perkotaan.
				</p>

				<!-- CTAs -->
				<div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
					<a href="<?= base_url('produk') ?>" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-bold text-sm tracking-wide transition-all duration-200 shadow-leather text-center active:scale-[0.98] border border-brand-500/40">
						Jelajahi Katalog Lengkap →
					</a>
					<a href="<?= base_url('tentang-kami') ?>" class="w-full sm:w-auto px-7 py-4 rounded-xl bg-stone-900/80 hover:bg-stone-800 text-stone-200 font-semibold text-sm transition border border-stone-700/80 text-center backdrop-blur-sm active:scale-[0.98]">
						Dedikasi & Material
					</a>
				</div>
				
				<!-- Trust Micro-Badges (Breaking generic 3-stat cards) -->
				<div class="pt-8 border-t border-stone-800/80 flex flex-wrap items-center justify-center lg:justify-start gap-6 text-xs text-stone-400">
					<div class="flex items-center gap-2">
						<svg class="w-4 h-4 text-brand-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
						</svg>
						<span class="text-stone-300 font-medium">Ukuran Standar 39 – 45</span>
					</div>
					<div class="flex items-center gap-2">
						<svg class="w-4 h-4 text-brand-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
						</svg>
						<span class="text-stone-300 font-medium">Insole Anti-Pegal Memory Foam</span>
					</div>
					<div class="flex items-center gap-2">
						<svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
						</svg>
						<span class="text-stone-300 font-medium">Pemesanan Langsung WhatsApp</span>
					</div>
				</div>
			</div>

			<!-- Right Hero Showcase (5 cols) -->
			<div class="lg:col-span-5 flex justify-center">
				<div class="w-full max-w-md bg-stone-900/90 backdrop-blur-md rounded-3xl border border-stone-800 shadow-2xl overflow-hidden group transition-all duration-300 hover:border-brand-500/40">
					
					<!-- Card Header -->
					<div class="p-6 pb-4 flex items-center justify-between border-b border-stone-800/80">
						<div>
							<span class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-400 block">Koleksi Unggulan</span>
							<h3 class="text-lg font-serif font-bold text-white mt-0.5">Mix-D Oxford Classic</h3>
						</div>
						<span class="px-2.5 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-[11px] font-bold">
							Tersedia
						</span>
					</div>

					<!-- Real Product Photograph -->
					<div class="relative h-64 bg-stone-950 overflow-hidden">
						<img src="<?= base_url('uploads/products/oxford_classic_brown.jpg') ?>" alt="Mix-D Oxford Classic Leather Brown" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
						<div class="absolute bottom-3 left-3 bg-stone-950/80 backdrop-blur-md px-3 py-1 rounded-lg text-[11px] text-stone-300 font-medium border border-stone-800">
							Handcrafted Cognac Leather
						</div>
					</div>

					<!-- Card Footer with Tabular Price & Direct CTA -->
					<div class="p-6 bg-stone-900 flex items-center justify-between">
						<div>
							<span class="text-xs text-stone-500 line-through block font-tabular">Rp 550.000</span>
							<div class="text-2xl font-serif font-bold text-brand-400 font-tabular">Rp 485.000</div>
						</div>
						<a href="<?= base_url('produk/mix-d-oxford-classic-leather-brown') ?>" class="px-5 py-3 rounded-xl bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold transition shadow-leather active:scale-95">
							Pesan Sepatu Ini →
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- Category Showcase: Sleek Editorial Footwear Silhouettes -->
<section class="py-16 bg-white border-b border-stone-200/80">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
			<div>
				<span class="text-[11px] font-bold text-brand-700 uppercase tracking-[0.2em] block mb-1">Kategori Koleksi Pria</span>
				<h2 class="text-2xl sm:text-3xl font-serif font-bold text-stone-950 tracking-tight">Koleksi Berdasarkan Gaya & Kebutuhan</h2>
			</div>
			<p class="text-xs text-stone-500 max-w-md">
				Pilihlah siluet yang merefleksikan karakter dan agenda harian Anda.
			</p>
		</div>

		<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
			<?php 
			// SVG silhouettes for each footwear category
			$svgMap = array(
				'sneakers' => '<svg class="w-7 h-7 text-brand-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 17h18M3 17a3 3 0 01-1-2.236L3.5 8a2 2 0 011.8-1.1h4.4a2 2 0 011.8 1.1L13 11h6a3 3 0 013 3v3M6 9h3M5 13h4M17 14h.01M17 17a2 2 0 100-4 2 2 0 000 4z"/></svg>',
				'formal-oxford' => '<svg class="w-7 h-7 text-brand-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16h18M3 16l2-6a2 2 0 012-1.3h4a2 2 0 011.8 1.1L14 12h5a3 3 0 013 3v1M7 9l1 3M11 9l-1 3M19 16a2 2 0 100-4 2 2 0 000 4z"/></svg>',
				'boots-pria' => '<svg class="w-7 h-7 text-brand-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M5 19h14M7 3h6v9l5 2v5H5V8a2 2 0 012-2V3zM9 7h2M9 10h2M13 14l3 1"/></svg>',
				'loafers-slip-on' => '<svg class="w-7 h-7 text-brand-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16h18M3 16c1-5 4-6 8-6h4a5 5 0 015 5v1M7 11h6M17 16a2 2 0 100-4 2 2 0 000 4z"/></svg>',
				'sandal-pria' => '<svg class="w-7 h-7 text-brand-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 17h18M6 17V8a2 2 0 014 0v9M14 17v-7a2 2 0 014 0v7M4 17a2 2 0 100-4 2 2 0 000 4z"/></svg>'
			);

			foreach ($categories as $cat): 
				$svgIcon = isset($svgMap[$cat['slug']]) ? $svgMap[$cat['slug']] : $svgMap['sneakers'];
			?>
				<a href="<?= base_url('produk?kategori=' . $cat['slug']) ?>" class="group p-5 rounded-2xl bg-stone-50 hover:bg-brand-50/60 border border-stone-200/80 hover:border-brand-300 transition-all duration-300 flex flex-col items-center text-center shadow-card hover:-translate-y-1">
					<div class="w-14 h-14 rounded-2xl bg-white border border-stone-200/60 shadow-sm flex items-center justify-center mb-4 group-hover:scale-105 group-hover:border-brand-300 transition duration-300">
						<?= $svgIcon ?>
					</div>
					<h3 class="font-bold text-sm text-stone-900 group-hover:text-brand-800 transition"><?= html_escape($cat['name']) ?></h3>
					<span class="text-[11px] text-stone-500 mt-1 font-medium font-tabular"><?= (int)$cat['total_products'] ?> Model Sepatu</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Featured Shoes Section -->
<section class="py-16 bg-stone-50">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-10 gap-4">
			<div>
				<span class="text-[11px] font-bold text-brand-700 uppercase tracking-[0.2em] block mb-1">Kurasi Pilihan</span>
				<h2 class="text-2xl sm:text-3xl font-serif font-bold text-stone-950 tracking-tight">Koleksi Terlaris Pekan Ini</h2>
				<p class="text-xs text-stone-500 mt-1">Model yang paling banyak dipesan dan dikonsultasikan oleh pelanggan setia Mix-D.</p>
			</div>
			<a href="<?= base_url('produk') ?>" class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-700 hover:text-brand-800 transition tracking-wide uppercase">
				<span>Lihat Semua Katalog</span>
				<span>→</span>
			</a>
		</div>

		<!-- Product Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
			<?php if (!empty($featured_products)): ?>
				<?php foreach ($featured_products as $product): ?>
					<div class="bg-white rounded-2xl border border-stone-200/80 hover:border-brand-300 hover:shadow-warm transition-all duration-300 overflow-hidden flex flex-col group hover:-translate-y-1">
						
						<!-- Product Thumbnail -->
						<a href="<?= base_url('produk/' . $product['slug']) ?>" class="block relative h-60 bg-stone-100 overflow-hidden">
							<?php 
							$imagePath = 'uploads/products/' . $product['image'];
							if (!empty($product['image']) && file_exists(FCPATH . $imagePath)): 
							?>
								<img src="<?= base_url($imagePath) ?>" alt="<?= html_escape($product['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
							<?php else: ?>
								<div class="w-full h-full flex flex-col items-center justify-center bg-stone-100 text-stone-400">
									<svg class="w-12 h-12 text-stone-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
									</svg>
									<span class="text-[10px] font-semibold tracking-widest text-stone-400 uppercase">Mix-D Footwear</span>
								</div>
							<?php endif; ?>

							<!-- Category Pill Tag -->
							<?php if (!empty($product['category_name'])): ?>
								<span class="absolute top-3 left-3 bg-stone-950/80 backdrop-blur-md text-stone-200 text-[10px] font-bold tracking-wider px-2.5 py-1 rounded-md uppercase border border-stone-800">
									<?= html_escape($product['category_name']) ?>
								</span>
							<?php endif; ?>

							<!-- Views Counter -->
							<span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md text-stone-600 text-[10px] font-semibold px-2 py-0.5 rounded-md flex items-center gap-1 shadow-sm font-tabular">
								<svg class="w-3.5 h-3.5 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
								</svg>
								<?= (int)$product['views'] ?>
							</span>
						</a>

						<!-- Product Details -->
						<div class="p-5 flex-1 flex flex-col justify-between">
							<div>
								<div class="text-[11px] text-stone-500 mb-1 flex items-center justify-between">
									<span>Ukuran: <strong class="text-stone-800 font-tabular"><?= html_escape($product['available_sizes']) ?></strong></span>
									<?php if ($product['stock'] > 0): ?>
										<span class="text-emerald-700 text-[10px] font-semibold">Ready Stock</span>
									<?php else: ?>
										<span class="text-rose-600 text-[10px] font-semibold">Habis</span>
									<?php endif; ?>
								</div>
								
								<h3 class="font-bold text-sm text-stone-900 group-hover:text-brand-700 transition line-clamp-2 leading-snug">
									<a href="<?= base_url('produk/' . $product['slug']) ?>">
										<?= html_escape($product['name']) ?>
									</a>
								</h3>
							</div>

							<!-- Price & Action -->
							<div class="pt-4 border-t border-stone-100 mt-4 flex items-center justify-between">
								<div>
									<?php if (!empty($product['original_price']) && $product['original_price'] > $product['price']): ?>
										<span class="block text-[11px] text-stone-400 line-through font-tabular">
											Rp <?= number_format($product['original_price'], 0, ',', '.') ?>
										</span>
									<?php endif; ?>
									<span class="text-base font-serif font-bold text-brand-700 font-tabular">
										Rp <?= number_format($product['price'], 0, ',', '.') ?>
									</span>
								</div>

								<a href="<?= base_url('produk/' . $product['slug']) ?>" class="px-3.5 py-2 rounded-xl bg-stone-900 text-white hover:bg-brand-600 text-xs font-bold transition flex items-center gap-1 active:scale-95 shadow-sm">
									<span>Detail</span>
									<span>→</span>
								</a>
							</div>
						</div>

					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-span-full text-center py-12 text-stone-500">
					Belum ada produk aktif yang tersedia.
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- Craftsmanship & Quality Standards (Asymmetric Layout instead of 4 equal AI cards) -->
<section class="py-20 bg-white border-t border-stone-200/80">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
			
			<!-- Left Feature Story (5 cols) -->
			<div class="lg:col-span-5 space-y-5 bg-stone-950 text-white p-8 sm:p-10 rounded-3xl relative overflow-hidden border border-stone-800 shadow-xl">
				<div class="absolute inset-0 bg-noise opacity-40 pointer-events-none"></div>
				<span class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-400 relative z-10">Standar Pembuatan</span>
				<h3 class="text-2xl sm:text-3xl font-serif font-bold leading-tight relative z-10">
					Mengapa Pria Memilih Sepatu Mix-D?
				</h3>
				<p class="text-xs sm:text-sm text-stone-400 leading-relaxed relative z-10">
					Setiap model sepatu kami dikembangkan melalui pengujian fitting mendalam agar pas dengan proporsi kaki pria Indonesia. Tidak sempit di bagian punggung kaki, dan empuk saat berdiri berjam-jam.
				</p>
				<div class="pt-2 relative z-10">
					<a href="<?= base_url('tentang-kami') ?>" class="inline-flex items-center gap-2 text-xs font-bold text-brand-300 hover:text-white transition">
						<span>Pelajari Kisah Dedikasi Mix-D</span>
						<span>→</span>
					</a>
				</div>
			</div>

			<!-- Right Feature Pillars (7 cols, 3 cards) -->
			<div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-5">
				
				<div class="p-6 rounded-2xl bg-stone-50 border border-stone-200/80 hover:border-brand-300 transition duration-300 flex flex-col justify-between">
					<div>
						<div class="w-10 h-10 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center mb-4">
							<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
							</svg>
						</div>
						<h4 class="font-bold text-sm text-stone-900 mb-2">Ergonomi Kaki Pria</h4>
						<p class="text-xs text-stone-500 leading-relaxed">Lebar instep yang disesuaikan agar tidak menekan jari dan tidak menimbulkan lecet.</p>
					</div>
				</div>

				<div class="p-6 rounded-2xl bg-stone-50 border border-stone-200/80 hover:border-brand-300 transition duration-300 flex flex-col justify-between">
					<div>
						<div class="w-10 h-10 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center mb-4">
							<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
							</svg>
						</div>
						<h4 class="font-bold text-sm text-stone-900 mb-2">Sol Anti-Slip Kokoh</h4>
						<p class="text-xs text-stone-500 leading-relaxed">Karet termo-plastik bertekstur mantap untuk cengkeraman optimal di berbagai permukaan.</p>
					</div>
				</div>

				<div class="p-6 rounded-2xl bg-stone-50 border border-stone-200/80 hover:border-brand-300 transition duration-300 flex flex-col justify-between">
					<div>
						<div class="w-10 h-10 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center mb-4">
							<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
							</svg>
						</div>
						<h4 class="font-bold text-sm text-stone-900 mb-2">Konsultasi WA Langsung</h4>
						<p class="text-xs text-stone-500 leading-relaxed">Bebas tanyakan rekomendasi ukuran atau foto detail ke CS WhatsApp kami yang ramah.</p>
					</div>
				</div>

			</div>

		</div>
	</div>
</section>
