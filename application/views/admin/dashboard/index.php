<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="space-y-8">
	
	<!-- Top Metric Cards -->
	<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
		
		<!-- Total Produk -->
		<div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
			<div>
				<span class="text-xs font-bold text-slate-500 uppercase tracking-wider block">Total Produk Sepatu</span>
				<span class="text-3xl font-extrabold text-dark-900 mt-2 block"><?= (int)$total_products ?></span>
				<span class="text-xs text-amber-600 mt-1 block font-medium">Dalam katalog toko</span>
			</div>
			<div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
				👞
			</div>
		</div>

		<!-- Total Kategori -->
		<div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
			<div>
				<span class="text-xs font-bold text-slate-500 uppercase tracking-wider block">Kategori Sepatu</span>
				<span class="text-3xl font-extrabold text-dark-900 mt-2 block"><?= (int)$total_categories ?></span>
				<span class="text-xs text-slate-500 mt-1 block font-medium">Sneakers, Oxford, dll</span>
			</div>
			<div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
				🏷️
			</div>
		</div>

		<!-- Pengunjung Hari Ini -->
		<div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
			<div>
				<span class="text-xs font-bold text-slate-500 uppercase tracking-wider block">Pengunjung Hari Ini</span>
				<span class="text-3xl font-extrabold text-emerald-600 mt-2 block"><?= (int)$today_visitors ?></span>
				<span class="text-xs text-slate-500 mt-1 block font-medium">Unique IP hari ini</span>
			</div>
			<div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
				👥
			</div>
		</div>

		<!-- Total Pengunjung Terdata -->
		<div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
			<div>
				<span class="text-xs font-bold text-slate-500 uppercase tracking-wider block">Total Pengunjung</span>
				<span class="text-3xl font-extrabold text-dark-900 mt-2 block"><?= (int)$total_visitors ?></span>
				<span class="text-xs text-slate-500 mt-1 block font-medium">Sejak website aktif</span>
			</div>
			<div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
				📈
			</div>
		</div>

	</div>

	<!-- Quick Action Banner -->
	<div class="bg-gradient-to-r from-dark-950 to-slate-800 p-6 sm:p-8 rounded-3xl text-white shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
		<div class="space-y-2 text-center md:text-left">
			<h3 class="text-xl font-bold">Aksi Cepat Pengelolaan Toko</h3>
			<p class="text-xs sm:text-sm text-slate-300">Tambahkan stok sepatu baru, perbarui kategori, atau atur nomor WhatsApp pemesanan.</p>
		</div>
		<div class="flex flex-wrap items-center gap-3">
			<a href="<?= base_url('admin/products/create') ?>" class="px-5 py-3 rounded-xl bg-amber-600 hover:bg-amber-500 text-white font-bold text-xs transition shadow-md">
				+ Tambah Produk Baru
			</a>
			<a href="<?= base_url('admin/categories/create') ?>" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs transition border border-slate-700">
				+ Tambah Kategori
			</a>
			<a href="<?= base_url('admin/settings') ?>" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs transition border border-slate-700">
				⚙️ Atur No. WA Toko
			</a>
		</div>
	</div>

	<!-- Top Viewed Shoes Table (Requirement Utama) -->
	<div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">
		<div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
			<div>
				<h3 class="text-base font-extrabold text-dark-900 flex items-center gap-2">
					<span>🔥 Sepatu Paling Sering Dilihat Pengunjung</span>
				</h3>
				<p class="text-xs text-slate-500 mt-0.5">Daftar produk dengan jumlah tayangan (views) tertinggi di toko online Anda.</p>
			</div>
			<a href="<?= base_url('admin/products') ?>" class="text-xs font-bold text-amber-700 hover:text-amber-800 transition">
				Lihat Semua Produk →
			</a>
		</div>

		<div class="overflow-x-auto">
			<table class="w-full text-left text-sm">
				<thead class="bg-slate-50 text-slate-600 text-xs uppercase font-bold border-b border-slate-200">
					<tr>
						<th class="py-3.5 px-6">Foto & Nama Sepatu</th>
						<th class="py-3.5 px-6">Kategori</th>
						<th class="py-3.5 px-6">Ukuran Tersedia</th>
						<th class="py-3.5 px-6">Harga</th>
						<th class="py-3.5 px-6 text-center">Jumlah Dilihat (Views)</th>
						<th class="py-3.5 px-6 text-right">Aksi</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-slate-100">
					<?php if (!empty($top_viewed_shoes)): ?>
						<?php foreach ($top_viewed_shoes as $shoe): ?>
							<tr class="hover:bg-slate-50/80 transition">
								<td class="py-4 px-6">
									<div class="flex items-center gap-3">
										<div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 overflow-hidden flex-shrink-0 flex items-center justify-center">
											<?php 
											$img = 'uploads/products/' . $shoe['image'];
											if (!empty($shoe['image']) && file_exists(FCPATH . $img)): 
											?>
												<img src="<?= base_url($img) ?>" alt="" class="w-full h-full object-cover">
											<?php else: ?>
												<span class="text-xl">👞</span>
											<?php endif; ?>
										</div>
										<div>
											<span class="font-bold text-dark-900 block leading-tight">
												<?= html_escape($shoe['name']) ?>
											</span>
											<span class="text-[11px] text-slate-400">
												Stok: <?= (int)$shoe['stock'] ?> pasang
											</span>
										</div>
									</div>
								</td>
								<td class="py-4 px-6 text-slate-600 text-xs">
									<span class="px-2.5 py-1 rounded-lg bg-slate-100 font-medium">
										<?= html_escape($shoe['category_name'] ? $shoe['category_name'] : 'Tanpa Kategori') ?>
									</span>
								</td>
								<td class="py-4 px-6 text-xs font-semibold text-slate-700">
									<?= html_escape($shoe['available_sizes']) ?>
								</td>
								<td class="py-4 px-6 font-bold text-amber-600 text-xs">
									Rp <?= number_format($shoe['price'], 0, ',', '.') ?>
								</td>
								<td class="py-4 px-6 text-center">
									<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-amber-50 text-amber-800 text-xs font-extrabold border border-amber-200">
										👁 <?= (int)$shoe['views'] ?> views
									</span>
								</td>
								<td class="py-4 px-6 text-right space-x-2">
									<a href="<?= base_url('admin/products/edit/' . $shoe['id']) ?>" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
										Edit
									</a>
									<a href="<?= base_url('produk/' . $shoe['slug']) ?>" target="_blank" class="px-3 py-1.5 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-700 text-xs font-bold transition">
										Lihat ↗
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="6" class="text-center py-8 text-slate-400 text-xs">
								Belum ada data tayangan produk yang tercatat.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Visitor Trend Analytics (Last 7 Days) -->
	<div class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-sm">
		<div class="mb-6">
			<h3 class="text-base font-extrabold text-dark-900 flex items-center gap-2">
				<span>📊 Tren Kunjungan Website (7 Hari Terakhir)</span>
			</h3>
			<p class="text-xs text-slate-500 mt-0.5">Statistik jumlah pengunjung unik per hari.</p>
		</div>

		<div class="grid grid-cols-2 sm:grid-cols-7 gap-3">
			<?php 
			$maxVisits = !empty($visitor_stats_7d) ? max(max(array_values($visitor_stats_7d)), 1) : 1;
			foreach ($visitor_stats_7d as $date => $visits): 
				$pct = round(($visits / $maxVisits) * 100);
				$dayLabel = date('D, d M', strtotime($date));
			?>
				<div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 text-center flex flex-col justify-between">
					<div class="text-[11px] font-bold text-slate-500"><?= $dayLabel ?></div>
					
					<div class="my-4">
						<div class="text-2xl font-extrabold text-amber-600"><?= $visits ?></div>
						<span class="text-[10px] text-slate-400 uppercase tracking-wider">Kunjungan</span>
					</div>

					<div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
						<div class="bg-amber-600 h-2 rounded-full" style="width: <?= max(5, $pct) ?>%"></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

</div>
