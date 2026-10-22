<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="space-y-6">
	
	<!-- Header & Action -->
	<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
		<div>
			<h1 class="font-serif font-bold text-2xl text-stone-950 tracking-tight">Kategori & Siluet Sepatu</h1>
			<p class="text-xs text-stone-500 mt-1">Kelola taksonomi kategori untuk mengelompokkan koleksi sepatu pria di etalase toko.</p>
		</div>
		<a href="<?= base_url('admin/categories/create') ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-brand-700 hover:bg-brand-600 text-white font-semibold text-xs transition duration-200 shadow-sm active:scale-95">
			<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
			</svg>
			<span>Tambah Kategori Baru</span>
		</a>
	</div>

	<!-- Categories Table Card -->
	<div class="bg-white rounded-2xl border border-stone-200/90 overflow-hidden shadow-card">
		<div class="overflow-x-auto">
			<table class="w-full text-left text-sm">
				<thead class="bg-stone-50/75 text-stone-500 text-[11px] uppercase font-semibold tracking-wider border-b border-stone-200">
					<tr>
						<th class="py-4 px-6 w-16 text-center">No</th>
						<th class="py-4 px-6">Nama Kategori</th>
						<th class="py-4 px-6">Slug URL</th>
						<th class="py-4 px-6">Deskripsi Singkat</th>
						<th class="py-4 px-6 text-center">Jumlah Produk</th>
						<th class="py-4 px-6 text-right">Aksi</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-stone-100">
					<?php if (!empty($categories)): ?>
						<?php $no = 1; foreach ($categories as $cat): ?>
							<tr class="hover:bg-stone-50/60 transition">
								<td class="py-4 px-6 text-center font-mono font-semibold text-stone-400 text-xs">
									<?= $no++ ?>
								</td>
								<td class="py-4 px-6">
									<span class="font-serif font-bold text-stone-950 text-sm block">
										<?= html_escape($cat['name']) ?>
									</span>
								</td>
								<td class="py-4 px-6 text-xs text-stone-500 font-mono">
									<span class="bg-stone-100 px-2 py-1 rounded text-stone-600 border border-stone-200/60">
										/produk?kategori=<?= html_escape($cat['slug']) ?>
									</span>
								</td>
								<td class="py-4 px-6 text-xs text-stone-600 max-w-xs truncate">
									<?= html_escape($cat['description'] ? $cat['description'] : '—') ?>
								</td>
								<td class="py-4 px-6 text-center">
									<span class="inline-block px-3 py-1 rounded-full bg-stone-100 text-stone-800 font-mono font-semibold text-xs border border-stone-200/60">
										<?= (int)$cat['total_products'] ?> Pasang
									</span>
								</td>
								<td class="py-4 px-6 text-right space-x-2 whitespace-nowrap">
									<a href="<?= base_url('admin/categories/edit/' . $cat['id']) ?>" class="px-3 py-1.5 rounded-lg bg-stone-100 hover:bg-stone-200 text-stone-800 text-xs font-semibold border border-stone-200 transition">
										Edit
									</a>
									<a href="<?= base_url('admin/categories/delete/' . $cat['id']) ?>" 
									   onclick="return confirm('Hapus kategori <?= html_escape($cat['name']) ?>? Produk dalam kategori ini akan dialihkan menjadi tanpa kategori.')" 
									   class="px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-semibold border border-rose-200/70 transition">
										Hapus
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="6" class="text-center py-12 text-stone-400 text-xs">
								Belum ada kategori yang dibuat. Silakan tambahkan kategori baru.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
