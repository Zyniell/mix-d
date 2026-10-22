<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="max-w-4xl mx-auto space-y-6">
	
	<!-- Header -->
	<div>
		<a href="<?= base_url('admin/products') ?>" class="inline-flex items-center gap-1.5 text-xs font-semibold text-stone-500 hover:text-stone-900 transition mb-3">
			<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
			</svg>
			<span>Kembali ke Katalog Produk</span>
		</a>
		<h1 class="font-serif font-bold text-2xl text-stone-950 tracking-tight">
			<?= $product ? 'Edit Produk: ' . html_escape($product['name']) : 'Tambah Produk Sepatu Baru' ?>
		</h1>
		<p class="text-xs text-stone-500 mt-1">Lengkapi parameter spesifikasi sepatu, harga resmi, varian ukuran, dan materi visual produk.</p>
	</div>

	<!-- Form Card -->
	<div class="bg-white p-6 sm:p-8 rounded-2xl border border-stone-200/90 shadow-card space-y-6">
		
		<?php if (!empty($validation_error)): ?>
			<div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-medium flex items-start gap-2.5">
				<svg class="w-4 h-4 text-rose-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
				</svg>
				<div><?= $validation_error ?></div>
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
					<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
						Nama Model Sepatu <span class="text-rose-500">*</span>
					</label>
					<input type="text" 
					       name="name" 
					       value="<?= set_value('name', $product ? $product['name'] : '') ?>" 
					       required 
					       placeholder="Contoh: Mix-D Oxford Classic Leather Brown" 
					       class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition">
				</div>

				<!-- Kategori -->
				<div>
					<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
						Kategori Siluet Sepatu <span class="text-rose-500">*</span>
					</label>
					<select name="category_id" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm text-stone-900 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 bg-white transition">
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
					<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
						Jumlah Stok Tersedia (Pasang) <span class="text-rose-500">*</span>
					</label>
					<input type="number" 
					       name="stock" 
					       value="<?= set_value('stock', $product ? $product['stock'] : '10') ?>" 
					       required 
					       min="0" 
					       class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm font-mono text-stone-900 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition">
				</div>

				<!-- Harga Jual -->
				<div>
					<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
						Harga Jual Resmi (Rp) <span class="text-rose-500">*</span>
					</label>
					<input type="number" 
					       name="price" 
					       value="<?= set_value('price', $product ? (int)$product['price'] : '') ?>" 
					       required 
					       min="0" 
					       step="1000" 
					       placeholder="Contoh: 425000" 
					       class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm font-mono text-stone-900 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition">
				</div>

				<!-- Harga Coret (Diskon) -->
				<div>
					<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
						Harga Coret / MSRP Normal (Opsional)
					</label>
					<input type="number" 
					       name="original_price" 
					       value="<?= set_value('original_price', $product && $product['original_price'] ? (int)$product['original_price'] : '') ?>" 
					       min="0" 
					       step="1000" 
					       placeholder="Contoh: 590000" 
					       class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm font-mono text-stone-900 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition">
				</div>

			</div>

			<!-- Varian Ukuran Sepatu (Pria 39 - 45) -->
			<div class="pt-2">
				<div class="flex items-center justify-between mb-3">
					<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider">
						Pilihan Ukuran Sepatu yang Tersedia (EU) <span class="text-rose-500">*</span>
					</label>
					<button type="button" id="btnToggleAllSizes" class="text-xs font-semibold text-brand-700 hover:text-brand-800 transition">
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
							<div class="py-2.5 text-center border-2 border-stone-200 rounded-xl font-mono font-bold text-xs text-stone-700 transition peer-checked:border-brand-700 peer-checked:bg-brand-50 peer-checked:text-brand-700 hover:border-stone-300">
								Size <?= $sz ?>
							</div>
						</label>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- Upload Foto Produk -->
			<div class="pt-2">
				<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
					Foto Produk Sepatu (Studio Shoot)
				</label>
				
				<?php if ($product && !empty($product['image'])): ?>
					<div class="mb-3.5 flex items-center gap-4 p-3.5 bg-stone-50 rounded-2xl border border-stone-200">
						<div class="w-16 h-16 rounded-xl bg-white border border-stone-200 overflow-hidden flex-shrink-0">
							<img src="<?= base_url('uploads/products/' . $product['image']) ?>" alt="<?= html_escape($product['name']) ?>" class="w-full h-full object-cover">
						</div>
						<div class="text-xs text-stone-600">
							<span class="font-bold text-stone-900 block font-mono text-[11px]">Foto aktif: <?= html_escape($product['image']) ?></span>
							<span class="text-stone-400 text-[11px]">Pilih file baru di bawah ini jika ingin mengganti visual produk.</span>
						</div>
					</div>
				<?php endif; ?>

				<input type="file" 
				       name="image" 
				       accept="image/*" 
				       class="w-full text-xs text-stone-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-stone-100 file:text-stone-800 hover:file:bg-stone-200 cursor-pointer">
				<span class="text-[11px] text-stone-400 mt-1.5 block">Format didukung: JPG, PNG, WEBP. Maksimal 4 MB. Resolusi studio 1:1 disarankan.</span>
			</div>

			<!-- Status Aktif -->
			<div class="pt-2">
				<label class="flex items-center gap-3 cursor-pointer">
					<?php 
					$isActive = set_value('is_active', $product ? $product['is_active'] : 1);
					?>
					<input type="checkbox" name="is_active" value="1" <?= $isActive ? 'checked' : '' ?> class="w-4 h-4 text-brand-700 rounded border-stone-300 focus:ring-brand-700/30">
					<span class="text-xs font-semibold text-stone-900">Publikasikan produk ini secara langsung di katalog toko online</span>
				</label>
			</div>

			<!-- Deskripsi Sepatu -->
			<div>
				<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
					Deskripsi & Karakter Sepatu
				</label>
				<textarea name="description" 
				          rows="5" 
				          placeholder="Jelaskan karakteristik kulit, sol, jahitan Goodyear welted / Blake stitch, dan rekomendasi padu padan gaya..." 
				          class="w-full px-4 py-3 rounded-xl border border-stone-300 text-sm text-stone-800 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition leading-relaxed"><?= set_value('description', $product ? $product['description'] : '') ?></textarea>
			</div>

			<!-- Actions -->
			<div class="pt-6 border-t border-stone-100 flex items-center justify-end gap-3">
				<a href="<?= base_url('admin/products') ?>" class="px-5 py-2.5 rounded-xl border border-stone-300 text-xs font-semibold text-stone-700 hover:bg-stone-100 transition">
					Batal
				</a>
				<button type="submit" class="px-6 py-2.5 rounded-xl bg-brand-700 hover:bg-brand-600 text-white text-xs font-semibold transition duration-200 shadow-sm active:scale-95">
					<?= $product ? 'Simpan Perubahan' : 'Terbitkan Produk Baru' ?>
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
