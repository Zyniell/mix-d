<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="space-y-8">
	
	<!-- 1. Grafik Kunjungan Website (Visitor Trend Analytics 7 Days) -->
	<div class="bg-white rounded-3xl border border-stone-200/80 p-6 sm:p-8 shadow-card">
		<div class="mb-6">
			<h3 class="text-base font-serif font-bold text-stone-950 flex items-center gap-2">
				<span>Grafik Kunjungan Website (7 Hari Terakhir)</span>
			</h3>
			<p class="text-xs text-stone-500 mt-0.5">Statistik jumlah pengunjung unik per hari untuk memantau traffic toko.</p>
		</div>

		<div class="grid grid-cols-2 sm:grid-cols-7 gap-3">
			<?php 
			$maxVisits = !empty($visitor_stats_7d) ? max(max(array_values($visitor_stats_7d)), 1) : 1;
			foreach ($visitor_stats_7d as $date => $visits): 
				$pct = round(($visits / $maxVisits) * 100);
				$dayLabel = date('D, d M', strtotime($date));
			?>
				<div class="bg-stone-50 border border-stone-200/80 rounded-2xl p-4 text-center flex flex-col justify-between">
					<div class="text-[11px] font-bold text-stone-500"><?= $dayLabel ?></div>
					
					<div class="my-3">
						<div class="text-2xl font-serif font-bold text-brand-700 font-tabular"><?= $visits ?></div>
						<span class="text-[10px] text-stone-400 uppercase tracking-wider">Kunjungan</span>
					</div>

					<div class="w-full bg-stone-200 h-2 rounded-full overflow-hidden">
						<div class="bg-brand-600 h-2 rounded-full" style="width: <?= max(6, $pct) ?>%"></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- 2. Top Metric Cards -->
	<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
		
		<!-- Total Produk -->
		<div class="bg-white p-5 rounded-2xl border border-stone-200/80 shadow-card flex items-center justify-between">
			<div>
				<span class="text-[11px] font-bold text-stone-500 uppercase tracking-wider block">Katalog Sepatu</span>
				<span class="text-3xl font-serif font-bold text-stone-950 mt-1 block font-tabular"><?= (int)$total_products ?></span>
				<span class="text-[11px] text-brand-700 mt-1 block font-medium">Model aktif siap jual</span>
			</div>
			<div class="w-12 h-12 bg-brand-50 border border-brand-200/60 text-brand-700 rounded-2xl flex items-center justify-center">
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
				</svg>
			</div>
		</div>

		<!-- Total Kategori -->
		<div class="bg-white p-5 rounded-2xl border border-stone-200/80 shadow-card flex items-center justify-between">
			<div>
				<span class="text-[11px] font-bold text-stone-500 uppercase tracking-wider block">Kategori Sepatu</span>
				<span class="text-3xl font-serif font-bold text-stone-950 mt-1 block font-tabular"><?= (int)$total_categories ?></span>
				<span class="text-[11px] text-stone-500 mt-1 block font-medium">Sneakers, Oxford, dll</span>
			</div>
			<div class="w-12 h-12 bg-stone-100 border border-stone-200 text-stone-700 rounded-2xl flex items-center justify-center">
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
				</svg>
			</div>
		</div>

		<!-- Pengunjung Hari Ini -->
		<div class="bg-white p-5 rounded-2xl border border-stone-200/80 shadow-card flex items-center justify-between">
			<div>
				<span class="text-[11px] font-bold text-stone-500 uppercase tracking-wider block">Pengunjung Hari Ini</span>
				<span class="text-3xl font-serif font-bold text-emerald-700 mt-1 block font-tabular"><?= (int)$today_visitors ?></span>
				<span class="text-[11px] text-stone-500 mt-1 block font-medium">Unique IP tercatat</span>
			</div>
			<div class="w-12 h-12 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl flex items-center justify-center">
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
				</svg>
			</div>
		</div>

		<!-- Total Pengunjung Terdata -->
		<div class="bg-white p-5 rounded-2xl border border-stone-200/80 shadow-card flex items-center justify-between">
			<div>
				<span class="text-[11px] font-bold text-stone-500 uppercase tracking-wider block">Total Pengunjung</span>
				<span class="text-3xl font-serif font-bold text-stone-950 mt-1 block font-tabular"><?= (int)$total_visitors ?></span>
				<span class="text-[11px] text-stone-500 mt-1 block font-medium">Akumulasi kunjungan</span>
			</div>
			<div class="w-12 h-12 bg-stone-100 border border-stone-200 text-stone-700 rounded-2xl flex items-center justify-center">
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
				</svg>
			</div>
		</div>

	</div>

	<!-- 3. Sepatu Paling Banyak Dilihat (Top Views) -->
	<div class="bg-white rounded-3xl border border-stone-200/80 overflow-hidden shadow-card">
		<div class="p-5 sm:px-6 border-b border-stone-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
			<div>
				<div class="flex items-center gap-2">
					<span class="w-2 h-2 rounded-full bg-brand-600"></span>
					<h3 class="text-base font-serif font-bold text-stone-950">
						Sepatu Paling Banyak Dilihat (Top Views)
					</h3>
				</div>
				<p class="text-xs text-stone-500 mt-0.5">Daftar produk dengan jumlah tayangan (views) tertinggi dari pengunjung website.</p>
			</div>
			<a href="<?= base_url('admin/products') ?>" class="text-xs font-bold text-brand-700 hover:text-brand-800 transition flex items-center gap-1">
				<span>Semua Produk</span>
				<span>→</span>
			</a>
		</div>

		<div class="overflow-x-auto">
			<table class="w-full text-left text-xs">
				<thead class="bg-stone-50 text-stone-600 uppercase font-bold border-b border-stone-200">
					<tr>
						<th class="py-3.5 px-6">Model Sepatu</th>
						<th class="py-3.5 px-6">Kategori</th>
						<th class="py-3.5 px-6">Ukuran</th>
						<th class="py-3.5 px-6">Harga</th>
						<th class="py-3.5 px-6 text-center">Jumlah Dilihat</th>
						<th class="py-3.5 px-6 text-right">Aksi</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-stone-100">
					<?php if (!empty($top_viewed_shoes)): ?>
						<?php foreach ($top_viewed_shoes as $shoe): ?>
							<tr class="hover:bg-stone-50/70 transition">
								<td class="py-3.5 px-6">
									<div class="flex items-center gap-3">
										<div class="w-12 h-12 rounded-xl bg-stone-100 border border-stone-200 overflow-hidden flex-shrink-0 flex items-center justify-center">
											<?php 
											$img = 'uploads/products/' . $shoe['image'];
											if (!empty($shoe['image']) && file_exists(FCPATH . $img)): 
											?>
												<img src="<?= base_url($img) ?>" alt="" class="w-full h-full object-cover">
											<?php else: ?>
												<svg class="w-6 h-6 text-stone-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
												</svg>
											<?php endif; ?>
										</div>
										<div>
											<span class="font-bold text-stone-900 block leading-tight">
												<?= html_escape($shoe['name']) ?>
											</span>
											<span class="text-[11px] text-stone-400 font-tabular">
												Stok: <?= (int)$shoe['stock'] ?> pasang
											</span>
										</div>
									</div>
								</td>
								<td class="py-3.5 px-6 text-stone-600">
									<span class="px-2.5 py-1 rounded-md bg-stone-100 font-medium text-[11px]">
										<?= html_escape($shoe['category_name'] ? $shoe['category_name'] : 'Tanpa Kategori') ?>
									</span>
								</td>
								<td class="py-3.5 px-6 text-stone-700 font-semibold font-tabular">
									<?= html_escape($shoe['available_sizes']) ?>
								</td>
								<td class="py-3.5 px-6 font-serif font-bold text-brand-700 font-tabular text-sm">
									Rp <?= number_format($shoe['price'], 0, ',', '.') ?>
								</td>
								<td class="py-3.5 px-6 text-center">
									<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-brand-50 text-brand-900 font-bold border border-brand-200/80 font-tabular">
										<svg class="w-3.5 h-3.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
										</svg>
										<?= (int)$shoe['views'] ?> views
									</span>
								</td>
								<td class="py-3.5 px-6 text-right space-x-1.5 whitespace-nowrap">
									<a href="<?= base_url('admin/products/edit/' . $shoe['id']) ?>" class="px-3 py-1.5 rounded-lg bg-stone-100 hover:bg-stone-200 text-stone-700 font-semibold transition active:scale-95">
										Edit
									</a>
									<a href="<?= base_url('produk/' . $shoe['slug']) ?>" target="_blank" class="px-3 py-1.5 rounded-lg bg-brand-50 hover:bg-brand-100 text-brand-800 font-semibold transition active:scale-95">
										Lihat ↗
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="6" class="text-center py-8 text-stone-400">
								Belum ada data tayangan produk yang tercatat.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- 4. Pusat Kendali Toko (Quick Action Command Bar) -->
	<div class="bg-stone-950 p-6 sm:p-8 rounded-3xl text-white shadow-xl flex flex-col md:flex-row items-center justify-between gap-6 border border-stone-800 relative overflow-hidden">
		<div class="absolute inset-0 bg-noise opacity-30 pointer-events-none"></div>
		<div class="space-y-1.5 text-center md:text-left relative z-10">
			<span class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-400 block">Pusat Kendali Toko</span>
			<h3 class="text-xl font-serif font-bold">Aksi Cepat Manajemen Katalog</h3>
			<p class="text-xs text-stone-400">Tambahkan model sepatu baru, perbarui kategori, atau atur nomor WhatsApp pemesanan.</p>
		</div>
		<div class="flex flex-wrap items-center gap-2.5 relative z-10">
			<a href="<?= base_url('admin/products/create') ?>" class="px-4 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs transition active:scale-95 shadow-sm border border-brand-500/30">
				+ Tambah Produk Baru
			</a>
			<a href="<?= base_url('admin/categories/create') ?>" class="px-4 py-2.5 rounded-xl bg-stone-900 hover:bg-stone-800 text-stone-200 font-bold text-xs transition border border-stone-800 active:scale-95">
				+ Tambah Kategori
			</a>
			<a href="<?= base_url('admin/settings') ?>" class="px-4 py-2.5 rounded-xl bg-stone-900 hover:bg-stone-800 text-stone-200 font-bold text-xs transition border border-stone-800 active:scale-95">
				⚙️ Atur No. WA Toko
			</a>
		</div>
	</div>

</div>
