<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="space-y-6">
	
	<!-- Header & Action -->
	<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
		<div>
			<h1 class="text-xl font-bold text-dark-900">Kelola Kategori Sepatu Pria</h1>
			<p class="text-xs text-slate-500 mt-1">Daftar kategori untuk mengelompokkan sepatu di katalog toko.</p>
		</div>
		<a href="<?= base_url('admin/categories/create') ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-500 text-white font-bold text-xs transition shadow-sm">
			<span>+</span> Tambah Kategori Baru
		</a>
	</div>

	<!-- Categories Table Card -->
	<div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">
		<div class="overflow-x-auto">
			<table class="w-full text-left text-sm">
				<thead class="bg-slate-50 text-slate-600 text-xs uppercase font-bold border-b border-slate-200">
					<tr>
						<th class="py-4 px-6 w-16 text-center">No</th>
						<th class="py-4 px-6">Nama Kategori</th>
						<th class="py-4 px-6">Slug URL</th>
						<th class="py-4 px-6">Deskripsi Singkat</th>
						<th class="py-4 px-6 text-center">Jumlah Produk</th>
						<th class="py-4 px-6 text-right">Aksi</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-slate-100">
					<?php if (!empty($categories)): ?>
						<?php $no = 1; foreach ($categories as $cat): ?>
							<tr class="hover:bg-slate-50/80 transition">
								<td class="py-4 px-6 text-center font-bold text-slate-400 text-xs">
									<?= $no++ ?>
								</td>
								<td class="py-4 px-6 font-bold text-dark-900">
									<?= html_escape($cat['name']) ?>
								</td>
								<td class="py-4 px-6 text-xs text-slate-500 font-mono">
									/produk?kategori=<?= html_escape($cat['slug']) ?>
								</td>
								<td class="py-4 px-6 text-xs text-slate-500 max-w-xs truncate">
									<?= html_escape($cat['description'] ? $cat['description'] : '-') ?>
								</td>
								<td class="py-4 px-6 text-center">
									<span class="inline-block px-3 py-1 rounded-full bg-slate-100 text-dark-900 font-bold text-xs">
										<?= (int)$cat['total_products'] ?> Sepatu
									</span>
								</td>
								<td class="py-4 px-6 text-right space-x-2">
									<a href="<?= base_url('admin/categories/edit/' . $cat['id']) ?>" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
										Edit
									</a>
									<a href="<?= base_url('admin/categories/delete/' . $cat['id']) ?>" 
									   onclick="return confirm('Hapus kategori <?= html_escape($cat['name']) ?>? Produk dalam kategori ini akan menjadi tanpa kategori.')" 
									   class="px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold transition">
										Hapus
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="6" class="text-center py-8 text-slate-400 text-xs">
								Belum ada kategori yang dibuat.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
