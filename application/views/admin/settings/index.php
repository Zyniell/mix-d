<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="max-w-4xl mx-auto space-y-6">
	
	<!-- Header -->
	<div>
		<h1 class="text-xl font-bold text-dark-900">Pengaturan Identitas Toko & Pemesanan</h1>
		<p class="text-xs text-slate-500 mt-1">Kelola nama toko, nomor WhatsApp tujuan pesanan pelanggan, kontak, dan narasi Tentang Kami.</p>
	</div>

	<!-- Form Card -->
	<div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
		
		<?php if (!empty($validation_error)): ?>
			<div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-medium">
				<?= $validation_error ?>
			</div>
		<?php endif; ?>

		<form method="POST" action="<?= base_url('admin/settings/update') ?>" class="space-y-6">
			<!-- CSRF Token -->
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				
				<!-- Nama Toko -->
				<div>
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Nama Toko <span class="text-rose-500">*</span>
					</label>
					<input type="text" 
					       name="store_name" 
					       value="<?= set_value('store_name', isset($settings['store_name']) ? $settings['store_name'] : 'Mix-D Men\'s Footwear') ?>" 
					       required 
					       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
				</div>

				<!-- WhatsApp Number -->
				<div>
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Nomor WhatsApp Tujuan Checkout <span class="text-rose-500">*</span>
					</label>
					<input type="text" 
					       name="whatsapp_number" 
					       value="<?= set_value('whatsapp_number', isset($settings['whatsapp_number']) ? $settings['whatsapp_number'] : '') ?>" 
					       required 
					       placeholder="Contoh: 6281234567890 atau 081234567890" 
					       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
					<span class="text-[11px] text-slate-400 mt-1 block">Nomor HP yang menerima rincian pesanan pelanggan langsung via chat WhatsApp.</span>
				</div>

				<!-- Tagline Toko -->
				<div class="md:col-span-2">
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Tagline / Slogan Toko <span class="text-rose-500">*</span>
					</label>
					<input type="text" 
					       name="store_tagline" 
					       value="<?= set_value('store_tagline', isset($settings['store_tagline']) ? $settings['store_tagline'] : '') ?>" 
					       required 
					       placeholder="Spesialis Sepatu Pria Berkualitas & Berkarakter" 
					       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
				</div>

				<!-- Email Toko -->
				<div>
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Email Dukungan / CS
					</label>
					<input type="email" 
					       name="store_email" 
					       value="<?= set_value('store_email', isset($settings['store_email']) ? $settings['store_email'] : '') ?>" 
					       placeholder="support@mixd-shoes.com" 
					       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
				</div>

				<!-- Alamat Toko -->
				<div>
					<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
						Alamat Toko / Gudang
					</label>
					<input type="text" 
					       name="store_address" 
					       value="<?= set_value('store_address', isset($settings['store_address']) ? $settings['store_address'] : '') ?>" 
					       placeholder="Kota, Provinsi" 
					       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
				</div>

			</div>

			<!-- Teks Halaman Tentang Kami -->
			<div class="pt-2">
				<label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">
					Narasi Profil Toko (Halaman Tentang Kami)
				</label>
				<textarea name="about_text" 
				          rows="6" 
				          placeholder="Ceritakan latar belakang, visi, dan keistimewaan koleksi sepatu Mix-D..." 
				          class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 leading-relaxed"><?= set_value('about_text', isset($settings['about_text']) ? $settings['about_text'] : '') ?></textarea>
			</div>

			<div class="pt-6 border-t border-slate-100 flex items-center justify-end">
				<button type="submit" class="px-8 py-3 rounded-xl bg-amber-600 hover:bg-amber-500 text-white text-xs font-bold transition shadow-sm">
					Simpan Pengaturan
				</button>
			</div>
		</form>

	</div>

</div>
