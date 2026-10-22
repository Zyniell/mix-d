<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="max-w-2xl mx-auto space-y-6">
	
	<!-- Header -->
	<div>
		<a href="<?= base_url('admin/categories') ?>" class="inline-flex items-center gap-1.5 text-xs font-semibold text-stone-500 hover:text-stone-900 transition mb-3">
			<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
			</svg>
			<span>Kembali ke Daftar Kategori</span>
		</a>
		<h1 class="font-serif font-bold text-2xl text-stone-950 tracking-tight">
			<?= $category ? 'Edit Kategori: ' . html_escape($category['name']) : 'Tambah Kategori Sepatu Baru' ?>
		</h1>
		<p class="text-xs text-stone-500 mt-1">Tentukan nama kategori dan deskripsi singkat untuk filter katalog belanja.</p>
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
		$actionUrl = $category ? base_url('admin/categories/update/' . $category['id']) : base_url('admin/categories/store');
		?>
		<form method="POST" action="<?= $actionUrl ?>" class="space-y-5">
			<!-- CSRF Token -->
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

			<div>
				<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
					Nama Kategori <span class="text-rose-500">*</span>
				</label>
				<input type="text" 
				       name="name" 
				       value="<?= set_value('name', $category ? $category['name'] : '') ?>" 
				       required 
				       placeholder="Contoh: Oxford Shoes, Chelsea Boots, Sneakers Pria" 
				       class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition">
				<span class="text-[11px] text-stone-400 mt-1.5 block">Slug URL yang ramah SEO akan digenerate otomatis dari nama kategori ini.</span>
			</div>

			<div>
				<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
					Deskripsi Karakteristik Siluet (Opsional)
				</label>
				<textarea name="description" 
				          rows="3" 
				          placeholder="Deskripsi singkat seputar tipe siluet sepatu pada kategori ini..." 
				          class="w-full px-4 py-3 rounded-xl border border-stone-300 text-sm text-stone-800 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition leading-relaxed"><?= set_value('description', $category ? $category['description'] : '') ?></textarea>
			</div>

			<div class="pt-4 border-t border-stone-100 flex items-center justify-end gap-3">
				<a href="<?= base_url('admin/categories') ?>" class="px-5 py-2.5 rounded-xl border border-stone-300 text-xs font-semibold text-stone-700 hover:bg-stone-100 transition">
					Batal
				</a>
				<button type="submit" class="px-6 py-2.5 rounded-xl bg-brand-700 hover:bg-brand-600 text-white text-xs font-semibold transition duration-200 shadow-sm active:scale-95">
					<?= $category ? 'Simpan Perubahan' : 'Terbitkan Kategori' ?>
				</button>
			</div>
		</form>

	</div>

</div>
