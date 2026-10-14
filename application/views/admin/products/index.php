<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="space-y-6">
	
	<!-- Header & Action -->
	<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
		<div>
			<h1 class="text-xl font-bold text-dark-900">Katalog Produk Sepatu Pria</h1>
			<p class="text-xs text-slate-500 mt-1">Kelola data sepatu, harga, stok, varian ukuran, dan foto produk.</p>
		</div>
		<a href="<?= base_url('admin/products/create') ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-500 text-white font-bold text-xs transition shadow-sm">
			<span>+</span> Tambah Produk Baru
		</a>
	</div>

	<!-- Filters & Search -->
	<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
		<form method="GET" action="<?= base_url('admin/products') ?>" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
			
			<div class="sm:col-span-6 relative">
				<input type="text" 
				       name="q" 
				       value="<?= html_escape($keyword) ?>" 
				       placeholder="Cari nama sepatu atau deskripsi..." 
				       class="w-full pl-9 pr-4 py-2 rounded-xl border border-slate-300 text-xs focus:outline-none focus:ring-2 focus:ring-amber-500">
				<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 text-xs">
					🔍
				</div>
			</div>

			<div class="sm:col-span-4">
				<select name="kategori" class="w-full py-2 px-3 rounded-xl border border-slate-300 text-xs focus:outline-none focus:ring-2 focus:ring-amber-500 bg-white">
					<option value="">Semua Kategori</option>
					<?php foreach ($categories as $cat): ?>
						<option value="<?= html_escape($cat['slug']) ?>" <?= ($category_slug == $cat['slug']) ? 'selected' : '' ?>>
							<?= html_escape($cat['name']) ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="sm:col-span-2">
				<button type="submit" class="w-full py-2 px-4 bg-dark-900 hover:bg-amber-600 text-white rounded-xl text-xs font-semibold transition text-center">
					Filter
				</button>
			</div>

		</form>
	</div>

	<!-- Products Table Card -->
	<div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">
		<div class="overflow-x-auto">
			<table class="w-full text-left text-sm">
				<thead class="bg-slate-50 text-slate-600 text-xs uppercase font-bold border-b border-slate-200">
					<tr>
						<th class="py-4 px-6">Foto & Nama Sepatu</th>
						<th class="py-4 px-6">Kategori</th>
						<th class="py-4 px-6">Harga</th>
						<th class="py-4 px-6">Varian Ukuran</th>
						<th class="py-4 px-6 text-center">Stok</th>
						<th class="py-4 px-6 text-center">Views</th>
						<th class="py-4 px-6 text-center">Status</th>
						<th class="py-4 px-6 text-right">Aksi</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-slate-100">
					<?php if (!empty($products)): ?>
						<?php foreach ($products as $p): ?>
							<tr class="hover:bg-slate-50/80 transition">
								<td class="py-4 px-6">
									<div class="flex items-center gap-3">
										<div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 overflow-hidden flex-shrink-0 flex items-center justify-center">
											<?php 
											$img = 'uploads/products/' . $p['image'];
											if (!empty($p['image']) && file_exists(FCPATH . $img)): 
											?>
												<img src="<?= base_url($img) ?>" alt="" class="w-full h-full object-cover">
											<?php else: ?>
												<span class="text-xl">👞</span>
											<?php endif; ?>
										</div>
										<div>
											<span class="font-bold text-dark-900 block leading-tight">
												<?= html_escape($p['name']) ?>
											</span>
											<span class="text-[11px] text-slate-400 font-mono">
												<?= html_escape($p['slug']) ?>
											</span>
										</div>
									</div>
								</td>
								<td class="py-4 px-6 text-xs text-slate-600 font-medium">
									<?= html_escape($p['category_name'] ? $p['category_name'] : 'Tanpa Kategori') ?>
								</td>
								<td class="py-4 px-6 text-xs">
									<span class="font-extrabold text-amber-600 block">
										Rp <?= number_format($p['price'], 0, ',', '.') ?>
									</span>
									<?php if (!empty($p['original_price'])): ?>
										<span class="text-[10px] text-slate-400 line-through">
											Rp <?= number_format($p['original_price'], 0, ',', '.') ?>
										</span>
									<?php endif; ?>
								</td>
								<td class="py-4 px-6 text-xs text-slate-700 font-semibold max-w-[140px] truncate">
									<?= html_escape($p['available_sizes']) ?>
								</td>
								<td class="py-4 px-6 text-center text-xs">
									<?php if ($p['stock'] > 0): ?>
										<span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-bold">
											<?= (int)$p['stock'] ?>
										</span>
									<?php else: ?>
										<span class="px-2.5 py-0.5 rounded-full bg-rose-100 text-rose-800 font-bold">
											Habis
										</span>
									<?php endif; ?>
								</td>
								<td class="py-4 px-6 text-center text-xs">
									<span class="font-bold text-slate-600">
										👁 <?= (int)$p['views'] ?>
									</span>
								</td>
								<td class="py-4 px-6 text-center text-xs">
									<?php if ($p['is_active'] == 1): ?>
										<span class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 font-bold border border-emerald-200">
											Aktif
										</span>
									<?php else: ?>
										<span class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-500 font-bold border border-slate-200">
											Nonaktif
										</span>
									<?php endif; ?>
								</td>
								<td class="py-4 px-6 text-right space-x-1.5 whitespace-nowrap">
									<a href="<?= base_url('produk/' . $p['slug']) ?>" target="_blank" class="px-2.5 py-1.5 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-800 text-xs font-bold transition">
										Lihat ↗
									</a>
									<a href="<?= base_url('admin/products/edit/' . $p['id']) ?>" class="px-2.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
										Edit
									</a>
									<a href="<?= base_url('admin/products/delete/' . $p['id']) ?>" 
									   onclick="return confirm('Apakah Anda yakin ingin menghapus produk <?= html_escape($p['name']) ?>?')" 
									   class="px-2.5 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold transition">
										Hapus
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="8" class="text-center py-12 text-slate-400 text-xs">
								Tidak ada produk sepatu yang cocok dengan filter.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>

		<!-- Pagination -->
		<?php if ($total_pages > 1): ?>
			<div class="p-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
				<div>
					Halaman <span class="font-bold text-dark-900"><?= $current_page ?></span> dari <span class="font-bold text-dark-900"><?= $total_pages ?></span> (Total <?= $total_products ?> produk)
				</div>
				<div class="flex items-center gap-1">
					<?php for ($i = 1; $i <= $total_pages; $i++): ?>
						<?php 
						$qp = array();
						if (!empty($keyword)) $qp['q'] = $keyword;
						if (!empty($category_slug)) $qp['kategori'] = $category_slug;
						$qp['page'] = $i;
						?>
						<a href="<?= base_url('admin/products?' . http_build_query($qp)) ?>" class="px-3 py-1 rounded-lg font-bold transition <?= ($i == $current_page) ? 'bg-amber-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">
							<?= $i ?>
						</a>
					<?php endfor; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>

</div>
