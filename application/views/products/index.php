<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="bg-slate-100 py-8 border-b border-slate-200">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
			<div>
				<nav class="text-xs text-slate-500 mb-2 flex items-center gap-2">
					<a href="<?= base_url() ?>" class="hover:text-dark-900">Beranda</a>
					<span>/</span>
					<span class="text-dark-900 font-medium">Katalog Produk</span>
					<?php if ($current_category): ?>
						<span>/</span>
						<span class="text-amber-600 font-bold"><?= html_escape($current_category['name']) ?></span>
					<?php endif; ?>
				</nav>
				<h1 class="text-2xl sm:text-3xl font-extrabold text-dark-900 tracking-tight">
					<?= $current_category ? 'Koleksi ' . html_escape($current_category['name']) : 'Semua Katalog Sepatu Pria' ?>
				</h1>
			</div>
			<div class="text-sm text-slate-500">
				Menampilkan <span class="font-bold text-dark-900"><?= (int)$total_products ?></span> pilihan sepatu
			</div>
		</div>
	</div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
	
	<!-- Filter & Search Controls -->
	<div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm mb-8">
		<form method="GET" action="<?= base_url('produk') ?>" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
			
			<!-- Search Bar -->
			<div class="md:col-span-5 relative">
				<input type="text" 
				       name="q" 
				       value="<?= html_escape($keyword) ?>" 
				       placeholder="Cari sepatu (misal: Oxford, Sneakers, Boots)..." 
				       class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-amber-500 text-sm">
				<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
					🔍
				</div>
			</div>

			<!-- Category Filter Dropdown -->
			<div class="md:col-span-3">
				<select name="kategori" class="w-full py-2.5 px-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-amber-500 text-sm bg-white">
					<option value="">Semua Kategori</option>
					<?php foreach ($categories as $cat): ?>
						<option value="<?= html_escape($cat['slug']) ?>" <?= ($current_category && $current_category['slug'] == $cat['slug']) ? 'selected' : '' ?>>
							<?= html_escape($cat['name']) ?> (<?= (int)$cat['total_products'] ?>)
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<!-- Sort Dropdown -->
			<div class="md:col-span-3">
				<select name="sort" class="w-full py-2.5 px-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-amber-500 text-sm bg-white">
					<option value="latest" <?= ($sort == 'latest') ? 'selected' : '' ?>>Urutkan: Terbaru</option>
					<option value="popular" <?= ($sort == 'popular') ? 'selected' : '' ?>>Urutkan: Paling Populer (Views)</option>
					<option value="price_asc" <?= ($sort == 'price_asc') ? 'selected' : '' ?>>Urutkan: Harga Terendah</option>
					<option value="price_desc" <?= ($sort == 'price_desc') ? 'selected' : '' ?>>Urutkan: Harga Tertinggi</option>
				</select>
			</div>

			<!-- Submit & Reset Buttons -->
			<div class="md:col-span-1 flex gap-2">
				<button type="submit" class="w-full py-2.5 px-4 bg-dark-900 hover:bg-amber-600 text-white rounded-xl text-sm font-semibold transition text-center">
					Filter
				</button>
			</div>
		</form>

		<!-- Category Quick Pills -->
		<div class="mt-4 pt-4 border-t border-slate-100 flex flex-wrap items-center gap-2">
			<span class="text-xs font-semibold text-slate-400 uppercase tracking-wider mr-1">Kategori:</span>
			<a href="<?= base_url('produk' . (!empty($keyword) ? '?q=' . urlencode($keyword) : '')) ?>" 
			   class="px-3 py-1 rounded-lg text-xs font-semibold transition <?= empty($current_category) ? 'bg-amber-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">
				Semua
			</a>
			<?php foreach ($categories as $cat): ?>
				<a href="<?= base_url('produk?kategori=' . $cat['slug'] . (!empty($keyword) ? '&q=' . urlencode($keyword) : '')) ?>" 
				   class="px-3 py-1 rounded-lg text-xs font-semibold transition <?= ($current_category && $current_category['slug'] == $cat['slug']) ? 'bg-amber-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">
					<?= html_escape($cat['name']) ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- Products Grid -->
	<?php if (!empty($products)): ?>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
			<?php foreach ($products as $product): ?>
				<div class="bg-white rounded-2xl border border-slate-200 hover:border-amber-300 hover:shadow-xl transition duration-300 overflow-hidden flex flex-col group">
					
					<!-- Product Image -->
					<a href="<?= base_url('produk/' . $product['slug']) ?>" class="block relative h-56 bg-slate-100 overflow-hidden">
						<?php 
						$imagePath = 'uploads/products/' . $product['image'];
						if (!empty($product['image']) && file_exists(FCPATH . $imagePath)): 
						?>
							<img src="<?= base_url($imagePath) ?>" alt="<?= html_escape($product['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
						<?php else: ?>
							<div class="w-full h-full flex flex-col items-center justify-center bg-slate-100 text-slate-400 group-hover:bg-amber-50/50 transition">
								<span class="text-5xl mb-2">👞</span>
								<span class="text-xs font-semibold tracking-wider text-slate-400 uppercase">Mix-D Footwear</span>
							</div>
						<?php endif; ?>

						<!-- Category Badge -->
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

					<!-- Content -->
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

							<a href="<?= base_url('produk/' . $product['slug']) ?>" class="px-3.5 py-2 rounded-xl bg-slate-900 text-white hover:bg-amber-600 text-xs font-bold transition flex items-center gap-1">
								Detail
							</a>
						</div>
					</div>

				</div>
			<?php endforeach; ?>
		</div>

		<!-- Pagination -->
		<?php if ($total_pages > 1): ?>
			<div class="mt-12 flex justify-center items-center gap-2">
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
					   class="w-10 h-10 flex items-center justify-center rounded-xl text-sm font-bold transition <?= ($i == $current_page) ? 'bg-amber-600 text-white shadow-md' : 'bg-white border border-slate-200 text-slate-700 hover:bg-slate-100' ?>">
						<?= $i ?>
					</a>
				<?php endfor; ?>
			</div>
		<?php endif; ?>

	<?php else: ?>
		<!-- Empty State -->
		<div class="bg-white rounded-2xl border border-slate-200 p-12 text-center max-w-lg mx-auto">
			<div class="text-6xl mb-4">🔍</div>
			<h3 class="text-lg font-bold text-dark-900 mb-2">Sepatu Tidak Ditemukan</h3>
			<p class="text-sm text-slate-500 mb-6">
				Tidak ada produk yang cocok dengan kriteria pencarian atau kategori yang Anda pilih.
			</p>
			<a href="<?= base_url('produk') ?>" class="inline-block px-6 py-2.5 bg-amber-600 hover:bg-amber-500 text-white rounded-xl text-sm font-semibold transition">
				Lihat Semua Sepatu
			</a>
		</div>
	<?php endif; ?>

</div>
