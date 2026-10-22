<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Catalog Header -->
<div class="bg-stone-100/70 py-10 border-b border-stone-200/80">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
			<div>
				<nav class="text-[11px] text-stone-500 mb-2 flex items-center gap-2">
					<a href="<?= base_url() ?>" class="hover:text-stone-900 transition">Beranda</a>
					<span>/</span>
					<a href="<?= base_url('produk') ?>" class="hover:text-stone-900 transition">Katalog Sepatu</a>
					<?php if ($current_category): ?>
						<span>/</span>
						<span class="text-brand-700 font-bold"><?= html_escape($current_category['name']) ?></span>
					<?php endif; ?>
				</nav>
				<h1 class="text-3xl sm:text-4xl font-serif font-bold text-stone-950 tracking-tight">
					<?= $current_category ? 'Koleksi ' . html_escape($current_category['name']) : 'Seluruh Koleksi Sepatu Pria' ?>
				</h1>
				<p class="text-xs text-stone-500 mt-1 max-w-xl">
					Pilihan sepatu formal, kasual, boots, hingga loafers pria dengan standar bahan pilihan dan sol kokoh.
				</p>
			</div>
			<div class="text-xs text-stone-500 bg-white/80 backdrop-blur-sm px-3.5 py-1.5 rounded-xl border border-stone-200/80 self-start md:self-end">
				Menampilkan <strong class="text-stone-900 font-tabular font-bold"><?= (int)$total_products ?></strong> pasang sepatu
			</div>
		</div>
	</div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
	
	<!-- Filter & Search Controls Card -->
	<div class="bg-white p-5 sm:p-6 rounded-2xl border border-stone-200/80 shadow-card mb-8">
		<form method="GET" action="<?= base_url('produk') ?>" class="grid grid-cols-1 md:grid-cols-12 gap-3.5 items-center">
			
			<!-- Search Bar -->
			<div class="md:col-span-5 relative">
				<input type="text" 
				       name="q" 
				       value="<?= html_escape($keyword) ?>" 
				       placeholder="Cari model sepatu (contoh: Oxford, Chelsea, Sneakers)..." 
				       class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-stone-300 focus:outline-none focus:ring-2 focus:ring-brand-500/50 text-xs text-stone-800 placeholder-stone-400">
				<div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
					<svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
					</svg>
				</div>
			</div>

			<!-- Category Filter Dropdown -->
			<div class="md:col-span-3">
				<select name="kategori" class="w-full py-2.5 px-3 rounded-xl border border-stone-300 focus:outline-none focus:ring-2 focus:ring-brand-500/50 text-xs text-stone-700 bg-white cursor-pointer">
					<option value="">Semua Kategori Sepatu</option>
					<?php foreach ($categories as $cat): ?>
						<option value="<?= html_escape($cat['slug']) ?>" <?= ($current_category && $current_category['slug'] == $cat['slug']) ? 'selected' : '' ?>>
							<?= html_escape($cat['name']) ?> (<?= (int)$cat['total_products'] ?>)
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<!-- Sort Dropdown -->
			<div class="md:col-span-3">
				<select name="sort" class="w-full py-2.5 px-3 rounded-xl border border-stone-300 focus:outline-none focus:ring-2 focus:ring-brand-500/50 text-xs text-stone-700 bg-white cursor-pointer">
					<option value="latest" <?= ($sort == 'latest') ? 'selected' : '' ?>>Urutan: Produk Terbaru</option>
					<option value="popular" <?= ($sort == 'popular') ? 'selected' : '' ?>>Urutan: Paling Populer (Tayangan)</option>
					<option value="price_asc" <?= ($sort == 'price_asc') ? 'selected' : '' ?>>Urutan: Harga Terendah</option>
					<option value="price_desc" <?= ($sort == 'price_desc') ? 'selected' : '' ?>>Urutan: Harga Tertinggi</option>
				</select>
			</div>

			<!-- Submit & Reset Buttons -->
			<div class="md:col-span-1 flex gap-2">
				<button type="submit" class="w-full py-2.5 px-4 bg-stone-900 hover:bg-brand-600 text-white rounded-xl text-xs font-semibold transition text-center shadow-sm active:scale-95">
					Terapkan
				</button>
			</div>
		</form>

		<!-- Category Quick Pills -->
		<div class="mt-4 pt-4 border-t border-stone-100 flex flex-wrap items-center gap-2">
			<span class="text-[11px] font-bold text-stone-400 uppercase tracking-wider mr-1">Koleksi:</span>
			<a href="<?= base_url('produk' . (!empty($keyword) ? '?q=' . urlencode($keyword) : '')) ?>" 
			   class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition active:scale-95 <?= empty($current_category) ? 'bg-brand-700 text-white shadow-sm' : 'bg-stone-100 text-stone-700 hover:bg-stone-200' ?>">
				Semua (<?= (int)$total_products ?>)
			</a>
			<?php foreach ($categories as $cat): ?>
				<a href="<?= base_url('produk?kategori=' . $cat['slug'] . (!empty($keyword) ? '&q=' . urlencode($keyword) : '')) ?>" 
				   class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition active:scale-95 <?= ($current_category && $current_category['slug'] == $cat['slug']) ? 'bg-brand-700 text-white shadow-sm' : 'bg-stone-100 text-stone-700 hover:bg-stone-200' ?>">
					<?= html_escape($cat['name']) ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- Products Grid -->
	<?php if (!empty($products)): ?>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
			<?php foreach ($products as $product): ?>
				<div class="bg-white rounded-2xl border border-stone-200/80 hover:border-brand-300 hover:shadow-warm transition-all duration-300 overflow-hidden flex flex-col group hover:-translate-y-1">
					
					<!-- Product Image -->
					<a href="<?= base_url('produk/' . $product['slug']) ?>" class="block relative h-60 bg-stone-100 overflow-hidden">
						<?php 
						$imagePath = 'uploads/products/' . $product['image'];
						if (!empty($product['image']) && file_exists(FCPATH . $imagePath)): 
						?>
							<img src="<?= base_url($imagePath) ?>" alt="<?= html_escape($product['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
						<?php else: ?>
							<div class="w-full h-full flex flex-col items-center justify-center bg-stone-100 text-stone-400">
								<svg class="w-10 h-10 text-stone-300 mb-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
								</svg>
								<span class="text-[10px] font-semibold tracking-widest text-stone-400 uppercase">Mix-D</span>
							</div>
						<?php endif; ?>

						<!-- Category Badge -->
						<?php if (!empty($product['category_name'])): ?>
							<span class="absolute top-3 left-3 bg-stone-950/80 backdrop-blur-md text-stone-200 text-[10px] font-bold tracking-wider px-2.5 py-1 rounded-md uppercase border border-stone-800">
								<?= html_escape($product['category_name']) ?>
							</span>
						<?php endif; ?>

						<!-- Views Badge -->
						<span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md text-stone-600 text-[10px] font-semibold px-2 py-0.5 rounded-md flex items-center gap-1 shadow-sm font-tabular">
							<svg class="w-3.5 h-3.5 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
							</svg>
							<?= (int)$product['views'] ?>
						</span>
					</a>

					<!-- Content -->
					<div class="p-5 flex-1 flex flex-col justify-between">
						<div>
							<div class="text-[11px] text-stone-500 mb-1 flex items-center justify-between">
								<span>Size: <strong class="text-stone-800 font-tabular"><?= html_escape($product['available_sizes']) ?></strong></span>
								<?php if ($product['stock'] > 0): ?>
									<span class="text-emerald-700 text-[10px] font-semibold">Ready</span>
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
		</div>

		<!-- Pagination -->
		<?php if ($total_pages > 1): ?>
			<div class="mt-14 flex justify-center items-center gap-2">
				<?php for ($i = 1; $i <= $total_pages; $i++): ?>
					<?php 
					$queryParams = array();
					if (!empty($keyword)) $queryParams['q'] = $keyword;
					if ($current_category) $queryParams['kategori'] = $current_category['slug'];
					if (!empty($sort)) $queryParams['sort'] = $sort;
					$queryParams['page'] = $i;
					$pageUrl = base_url('produk?' . http_build_query($queryParams));
					?>
					<a href="<?= $pageUrl ?>" 
					   class="w-10 h-10 flex items-center justify-center rounded-xl text-xs font-bold transition active:scale-95 <?= ($i == $current_page) ? 'bg-brand-700 text-white shadow-leather' : 'bg-white border border-stone-200 text-stone-700 hover:bg-stone-100' ?>">
						<?= $i ?>
					</a>
				<?php endfor; ?>
			</div>
		<?php endif; ?>

	<?php else: ?>
		<!-- Empty State (No generic emojis) -->
		<div class="bg-white rounded-3xl border border-stone-200/80 p-12 text-center max-w-lg mx-auto shadow-card">
			<div class="w-16 h-16 rounded-2xl bg-stone-100 border border-stone-200 flex items-center justify-center mx-auto mb-4 text-stone-400">
				<svg class="w-8 h-8 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
				</svg>
			</div>
			<h3 class="text-lg font-serif font-bold text-stone-900 mb-2">Sepatu Tidak Ditemukan</h3>
			<p class="text-xs text-stone-500 mb-6 leading-relaxed">
				Tidak ada produk yang cocok dengan kata kunci pencarian atau kategori yang Anda pilih saat ini.
			</p>
			<a href="<?= base_url('produk') ?>" class="inline-flex items-center gap-2 px-6 py-3 bg-brand-600 hover:bg-brand-500 text-white rounded-xl text-xs font-bold transition shadow-sm active:scale-95">
				<span>Reset Filter & Lihat Semua</span>
				<span>→</span>
			</a>
		</div>
	<?php endif; ?>

</div>

