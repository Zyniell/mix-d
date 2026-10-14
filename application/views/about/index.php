<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="bg-dark-950 text-white py-16 border-b border-slate-800">
	<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
		<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-semibold uppercase tracking-wider">
			Profil Toko & Visi
		</div>
		<h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">
			Tentang <span class="text-amber-500">MIX-D</span>
		</h1>
		<p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
			<?= html_escape(isset($store_settings['store_tagline']) ? $store_settings['store_tagline'] : 'Spesialis Sepatu Pria Berkualitas & Berkarakter.') ?>
		</p>
	</div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
	
	<!-- Story & Mission -->
	<div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-6">
		<h2 class="text-2xl font-extrabold text-dark-900 tracking-tight">
			Langkah Nyaman, Penampilan Berkarakter
		</h2>
		
		<div class="prose text-sm text-slate-600 leading-relaxed space-y-4 whitespace-pre-line">
			<?= nl2br(html_escape(isset($store_settings['about_text']) ? $store_settings['about_text'] : 'Mix-D hadir sebagai solusi kebutuhan alas kaki pria modern Indonesia.')) ?>
		</div>

		<!-- Pillar Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-6 border-t border-slate-100">
			<div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
				<div class="text-2xl mb-2">👞</div>
				<h3 class="font-bold text-dark-900 text-sm mb-1">Fokus Sepatu Pria</h3>
				<p class="text-xs text-slate-500 leading-relaxed">Setiap model dirancang sesuai proporsi dan kenyamanan pria.</p>
			</div>
			<div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
				<div class="text-2xl mb-2">💎</div>
				<h3 class="font-bold text-dark-900 text-sm mb-1">Kualitas Terjamin</h3>
				<p class="text-xs text-slate-500 leading-relaxed">Bahan awet, jahitan kokoh, dan sol anti-slip untuk berbagai medan.</p>
			</div>
			<div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
				<div class="text-2xl mb-2">💬</div>
				<h3 class="font-bold text-dark-900 text-sm mb-1">Pelayanan Ramah</h3>
				<p class="text-xs text-slate-500 leading-relaxed">Pemesanan dan konsultasi ukuran langsung ke WhatsApp admin.</p>
			</div>
		</div>
	</div>

	<!-- Store Location & Contact Card -->
	<div class="bg-slate-900 text-white p-8 sm:p-12 rounded-3xl shadow-xl flex flex-col md:flex-row items-center justify-between gap-8">
		<div class="space-y-4 text-center md:text-left">
			<h3 class="text-xl font-bold text-white">Butuh Informasi Lebih Lanjut?</h3>
			<p class="text-sm text-slate-300 max-w-md leading-relaxed">
				Tim Mix-D siap membantu Anda memilih model dan ukuran sepatu yang paling tepat.
			</p>
			<div class="text-xs text-slate-400 space-y-1">
				<div>📍 <strong>Alamat:</strong> <?= html_escape(isset($store_settings['store_address']) ? $store_settings['store_address'] : 'Jakarta, Indonesia') ?></div>
				<div>✉️ <strong>Email:</strong> <?= html_escape(isset($store_settings['store_email']) ? $store_settings['store_email'] : '-') ?></div>
			</div>
		</div>

		<?php if (!empty($store_settings['whatsapp_number'])): ?>
			<a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $store_settings['whatsapp_number']) ?>" 
			   target="_blank" 
			   class="px-8 py-4 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm rounded-2xl shadow-lg transition flex items-center gap-3 flex-shrink-0">
				<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
					<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
				</svg>
				Hubungi Kami di WhatsApp
			</a>
		<?php endif; ?>
	</div>

</div>
