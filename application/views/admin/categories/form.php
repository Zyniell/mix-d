<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="max-w-2xl mx-auto space-y-6">
	
	<!-- Header -->
	<div class="flex items-center justify-between">
		<div>
			<a href="<?= base_url('admin/categories') ?>" class="text-xs font-semibold text-slate-500 hover:text-dark-900 transition flex items-center gap-1 mb-2">
				← Kembali ke Daftar Kategori
			</a>
			<h1 class="text-xl font-bold text-dark-900">
				<?= $category ? 'Edit Kategori: ' . html_escape($category['name']) : 'Tambah Kategori Sepatu Baru' ?>
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
		$actionUrl = $category ? base_url('admin/categories/update/' . $category['id']) : base_url('admin/categories/store');
		?>
		<form method="POST" action="<?= $actionUrl ?>" class="space-y-5">
			<!-- CSRF Token -->
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

			<div>
				<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
					Nama Kategori <span class="text-rose-500">*</span>
				</label>
				<input type="text" 
				       name="name" 
				       value="<?= set_value('name', $category ? $category['name'] : '') ?>" 
				       required 
				       placeholder="Contoh: Chelsea Boots, Sneakers, Sandal Pria" 
				       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
				<span class="text-[11px] text-slate-400 mt-1 block">Slug URL akan dibuat secara otomatis dari nama kategori.</span>
			</div>

			<div>
				<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
					Deskripsi Singkat (Opsional)
				</label>
				<textarea name="description" 
				          rows="3" 
				          placeholder="Deskripsi singkat seputar tipe sepatu pada kategori ini..." 
				          class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500"><?= set_value('description', $category ? $category['description'] : '') ?></textarea>
			</div>

			<div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
				<a href="<?= base_url('admin/categories') ?>" class="px-5 py-2.5 rounded-xl border border-slate-300 text-xs font-bold text-slate-700 hover:bg-slate-100 transition">
					Batal
				</a>
				<button type="submit" class="px-6 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-500 text-white text-xs font-bold transition shadow-sm">
					<?= $category ? 'Simpan Perubahan' : 'Tambah Kategori' ?>
				</button>
			</div>
		</form>

	</div>

</div>
