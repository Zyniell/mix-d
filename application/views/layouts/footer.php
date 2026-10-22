<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	</main>

	<!-- Footer -->
	<footer class="bg-stone-950 text-stone-400 mt-24 border-t border-stone-800/80 relative overflow-hidden">
		<!-- Subtle Noise Background Texture -->
		<div class="absolute inset-0 bg-noise pointer-events-none opacity-40"></div>

		<!-- Reassurance Ribbon -->
		<div class="border-b border-stone-800/60 bg-stone-900/40 relative z-10">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
				<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center sm:text-left">
					<div class="flex items-center justify-center sm:justify-start gap-3.5">
						<div class="w-10 h-10 rounded-xl bg-brand-950/60 border border-brand-800/40 text-brand-400 flex items-center justify-center text-lg flex-shrink-0">
							<svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
							</svg>
						</div>
						<div>
							<h4 class="text-stone-200 text-xs font-bold uppercase tracking-wider">Kualitas Teruji</h4>
							<p class="text-[11px] text-stone-400 mt-0.5">Bahan kulit sintetis pilihan dengan insole memory foam anti-pegal.</p>
						</div>
					</div>

					<div class="flex items-center justify-center sm:justify-start gap-3.5">
						<div class="w-10 h-10 rounded-xl bg-brand-950/60 border border-brand-800/40 text-brand-400 flex items-center justify-center text-lg flex-shrink-0">
							<svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
							</svg>
						</div>
						<div>
							<h4 class="text-stone-200 text-xs font-bold uppercase tracking-wider">Konsultasi Fitting</h4>
							<p class="text-[11px] text-stone-400 mt-0.5">Bantuan penentuan nomor ukuran sepatu sebelum paket dikirim.</p>
						</div>
					</div>

					<div class="flex items-center justify-center sm:justify-start gap-3.5">
						<div class="w-10 h-10 rounded-xl bg-brand-950/60 border border-brand-800/40 text-brand-400 flex items-center justify-center text-lg flex-shrink-0">
							<svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
							</svg>
						</div>
						<div>
							<h4 class="text-stone-200 text-xs font-bold uppercase tracking-wider">Pesan via WhatsApp</h4>
							<p class="text-[11px] text-stone-400 mt-0.5">Proses cepat tanpa repot membuat akun. Langsung terhubung ke CS.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Footer Content -->
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
			<div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-12">
				
				<!-- Brand & Story (4 cols) -->
				<div class="space-y-4 md:col-span-4">
					<div class="flex items-center gap-3.5">
						<div class="w-10 h-10 bg-brand-700 text-white rounded-xl flex items-center justify-center font-serif font-black text-xl shadow-md border border-brand-600/30">
							MD
						</div>
						<div>
							<div class="flex items-center gap-1.5">
								<span class="font-serif font-extrabold text-xl tracking-tight text-white">MIX-D</span>
								<span class="w-1.5 h-1.5 rounded-full bg-brand-500 inline-block"></span>
							</div>
							<span class="block text-[10px] font-semibold tracking-[0.2em] text-brand-400 uppercase">Men's Footwear</span>
						</div>
					</div>
					<p class="text-sm leading-relaxed text-stone-400 max-w-sm">
						<?= html_escape(isset($store_settings['store_tagline']) ? $store_settings['store_tagline'] : 'Spesialis Sepatu Pria Berkualitas & Berkarakter.') ?>
					</p>
					<p class="text-xs text-stone-500 leading-relaxed max-w-sm">
						Dirancang untuk menemani mobilitas harian pria modern: dari langkah percaya diri di ruang meeting hingga gaya santai akhir pekan.
					</p>
				</div>

				<!-- Quick Links (2 cols) -->
				<div class="md:col-span-2">
					<h4 class="text-stone-200 text-xs font-bold uppercase tracking-[0.18em] mb-4">Navigasi</h4>
					<ul class="space-y-2.5 text-xs text-stone-400 font-medium">
						<li><a href="<?= base_url() ?>" class="hover:text-brand-400 transition">Beranda</a></li>
						<li><a href="<?= base_url('produk') ?>" class="hover:text-brand-400 transition">Katalog Sepatu</a></li>
						<li><a href="<?= base_url('tentang-kami') ?>" class="hover:text-brand-400 transition">Tentang Mix-D</a></li>
						<li><a href="<?= base_url('keranjang') ?>" class="hover:text-brand-400 transition">Keranjang Belanja</a></li>
					</ul>
				</div>

				<!-- Kategori Sepatu (3 cols) -->
				<div class="md:col-span-3">
					<h4 class="text-stone-200 text-xs font-bold uppercase tracking-[0.18em] mb-4">Koleksi Pria</h4>
					<ul class="space-y-2.5 text-xs text-stone-400 font-medium">
						<li><a href="<?= base_url('produk?kategori=sneakers') ?>" class="hover:text-brand-400 transition flex items-center justify-between"><span>Sneakers Kasual</span><span class="text-stone-600 text-[10px]">Paling Dicari</span></a></li>
						<li><a href="<?= base_url('produk?kategori=formal-oxford') ?>" class="hover:text-brand-400 transition flex items-center justify-between"><span>Formal & Oxford</span><span class="text-stone-600 text-[10px]">Elegan</span></a></li>
						<li><a href="<?= base_url('produk?kategori=boots-pria') ?>" class="hover:text-brand-400 transition flex items-center justify-between"><span>Boots Maskulin</span><span class="text-stone-600 text-[10px]">Tangguh</span></a></li>
						<li><a href="<?= base_url('produk?kategori=loafers-slip-on') ?>" class="hover:text-brand-400 transition flex items-center justify-between"><span>Loafers & Slip-on</span><span class="text-stone-600 text-[10px]">Praktis</span></a></li>
						<li><a href="<?= base_url('produk?kategori=sandal-pria') ?>" class="hover:text-brand-400 transition flex items-center justify-between"><span>Sandal Pria</span><span class="text-stone-600 text-[10px]">Santai</span></a></li>
					</ul>
				</div>

				<!-- Kontak & Layanan (3 cols) -->
				<div class="md:col-span-3">
					<h4 class="text-stone-200 text-xs font-bold uppercase tracking-[0.18em] mb-4">Kontak & Pemesanan</h4>
					<p class="text-xs text-stone-400 leading-relaxed mb-4">
						<?= nl2br(html_escape(isset($store_settings['store_address']) ? $store_settings['store_address'] : 'Jakarta, Indonesia')) ?>
					</p>
					<?php if (!empty($store_settings['whatsapp_number'])): ?>
						<a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $store_settings['whatsapp_number']) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2.5 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white rounded-xl text-xs font-bold transition shadow-sm active:scale-[0.98]">
							<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
								<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
							</svg>
							<span>Pesan Cepat via WhatsApp</span>
						</a>
					<?php endif; ?>
				</div>

			</div>

			<!-- Bottom Copyright & Strategic Legal Links -->
			<div class="mt-14 pt-8 border-t border-stone-800/80 flex flex-col sm:flex-row items-center justify-between text-xs text-stone-500 gap-4">
				<p>© <?= date('Y') ?> <?= html_escape(isset($store_settings['store_name']) ? $store_settings['store_name'] : 'Mix-D Men\'s Footwear') ?>. Seluruh hak cipta dilindungi undang-undang.</p>
				<div class="flex items-center gap-5 text-stone-400 text-[11px]">
					<a href="<?= base_url('tentang-kami') ?>" class="hover:text-stone-300 transition">Panduan Ukuran</a>
					<span>•</span>
					<a href="<?= base_url('tentang-kami') ?>" class="hover:text-stone-300 transition">Kebijakan Garansi</a>
					<span>•</span>
					<a href="<?= base_url('admin/login') ?>" class="hover:text-brand-400 transition font-medium">Portal Admin</a>
				</div>
			</div>
		</div>
	</footer>

	<!-- Floating WhatsApp Help Button -->
	<?php if (!empty($store_settings['whatsapp_number'])): ?>
		<a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $store_settings['whatsapp_number']) ?>?text=Halo%20Mix-D,%20saya%20ingin%20tanya%20seputar%20sepatu%20pria" 
		   target="_blank" 
		   rel="noopener noreferrer"
		   class="fixed bottom-6 right-6 z-50 flex items-center gap-2.5 bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-3 rounded-full shadow-2xl hover:shadow-emerald-900/40 transition-all duration-300 transform hover:-translate-y-1 active:scale-95 group border border-emerald-400/30">
			<span class="relative flex h-3 w-3">
				<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-200 opacity-75"></span>
				<span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
			</span>
			<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
				<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
			</svg>
			<span class="font-semibold text-xs tracking-wide hidden sm:inline">Tanya Kami di WhatsApp</span>
		</a>
	<?php endif; ?>

	<!-- JavaScript for Mobile Menu Toggle -->
	<script>
		document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
			const menu = document.getElementById('mobileMenu');
			if (menu) {
				menu.classList.toggle('hidden');
			}
		});
	</script>
</body>
</html>

