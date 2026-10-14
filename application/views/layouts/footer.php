<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	</main>

	<!-- Footer -->
	<footer class="bg-dark-950 text-slate-400 mt-20 border-t border-slate-800">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
			<div class="grid grid-cols-1 md:grid-cols-4 gap-10">
				
				<!-- Brand & About -->
				<div class="space-y-4 md:col-span-1">
					<div class="flex items-center gap-3">
						<div class="w-10 h-10 bg-amber-600 text-white rounded-xl flex items-center justify-center font-extrabold text-xl shadow-md">
							MD
						</div>
						<div>
							<span class="block font-extrabold text-xl tracking-tight text-white">MIX-D</span>
							<span class="block text-[10px] font-semibold tracking-widest text-amber-500 uppercase">Men's Footwear</span>
						</div>
					</div>
					<p class="text-sm leading-relaxed text-slate-400">
						<?= html_escape(isset($store_settings['store_tagline']) ? $store_settings['store_tagline'] : 'Spesialis Sepatu Pria Berkualitas & Berkarakter.') ?>
					</p>
					<div class="pt-2 text-xs text-slate-500">
						Dirancang khusus untuk gaya, kenyamanan, dan rasa percaya diri pria modern.
					</div>
				</div>

				<!-- Quick Links -->
				<div>
					<h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Navigasi Cepat</h4>
					<ul class="space-y-2.5 text-sm">
						<li><a href="<?= base_url() ?>" class="hover:text-amber-400 transition">Beranda</a></li>
						<li><a href="<?= base_url('produk') ?>" class="hover:text-amber-400 transition">Katalog Sepatu</a></li>
						<li><a href="<?= base_url('tentang-kami') ?>" class="hover:text-amber-400 transition">Tentang Kami</a></li>
						<li><a href="<?= base_url('keranjang') ?>" class="hover:text-amber-400 transition">Keranjang Belanja</a></li>
					</ul>
				</div>

				<!-- Kategori Sepatu -->
				<div>
					<h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Koleksi Pria</h4>
					<ul class="space-y-2.5 text-sm">
						<li><a href="<?= base_url('produk?kategori=sneakers') ?>" class="hover:text-amber-400 transition">Sneakers Pria</a></li>
						<li><a href="<?= base_url('produk?kategori=formal-oxford') ?>" class="hover:text-amber-400 transition">Formal & Oxford</a></li>
						<li><a href="<?= base_url('produk?kategori=boots-pria') ?>" class="hover:text-amber-400 transition">Boots Maskulin</a></li>
						<li><a href="<?= base_url('produk?kategori=loafers-slip-on') ?>" class="hover:text-amber-400 transition">Loafers & Slip-on</a></li>
						<li><a href="<?= base_url('produk?kategori=sandal-pria') ?>" class="hover:text-amber-400 transition">Sandal Santai</a></li>
					</ul>
				</div>

				<!-- Kontak & Layanan -->
				<div>
					<h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Kontak & Pemesanan</h4>
					<p class="text-sm text-slate-400 leading-relaxed mb-3">
						<?= nl2br(html_escape(isset($store_settings['store_address']) ? $store_settings['store_address'] : 'Jakarta, Indonesia')) ?>
					</p>
					<?php if (!empty($store_settings['whatsapp_number'])): ?>
						<div class="mt-4">
							<a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $store_settings['whatsapp_number']) ?>" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition shadow-sm">
								<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
									<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
								</svg>
								Order via WhatsApp
							</a>
						</div>
					<?php endif; ?>
				</div>

			</div>

			<!-- Bottom Copyright -->
			<div class="mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400 gap-4">
				<p>© <?= date('Y') ?> <?= html_escape(isset($store_settings['store_name']) ? $store_settings['store_name'] : 'Mix-D Men\'s Footwear') ?>. All rights reserved.</p>
				<p class="text-slate-400 hover:text-slate-200 transition"><a href="<?= base_url('admin/login') ?>">Admin Login</a></p>
			</div>
		</div>
	</footer>

	<!-- Floating WhatsApp Help Button -->
	<?php if (!empty($store_settings['whatsapp_number'])): ?>
		<a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $store_settings['whatsapp_number']) ?>?text=Halo%20Mix-D,%20saya%20ingin%20tanya%20seputar%20sepatu%20pria" 
		   target="_blank" 
		   class="fixed bottom-6 right-6 z-50 flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
			<svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
				<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
			</svg>
			<span class="font-semibold text-sm hidden sm:inline">Tanya Kami di WA</span>
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
