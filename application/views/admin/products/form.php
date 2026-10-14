<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="max-w-4xl mx-auto space-y-6">
	
	<!-- Header -->
	<div class="flex items-center justify-between">
		<div>
			<a href="<?= base_url('admin/products') ?>" class="text-xs font-semibold text-slate-500 hover:text-dark-900 transition flex items-center gap-1 mb-2">
				← Kembali ke Katalog Produk
			</a>
			<h1 class="text-xl font-bold text-dark-900">
				<?= $product ? 'Edit Produk: ' . html_escape($product['name']) : 'Tambah Produk Sepatu Baru' ?>
			</h1>
		</div>
	</div>

	<!-- Form Card -->
	<div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
		
		<?php if (!empty($validation_error)): ?>
			<div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-medium">
				<?= $validation_error ?>
			</div>
		<?php endif; ?>

		<?php 
		$actionUrl = $product ? base_url('admin/products/update/' . $product['id']) : base_url('admin/products/store');
		?>
		<form method="POST" action="<?= $actionUrl ?>" enctype="multipart/form-data" class="space-y-6">
			<!-- CSRF Token -->
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				
				<!-- Nama Sepatu -->
				<div class="md:col-span-2">
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Nama Model Sepatu <span class="text-rose-500">*</span>
					</label>
					<input type="text" 
					       name="name" 
					       value="<?= set_value('name', $product ? $product['name'] : '') ?>" 
					       required 
					       placeholder="Contoh: Mix-D Oxford Classic Leather Brown" 
					       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
				</div>

				<!-- Kategori -->
				<div>
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Kategori Sepatu <span class="text-rose-500">*</span>
					</label>
					<select name="category_id" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 bg-white">
						<option value="">Pilih Kategori</option>
						<?php 
						$selectedCat = set_value('category_id', $product ? $product['category_id'] : '');
						foreach ($categories as $cat): 
						?>
							<option value="<?= $cat['id'] ?>" <?= ($selectedCat == $cat['id']) ? 'selected' : '' ?>>
								<?= html_escape($cat['name']) ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>

				<!-- Stok -->
				<div>
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Jumlah Stok (Pasang) <span class="text-rose-500">*</span>
					</label>
					<input type="number" 
					       name="stock" 
					       value="<?= set_value('stock', $product ? $product['stock'] : '10') ?>" 
					       required 
					       min="0" 
					       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
				</div>

				<!-- Harga Jual -->
				<div>
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Harga Jual (Rp) <span class="text-rose-500">*</span>
					</label>
					<input type="number" 
					       name="price" 
					       value="<?= set_value('price', $product ? (int)$product['price'] : '') ?>" 
					       required 
					       min="0" 
					       step="1000" 
					       placeholder="Contoh: 350000" 
					       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
				</div>

				<!-- Harga Coret (Diskon) -->
				<div>
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Harga Coret / Asli (Opsional)
					</label>
					<input type="number" 
					       name="original_price" 
					       value="<?= set_value('original_price', $product && $product['original_price'] ? (int)$product['original_price'] : '') ?>" 
					       min="0" 
					       step="1000" 
					       placeholder="Contoh: 420000 (untuk badge diskon)" 
					       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
				</div>

			</div>

			<!-- Varian Ukuran Sepatu (Pria 39 - 45) -->
			<div class="pt-2">
				<div class="flex items-center justify-between mb-3">
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider">
						Pilihan Ukuran Sepatu yang Tersedia <span class="text-rose-500">*</span>
					</label>
					<button type="button" id="btnToggleAllSizes" class="text-xs font-semibold text-amber-700 hover:text-amber-800">
						Pilih Semua Ukuran
					</button>
				</div>

				<div class="grid grid-cols-4 sm:grid-cols-7 gap-3">
					<?php foreach ($default_sizes as $sz): ?>
						<?php 
						$checked = in_array($sz, $product_sizes) ? 'checked' : '';
						?>
						<label class="cursor-pointer">
							<input type="checkbox" name="sizes[]" value="<?= $sz ?>" class="sr-only peer size-checkbox" <?= $checked ?>>
							<div class="py-3 text-center border-2 border-slate-200 rounded-xl font-bold text-sm text-slate-700 transition peer-checked:border-amber-600 peer-checked:bg-amber-50 peer-checked:text-amber-800 hover:border-slate-300">
								Size <?= $sz ?>
							</div>
						</label>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- Upload Foto Produk -->
			<div class="pt-2">
				<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
					Foto Produk Sepatu
				</label>
				
				<?php if ($product && !empty($product['image'])): ?>
					<div class="mb-3 flex items-center gap-4 p-3 bg-slate-50 rounded-2xl border border-slate-200">
						<div class="w-16 h-16 rounded-xl bg-white border border-slate-200 overflow-hidden flex-shrink-0">
							<img src="<?= base_url('uploads/products/' . $product['image']) ?>" alt="" class="w-full h-full object-cover">
						</div>
						<div class="text-xs text-slate-600">
							<span class="font-bold block">Foto saat ini: <?= html_escape($product['image']) ?></span>
							<span class="text-slate-400">Pilih file baru di bawah jika ingin mengganti foto ini.</span>
						</div>
					</div>
				<?php endif; ?>

				<input type="file" 
				       name="image" 
				       accept="image/*" 
				       class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-dark-900 hover:file:bg-slate-200 cursor-pointer">
				<span class="text-[11px] text-slate-400 mt-1 block">Format didukung: JPG, PNG, WEBP. Maksimal 4 MB.</span>
			</div>

			<!-- Status Aktif -->
			<div class="pt-2">
				<label class="flex items-center gap-3 cursor-pointer">
					<?php 
					$isActive = set_value('is_active', $product ? $product['is_active'] : 1);
					?>
					<input type="checkbox" name="is_active" value="1" <?= $isActive ? 'checked' : '' ?> class="w-4 h-4 text-amber-600 rounded border-slate-300 focus:ring-amber-500">
					<span class="text-xs font-bold text-dark-900">Aktifkan produk ini di katalog toko</span>
				</label>
			</div>

			<!-- Deskripsi Sepatu -->
			<div>
				<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
					Deskripsi & Keunggulan Sepatu
				</label>
				<textarea name="description" 
				          rows="5" 
				          placeholder="Jelaskan bahan sepatu, teknologi sol, kenyamanan insole, dan saran outfit pemakaian..." 
				          class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500"><?= set_value('description', $product ? $product['description'] : '') ?></textarea>
			</div>

			<!-- Actions -->
			<div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
				<a href="<?= base_url('admin/products') ?>" class="px-5 py-2.5 rounded-xl border border-slate-300 text-xs font-bold text-slate-700 hover:bg-slate-100 transition">
					Batal
				</a>
				<button type="submit" class="px-6 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-500 text-white text-xs font-bold transition shadow-sm">
					<?= $product ? 'Simpan Perubahan' : 'Tambahkan Sepatu' ?>
				</button>
			</div>
		</form>

	</div>

</div>

<script>
	document.getElementById('btnToggleAllSizes')?.addEventListener('click', function() {
		const checkboxes = document.querySelectorAll('.size-checkbox');
		const anyUnchecked = Array.from(checkboxes).some(cb => !cb.checked);
		checkboxes.forEach(cb => cb.checked = anyUnchecked);
	});
</script>
