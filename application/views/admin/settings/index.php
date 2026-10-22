<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="max-w-4xl mx-auto space-y-6">
	
	<!-- Header -->
	<div>
		<h1 class="font-serif font-bold text-2xl text-stone-950 tracking-tight">Pengaturan Identitas & Kanal WhatsApp</h1>
		<p class="text-xs text-stone-500 mt-1">Kelola nama brand toko, nomor WhatsApp tujuan pesanan, kontak layanan, dan narasi profil Tentang Kami.</p>
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

		<form method="POST" action="<?= base_url('admin/settings/update') ?>" class="space-y-6">
			<!-- CSRF Token -->
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				
				<!-- Nama Toko -->
				<div>
					<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
						Nama Brand / Toko <span class="text-rose-500">*</span>
					</label>
					<input type="text" 
					       name="store_name" 
					       value="<?= set_value('store_name', isset($settings['store_name']) ? $settings['store_name'] : 'Mix-D Men\'s Footwear') ?>" 
					       required 
					       class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition">
				</div>

				<!-- WhatsApp Number -->
				<div>
					<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
						Nomor WhatsApp Tujuan Checkout <span class="text-rose-500">*</span>
					</label>
					<div class="relative">
						<input type="text" 
						       name="whatsapp_number" 
						       value="<?= set_value('whatsapp_number', isset($settings['whatsapp_number']) ? $settings['whatsapp_number'] : '') ?>" 
						       required 
						       placeholder="Contoh: 6281234567890 atau 081234567890" 
						       class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-stone-300 text-sm font-mono text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition">
						<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-emerald-600">
							<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
								<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.861.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z" />
							</svg>
						</div>
					</div>
					<span class="text-[11px] text-stone-400 mt-1.5 block">Nomor HP ini akan menerima rincian checkout keranjang pelanggan secara otomatis via pesan WhatsApp.</span>
				</div>

				<!-- Tagline Toko -->
				<div class="md:col-span-2">
					<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
						Tagline / Slogan Brand <span class="text-rose-500">*</span>
					</label>
					<input type="text" 
					       name="store_tagline" 
					       value="<?= set_value('store_tagline', isset($settings['store_tagline']) ? $settings['store_tagline'] : '') ?>" 
					       required 
					       placeholder="Artisanal Men's Footwear — Presisi, Kenyamanan, & Karakter Abadi" 
					       class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition">
				</div>

				<!-- Email Toko -->
				<div>
					<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
						Email Layanan Pelanggan (CS)
					</label>
					<input type="email" 
					       name="store_email" 
					       value="<?= set_value('store_email', isset($settings['store_email']) ? $settings['store_email'] : '') ?>" 
					       placeholder="concierge@mixd.com" 
					       class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition">
				</div>

				<!-- Alamat Toko -->
				<div>
					<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
						Alamat Workshop / Flagship Store
					</label>
					<input type="text" 
					       name="store_address" 
					       value="<?= set_value('store_address', isset($settings['store_address']) ? $settings['store_address'] : '') ?>" 
					       placeholder="Bandung, Jawa Barat, Indonesia" 
					       class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition">
				</div>

			</div>

			<!-- Teks Halaman Tentang Kami -->
			<div class="pt-2">
				<label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-2">
					Narasi Profil Toko (Halaman Tentang Kami)
				</label>
				<textarea name="about_text" 
				          rows="6" 
				          placeholder="Ceritakan sejarah, filosofi material, proses pembuatan handmade, dan komitmen mutu sepatu Mix-D..." 
				          class="w-full px-4 py-3 rounded-xl border border-stone-300 text-sm text-stone-800 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-brand-700/30 focus:border-brand-700 transition leading-relaxed"><?= set_value('about_text', isset($settings['about_text']) ? $settings['about_text'] : '') ?></textarea>
			</div>

			<div class="pt-6 border-t border-stone-100 flex items-center justify-end">
				<button type="submit" class="px-8 py-3 rounded-xl bg-brand-700 hover:bg-brand-600 text-white text-xs font-semibold transition duration-200 shadow-sm active:scale-95">
					Simpan Pengaturan Toko
				</button>
			</div>
		</form>

	</div>

</div>
