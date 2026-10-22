<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Editorial Header -->
<div class="bg-stone-950 text-white py-16 lg:py-20 border-b border-stone-800 relative overflow-hidden">
	<div class="absolute inset-0 bg-noise opacity-40 pointer-events-none"></div>
	<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 relative z-10">
		<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-500/10 border border-brand-500/30 text-brand-300 text-xs font-semibold tracking-wider uppercase">
			<span>Tentang & Nilai Kerajinan</span>
		</div>
		<h1 class="text-3xl sm:text-5xl font-serif font-black tracking-tight leading-tight">
			Filosofi & Dedikasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-300 via-brand-400 to-amber-200">MIX-D</span>
		</h1>
		<p class="text-sm sm:text-base text-stone-300 max-w-2xl mx-auto leading-relaxed">
			<?= html_escape(isset($store_settings['store_tagline']) ? $store_settings['store_tagline'] : 'Spesialis Sepatu Pria Berkualitas & Berkarakter.') ?>
		</p>
	</div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
	
	<!-- Story & Mission Card -->
	<div class="bg-white p-8 sm:p-12 rounded-3xl border border-stone-200/80 shadow-card space-y-8">
		<div>
			<span class="text-[11px] font-bold text-brand-700 uppercase tracking-[0.2em] block mb-2">Visi Kami</span>
			<h2 class="text-2xl sm:text-3xl font-serif font-bold text-stone-950 tracking-tight leading-snug">
				Langkah Nyaman, Penampilan Berkarakter Pria Sejati
			</h2>
		</div>
		
		<div class="prose text-xs sm:text-sm text-stone-600 leading-relaxed space-y-4 whitespace-pre-line border-l-2 border-brand-500/40 pl-5">
			<?= nl2br(html_escape(isset($store_settings['about_text']) ? $store_settings['about_text'] : 'Mix-D hadir sebagai solusi kebutuhan alas kaki pria modern Indonesia.')) ?>
		</div>

		<!-- Pillar Grid (Clean SVGs) -->
		<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-6 border-t border-stone-100">
			<div class="p-5 rounded-2xl bg-stone-50 border border-stone-200/80">
				<div class="w-10 h-10 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center mb-3">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
					</svg>
				</div>
				<h3 class="font-bold text-stone-900 text-xs uppercase tracking-wider mb-1">Khusus Sepatu Pria</h3>
				<p class="text-xs text-stone-500 leading-relaxed">Dirancang spesifik untuk struktur telapak kaki pria Indonesia.</p>
			</div>

			<div class="p-5 rounded-2xl bg-stone-50 border border-stone-200/80">
				<div class="w-10 h-10 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center mb-3">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
					</svg>
				</div>
				<h3 class="font-bold text-stone-900 text-xs uppercase tracking-wider mb-1">Material Pilihan</h3>
				<p class="text-xs text-stone-500 leading-relaxed">Bahan sintetis tahan lama, jahitan presisi, dan sol karet anti-slip kokoh.</p>
			</div>

			<div class="p-5 rounded-2xl bg-stone-50 border border-stone-200/80">
				<div class="w-10 h-10 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center mb-3">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
					</svg>
				</div>
				<h3 class="font-bold text-stone-900 text-xs uppercase tracking-wider mb-1">Konsultasi Ramah</h3>
				<p class="text-xs text-stone-500 leading-relaxed">Pemesanan dan konsultasi ukuran langsung ke WhatsApp CS yang sigap.</p>
			</div>
		</div>
	</div>

	<!-- Size Chart Guide Reference Card -->
	<div class="bg-white p-8 sm:p-10 rounded-3xl border border-stone-200/80 shadow-card space-y-5">
		<div>
			<span class="text-[11px] font-bold text-brand-700 uppercase tracking-[0.2em] block mb-1">Panduan Ukuran</span>
			<h3 class="text-xl font-serif font-bold text-stone-950">Tabel Ukuran Sepatu Pria (Size Chart Standar EU)</h3>
			<p class="text-xs text-stone-500 mt-1">Ukur panjang telapak kaki Anda dari tumit hingga ujung jari terpanjang saat berdiri tegak.</p>
		</div>

		<div class="overflow-x-auto">
			<table class="w-full text-left text-xs">
				<thead class="bg-stone-50 text-stone-700 font-bold border-b border-stone-200">
					<tr>
						<th class="py-3 px-4">Nomor Ukuran (EU)</th>
						<th class="py-3 px-4">Panjang Kaki (cm)</th>
						<th class="py-3 px-4">Panjang Kaki (Inchi)</th>
						<th class="py-3 px-4">Rekomendasi Karakter Kaki</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-stone-100 font-tabular">
					<tr class="hover:bg-stone-50/50"><td class="py-3 px-4 font-bold text-stone-950">Size 39</td><td class="py-3 px-4">24.5 cm</td><td class="py-3 px-4 text-stone-500">9.6 in</td><td class="py-3 px-4 text-stone-600">Standar pria kaki ramping</td></tr>
					<tr class="hover:bg-stone-50/50"><td class="py-3 px-4 font-bold text-stone-950">Size 40</td><td class="py-3 px-4">25.0 cm</td><td class="py-3 px-4 text-stone-500">9.8 in</td><td class="py-3 px-4 text-stone-600">Standar harian</td></tr>
					<tr class="hover:bg-stone-50/50"><td class="py-3 px-4 font-bold text-stone-950">Size 41</td><td class="py-3 px-4">26.0 cm</td><td class="py-3 px-4 text-stone-500">10.2 in</td><td class="py-3 px-4 text-stone-600">Paling umum di Indonesia</td></tr>
					<tr class="hover:bg-stone-50/50"><td class="py-3 px-4 font-bold text-stone-950">Size 42</td><td class="py-3 px-4">26.5 cm</td><td class="py-3 px-4 text-stone-500">10.4 in</td><td class="py-3 px-4 text-stone-600">Paling umum di Indonesia</td></tr>
					<tr class="hover:bg-stone-50/50"><td class="py-3 px-4 font-bold text-stone-950">Size 43</td><td class="py-3 px-4">27.5 cm</td><td class="py-3 px-4 text-stone-500">10.8 in</td><td class="py-3 px-4 text-stone-600">Kaki bidang / tinggi</td></tr>
					<tr class="hover:bg-stone-50/50"><td class="py-3 px-4 font-bold text-stone-950">Size 44</td><td class="py-3 px-4">28.0 cm</td><td class="py-3 px-4 text-stone-500">11.0 in</td><td class="py-3 px-4 text-stone-600">Ukuran besar</td></tr>
					<tr class="hover:bg-stone-50/50"><td class="py-3 px-4 font-bold text-stone-950">Size 45</td><td class="py-3 px-4">29.0 cm</td><td class="py-3 px-4 text-stone-500">11.4 in</td><td class="py-3 px-4 text-stone-600">Ukuran ekstra besar</td></tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Store Concierge Contact Card -->
	<div class="bg-stone-950 text-white p-8 sm:p-10 rounded-3xl shadow-xl flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden border border-stone-800">
		<div class="absolute inset-0 bg-noise opacity-40 pointer-events-none"></div>
		<div class="space-y-3 text-center md:text-left relative z-10">
			<span class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-400 block">Layanan Pelanggan</span>
			<h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Butuh Bantuan Memilih Model & Ukuran?</h3>
			<p class="text-xs sm:text-sm text-stone-400 max-w-md leading-relaxed">
				Tim Mix-D siap membantu Anda memberikan rekomendasi siluet yang paling cocok dengan agenda Anda.
			</p>
			<div class="text-xs text-stone-400 space-y-1 pt-2">
				<div>📍 <strong>Alamat:</strong> <?= html_escape(isset($store_settings['store_address']) ? $store_settings['store_address'] : 'Jakarta, Indonesia') ?></div>
				<div>✉️ <strong>Email:</strong> <?= html_escape(isset($store_settings['store_email']) ? $store_settings['store_email'] : '-') ?></div>
			</div>
		</div>

		<?php if (!empty($store_settings['whatsapp_number'])): ?>
			<a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $store_settings['whatsapp_number']) ?>" 
			   target="_blank" 
			   rel="noopener noreferrer"
			   class="px-8 py-4 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs tracking-wide rounded-2xl shadow-lg transition flex items-center gap-2.5 flex-shrink-0 active:scale-95 border border-emerald-500/40 relative z-10">
				<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
					<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
				</svg>
				<span>Chat WhatsApp Kami</span>
			</a>
		<?php endif; ?>
	</div>

</div>

