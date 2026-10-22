<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="space-y-6">
	
	<!-- Header & Action -->
	<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
		<div>
			<h1 class="font-serif font-bold text-2xl text-stone-950 tracking-tight">Katalog Produk Sepatu Pria</h1>
			<p class="text-xs text-stone-500 mt-1">Kelola data sepatu, harga, stok, varian ukuran EU, dan galeri fotografi produk.</p>
		</div>
		<a href="<?= base_url('admin/products/create') ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-brand-700 hover:bg-brand-600 text-white font-semibold text-xs transition duration-200 shadow-sm active:scale-95">
			<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
			</svg>
			<span>Tambah Sepatu Baru</span>
		</a>
	</div>

	<!-- Filters & Search -->
	<div class="bg-white p-4 sm:p-5 rounded-2xl border border-stone-200/90 shadow-card">
		<form method="GET" action="<?= base_url('admin/products') ?>" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
			
			<div class="sm:col-span-6 relative">
				<input type="text" 
				       name="q" 
				       value="<?= html_escape($keyword) ?>" 
				       placeholder="Cari nama sepatu, siluet, atau deskripsi..." 
				       class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-stone-300 text-xs text-stone-800 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition">
				<div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
					<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
					</svg>
				</div>
			</div>

			<div class="sm:col-span-4">
				<select name="kategori" class="w-full py-2.5 px-3.5 rounded-xl border border-stone-300 text-xs text-stone-700 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 bg-white transition">
					<option value="">Semua Siluet & Kategori</option>
					<?php foreach ($categories as $cat): ?>
						<option value="<?= html_escape($cat['slug']) ?>" <?= ($category_slug == $cat['slug']) ? 'selected' : '' ?>>
							<?= html_escape($cat['name']) ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="sm:col-span-2">
				<button type="submit" class="w-full py-2.5 px-4 bg-stone-900 hover:bg-brand-700 text-white rounded-xl text-xs font-semibold transition duration-200 text-center shadow-sm">
					Terapkan Filter
				</button>
			</div>

		</form>
	</div>

	<!-- Products Table Card -->
	<div class="bg-white rounded-2xl border border-stone-200/90 overflow-hidden shadow-card">
		<div class="overflow-x-auto">
			<table class="w-full text-left text-sm">
				<thead class="bg-stone-50/75 text-stone-500 text-[11px] uppercase font-semibold tracking-wider border-b border-stone-200">
					<tr>
						<th class="py-4 px-6">Foto & Nama Sepatu</th>
						<th class="py-4 px-6">Kategori</th>
						<th class="py-4 px-6">Harga</th>
						<th class="py-4 px-6">Ukuran Tersedia</th>
						<th class="py-4 px-6 text-center">Stok</th>
						<th class="py-4 px-6 text-center">Tayangan</th>
						<th class="py-4 px-6 text-center">Status</th>
						<th class="py-4 px-6 text-right">Aksi</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-stone-100">
					<?php if (!empty($products)): ?>
						<?php foreach ($products as $p): ?>
							<tr class="hover:bg-stone-50/60 transition group">
								<td class="py-4 px-6">
									<div class="flex items-center gap-3.5">
										<div class="w-13 h-13 w-12 h-12 rounded-xl bg-stone-100 border border-stone-200 overflow-hidden flex-shrink-0 flex items-center justify-center">
											<?php 
											$img = 'uploads/products/' . $p['image'];
											if (!empty($p['image']) && file_exists(FCPATH . $img)): 
											?>
												<img src="<?= base_url($img) ?>" alt="<?= html_escape($p['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
											<?php else: ?>
												<svg class="w-6 h-6 text-stone-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 17h18M3 17l1.5-6h7l2 3h5.5l2 3M3 17v2a1 1 0 001 1h16a1 1 0 001-1v-2" />
												</svg>
											<?php endif; ?>
										</div>
										<div class="min-w-0">
											<span class="font-serif font-bold text-stone-950 block leading-tight truncate">
												<?= html_escape($p['name']) ?>
											</span>
											<span class="text-[11px] text-stone-400 font-mono tracking-tight block truncate mt-0.5">
												<?= html_escape($p['slug']) ?>
											</span>
										</div>
									</div>
								</td>
								<td class="py-4 px-6 text-xs text-stone-600 font-medium">
									<span class="inline-block px-2.5 py-1 rounded-md bg-stone-100 text-stone-700 text-[11px] font-semibold border border-stone-200/60">
										<?= html_escape($p['category_name'] ? $p['category_name'] : 'Tanpa Kategori') ?>
									</span>
								</td>
								<td class="py-4 px-6 text-xs whitespace-nowrap">
									<span class="font-mono font-bold text-stone-900 block text-xs">
										Rp <?= number_format($p['price'], 0, ',', '.') ?>
									</span>
									<?php if (!empty($p['original_price'])): ?>
										<span class="font-mono text-[11px] text-stone-400 line-through">
											Rp <?= number_format($p['original_price'], 0, ',', '.') ?>
										</span>
									<?php endif; ?>
								</td>
								<td class="py-4 px-6 text-xs text-stone-600 font-mono max-w-[140px] truncate">
									<?= html_escape($p['available_sizes']) ?>
								</td>
								<td class="py-4 px-6 text-center text-xs">
									<?php if ($p['stock'] > 0): ?>
										<span class="font-mono px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200/70 font-semibold text-xs">
											<?= (int)$p['stock'] ?>
										</span>
									<?php else: ?>
										<span class="px-2.5 py-0.5 rounded-full bg-rose-50 text-rose-700 border border-rose-200/70 font-semibold text-xs">
											Habis
										</span>
									<?php endif; ?>
								</td>
								<td class="py-4 px-6 text-center text-xs">
									<div class="inline-flex items-center gap-1 font-mono text-xs text-stone-600">
										<svg class="w-3.5 h-3.5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
										</svg>
										<span><?= (int)$p['views'] ?></span>
									</div>
								</td>
								<td class="py-4 px-6 text-center text-xs">
									<?php if ($p['is_active'] == 1): ?>
										<span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-semibold text-[11px] border border-emerald-200/80 inline-flex items-center gap-1">
											<span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
											<span>Aktif</span>
										</span>
									<?php else: ?>
										<span class="px-2.5 py-1 rounded-full bg-stone-100 text-stone-500 font-semibold text-[11px] border border-stone-200 inline-flex items-center gap-1">
											<span class="w-1.5 h-1.5 rounded-full bg-stone-400"></span>
											<span>Nonaktif</span>
										</span>
									<?php endif; ?>
								</td>
								<td class="py-4 px-6 text-right space-x-1.5 whitespace-nowrap">
									<a href="<?= base_url('produk/' . $p['slug']) ?>" target="_blank" class="px-2.5 py-1.5 rounded-lg bg-stone-100 hover:bg-brand-50 text-stone-700 hover:text-brand-800 text-xs font-semibold border border-stone-200 transition">
										Lihat ↗
									</a>
									<a href="<?= base_url('admin/products/edit/' . $p['id']) ?>" class="px-2.5 py-1.5 rounded-lg bg-stone-100 hover:bg-stone-200 text-stone-800 text-xs font-semibold border border-stone-200 transition">
										Edit
									</a>
									<a href="<?= base_url('admin/products/delete/' . $p['id']) ?>" 
									   onclick="return confirm('Apakah Anda yakin ingin menghapus produk <?= html_escape($p['name']) ?>?')" 
									   class="px-2.5 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-semibold border border-rose-200/70 transition">
										Hapus
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="8" class="text-center py-16 text-stone-400 text-xs">
								<svg class="w-10 h-10 text-stone-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
								</svg>
								<p class="font-serif text-stone-600 font-bold text-sm mb-1">Tidak ada produk ditemukan</p>
								<p class="text-stone-400 text-xs">Silakan sesuaikan kata kunci pencarian atau filter kategori Anda.</p>
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>

		<!-- Pagination -->
		<?php if ($total_pages > 1): ?>
			<div class="p-4 sm:p-5 border-t border-stone-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-stone-500">
				<div>
					Halaman <span class="font-semibold text-stone-900"><?= $current_page ?></span> dari <span class="font-semibold text-stone-900"><?= $total_pages ?></span> &bull; Total <span class="font-semibold text-stone-900"><?= $total_products ?></span> koleksi sepatu
				</div>
				<div class="flex items-center gap-1.5">
					<?php for ($i = 1; $i <= $total_pages; $i++): ?>
						<?php 
						$qp = array();
						if (!empty($keyword)) $qp['q'] = $keyword;
						if (!empty($category_slug)) $qp['kategori'] = $category_slug;
						$qp['page'] = $i;
						?>
						<a href="<?= base_url('admin/products?' . http_build_query($qp)) ?>" class="w-8 h-8 rounded-lg flex items-center justify-center font-mono text-xs font-bold transition duration-150 <?= ($i == $current_page) ? 'bg-brand-700 text-white shadow-sm' : 'bg-stone-100 text-stone-700 hover:bg-stone-200 border border-stone-200' ?>">
							<?= $i ?>
						</a>
					<?php endfor; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>

</div>
