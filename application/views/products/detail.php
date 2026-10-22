<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Breadcrumbs -->
<div class="bg-stone-100/70 py-4 border-b border-stone-200/80">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<nav class="text-[11px] text-stone-500 flex items-center gap-2 flex-wrap">
			<a href="<?= base_url() ?>" class="hover:text-stone-900 transition">Beranda</a>
			<span>/</span>
			<a href="<?= base_url('produk') ?>" class="hover:text-stone-900 transition">Katalog Sepatu</a>
			<?php if (!empty($product['category_name'])): ?>
				<span>/</span>
				<a href="<?= base_url('produk?kategori=' . $product['category_slug']) ?>" class="hover:text-stone-900 transition">
					<?= html_escape($product['category_name']) ?>
				</a>
			<?php endif; ?>
			<span>/</span>
			<span class="text-stone-900 font-semibold truncate max-w-xs"><?= html_escape($product['name']) ?></span>
		</nav>
	</div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
	<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14">
		
		<!-- Left: High-Resolution Product Image Gallery Viewport (6 cols) -->
		<div class="lg:col-span-6">
			<div class="bg-white rounded-3xl border border-stone-200/80 overflow-hidden shadow-card sticky top-28">
				<div class="relative h-96 sm:h-[500px] bg-stone-100 flex items-center justify-center overflow-hidden group">
					<?php 
					$imagePath = 'uploads/products/' . $product['image'];
					if (!empty($product['image']) && file_exists(FCPATH . $imagePath)): 
					?>
						<img id="mainProductImage" src="<?= base_url($imagePath) ?>" alt="<?= html_escape($product['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-700 ease-out cursor-zoom-in">
					<?php else: ?>
						<div class="flex flex-col items-center justify-center text-stone-400 p-8 text-center">
							<svg class="w-16 h-16 text-stone-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
							</svg>
							<span class="text-xs font-bold uppercase tracking-widest text-stone-400">Mix-D Men's Collection</span>
						</div>
					<?php endif; ?>

					<!-- Category Pill -->
					<?php if (!empty($product['category_name'])): ?>
						<span class="absolute top-4 left-4 bg-stone-950/85 backdrop-blur-md text-stone-200 text-xs font-bold tracking-wider px-3 py-1.5 rounded-lg border border-stone-800">
							<?= html_escape($product['category_name']) ?>
						</span>
					<?php endif; ?>

					<!-- Views Counter Badge -->
					<span class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-stone-700 text-xs font-semibold px-3 py-1 rounded-lg shadow-sm flex items-center gap-1.5 font-tabular border border-stone-200/60">
						<svg class="w-3.5 h-3.5 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
						</svg>
						<span class="font-bold"><?= (int)$product['views'] ?></span> kali dilihat
					</span>
				</div>
			</div>
		</div>

		<!-- Right: Product Information & Purchase Form (6 cols) -->
		<div class="lg:col-span-6 space-y-7">
			
			<div>
				<span class="text-[11px] font-bold text-brand-700 uppercase tracking-[0.2em] block mb-1">Authentic Men's Footwear</span>
				<h1 class="text-2xl sm:text-3xl lg:text-4xl font-serif font-bold text-stone-950 tracking-tight leading-tight">
					<?= html_escape($product['name']) ?>
				</h1>
				
				<!-- Price & Discount -->
				<div class="mt-4 flex items-baseline gap-4">
					<span class="text-3xl sm:text-4xl font-serif font-bold text-brand-700 font-tabular">
						Rp <?= number_format($product['price'], 0, ',', '.') ?>
					</span>
					<?php if (!empty($product['original_price']) && $product['original_price'] > $product['price']): ?>
						<span class="text-base text-stone-400 line-through font-tabular">
							Rp <?= number_format($product['original_price'], 0, ',', '.') ?>
						</span>
						<?php 
						$discount = round((($product['original_price'] - $product['price']) / $product['original_price']) * 100);
						?>
						<span class="px-2.5 py-0.5 rounded-md bg-rose-50 border border-rose-200 text-rose-700 text-xs font-bold font-tabular">
							Hemat <?= $discount ?>%
						</span>
					<?php endif; ?>
				</div>

				<!-- Stock Info -->
				<div class="mt-3.5 flex items-center gap-2 text-xs">
					<?php if ($product['stock'] > 0): ?>
						<span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
						<span class="font-semibold text-emerald-800">Stok Siap Kirim (Tersedia <?= (int)$product['stock'] ?> pasang)</span>
					<?php else: ?>
						<span class="w-2 h-2 rounded-full bg-rose-500"></span>
						<span class="font-semibold text-rose-700">Stok Sedang Habis</span>
					<?php endif; ?>
				</div>
			</div>

			<hr class="border-stone-200/80">

			<!-- Inline Error Message for Size Selection (No window.alert) -->
			<div id="sizeAlertBanner" class="hidden p-3.5 rounded-xl bg-amber-50 border border-amber-300 text-amber-900 text-xs font-semibold flex items-center gap-2">
				<svg class="w-4 h-4 text-amber-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
					<path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
				</svg>
				<span>Mohon tentukan pilihan nomor ukuran sepatu Anda terlebih dahulu.</span>
			</div>

			<!-- Add to Cart Form -->
			<form id="addToCartForm" method="POST" action="<?= base_url('cart/add') ?>" class="space-y-6">
				<!-- CSRF Token -->
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
				<input type="hidden" name="product_id" value="<?= (int)$product['id'] ?>">

				<!-- Size Selection Header with Interactive Guide Modal Trigger -->
				<div>
					<div class="flex items-center justify-between mb-3">
						<label class="block text-xs font-bold text-stone-900 uppercase tracking-wider">
							Pilih Ukuran Sepatu (Pria):
						</label>
						<button type="button" id="btnOpenSizeGuide" class="text-xs text-brand-700 hover:text-brand-900 font-semibold underline underline-offset-4 flex items-center gap-1 transition">
							<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
							<span>Panduan Ukuran (Size Chart)</span>
						</button>
					</div>

					<?php if (!empty($sizes)): ?>
						<div class="grid grid-cols-4 sm:grid-cols-6 gap-2.5" id="sizeSelectorContainer">
							<?php foreach ($sizes as $sz): ?>
								<label class="cursor-pointer">
									<input type="radio" name="size" value="<?= html_escape($sz) ?>" class="sr-only peer" required>
									<div class="py-3 text-center border-2 border-stone-200 rounded-xl font-bold text-sm text-stone-700 transition duration-200 peer-checked:border-brand-600 peer-checked:bg-brand-50/80 peer-checked:text-brand-900 hover:border-stone-300 font-tabular active:scale-95">
										<?= html_escape($sz) ?>
									</div>
								</label>
							<?php endforeach; ?>
						</div>
					<?php else: ?>
						<div class="p-3 bg-brand-50 rounded-xl text-brand-900 text-xs font-medium">
							Ukuran all-size atau hubungi admin via WhatsApp untuk konfirmasi ukuran.
							<input type="hidden" name="size" value="All Size">
						</div>
					<?php endif; ?>
				</div>

				<!-- Quantity Stepper -->
				<div>
					<label class="block text-xs font-bold text-stone-900 uppercase tracking-wider mb-2">Jumlah Pasang:</label>
					<div class="flex items-center gap-3 w-40">
						<button type="button" id="qtyMinus" class="w-10 h-10 rounded-xl border border-stone-300 bg-white hover:bg-stone-100 font-bold text-stone-700 flex items-center justify-center transition active:scale-95 shadow-sm">
							-
						</button>
						<input type="number" id="qtyInput" name="qty" value="1" min="1" max="<?= max(1, (int)$product['stock']) ?>" class="w-16 py-2 text-center rounded-xl border border-stone-300 font-bold text-sm text-stone-900 focus:outline-none focus:ring-2 focus:ring-brand-500 font-tabular">
						<button type="button" id="qtyPlus" class="w-10 h-10 rounded-xl border border-stone-300 bg-white hover:bg-stone-100 font-bold text-stone-700 flex items-center justify-center transition active:scale-95 shadow-sm">
							+
						</button>
					</div>
				</div>

				<!-- Dual Action Buttons -->
				<div class="pt-2 flex flex-col sm:flex-row gap-3.5">
					<button type="submit" 
					        <?= ($product['stock'] <= 0) ? 'disabled' : '' ?>
					        class="flex-1 py-4 px-6 rounded-2xl bg-brand-600 hover:bg-brand-500 disabled:bg-stone-300 disabled:cursor-not-allowed text-white font-bold text-sm transition-all duration-200 shadow-leather flex items-center justify-center gap-2 active:scale-[0.98] border border-brand-500/40">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
						</svg>
						<span>Tambah ke Keranjang</span>
					</button>

					<?php if (!empty($store_settings['whatsapp_number'])): ?>
						<button type="button" 
						        id="btnDirectWa"
						        class="py-4 px-6 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm transition-all duration-200 flex items-center justify-center gap-2 shadow-sm active:scale-[0.98] border border-emerald-500/40">
							<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
								<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
							</svg>
							<span>Beli Cepat via WA</span>
						</button>
					<?php endif; ?>
				</div>
			</form>

			<hr class="border-stone-200/80">

			<!-- Deskripsi Produk -->
			<div class="space-y-3">
				<h3 class="text-xs font-bold text-stone-900 uppercase tracking-wider">Deskripsi & Spesifikasi Produk:</h3>
				<div class="text-xs sm:text-sm text-stone-600 leading-relaxed whitespace-pre-line bg-white p-5 rounded-2xl border border-stone-200/80 shadow-sm">
					<?= nl2br(html_escape($product['description'])) ?>
				</div>
			</div>

			<!-- Reassurance Card (Clean SVGs) -->
			<div class="p-5 rounded-2xl bg-brand-50/70 border border-brand-200/80 text-xs text-brand-950 space-y-2.5">
				<div class="font-bold flex items-center gap-2 text-brand-900">
					<svg class="w-4 h-4 text-brand-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
					</svg>
					<span>Jaminan Kepuasan Belanja di Mix-D:</span>
				</div>
				<ul class="space-y-1.5 text-brand-900 pl-6 list-disc">
					<li>100% Produk baru dengan inspeksi jahitan dan sol sebelum dikemas</li>
					<li>Bisa konsultasi ukuran dengan mengirim panjang telapak kaki ke CS WhatsApp</li>
					<li>Pengemasan aman menggunakan inner wrap dan box sepatu tebal</li>
				</ul>
			</div>

		</div>

	</div>

	<!-- Rekomendasi Produk Terkait -->
	<?php if (!empty($related_products)): ?>
		<div class="mt-20 pt-12 border-t border-stone-200/80">
			<div class="mb-8 flex items-center justify-between">
				<div>
					<span class="text-[11px] font-bold text-brand-700 uppercase tracking-[0.2em] block mb-1">Rekomendasi Serupa</span>
					<h2 class="text-2xl font-serif font-bold text-stone-950 tracking-tight">Koleksi Sepatu Pria Lainnya</h2>
				</div>
			</div>

			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
				<?php foreach ($related_products as $rel): ?>
					<div class="bg-white rounded-2xl border border-stone-200/80 hover:border-brand-300 hover:shadow-warm transition-all duration-300 overflow-hidden flex flex-col group hover:-translate-y-1">
						<a href="<?= base_url('produk/' . $rel['slug']) ?>" class="block relative h-52 bg-stone-100 overflow-hidden">
							<?php 
							$relImg = 'uploads/products/' . $rel['image'];
							if (!empty($rel['image']) && file_exists(FCPATH . $relImg)): 
							?>
								<img src="<?= base_url($relImg) ?>" alt="<?= html_escape($rel['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
							<?php else: ?>
								<div class="w-full h-full flex flex-col items-center justify-center bg-stone-100 text-stone-400">
									<svg class="w-8 h-8 text-stone-300 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
									</svg>
									<span class="text-[10px] font-semibold tracking-wider text-stone-400 uppercase">Mix-D</span>
								</div>
							<?php endif; ?>
						</a>
						<div class="p-4 flex-1 flex flex-col justify-between">
							<h3 class="font-bold text-sm text-stone-900 group-hover:text-brand-700 transition line-clamp-1">
								<a href="<?= base_url('produk/' . $rel['slug']) ?>">
									<?= html_escape($rel['name']) ?>
								</a>
							</h3>
							<div class="mt-3 flex items-center justify-between">
								<span class="text-sm font-serif font-bold text-brand-700 font-tabular">
									Rp <?= number_format($rel['price'], 0, ',', '.') ?>
								</span>
								<a href="<?= base_url('produk/' . $rel['slug']) ?>" class="text-xs font-bold text-stone-900 hover:text-brand-600 transition">
									Detail →
								</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>

</div>

<!-- Interactive Size Guide Modal -->
<div id="sizeGuideModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-stone-950/70 backdrop-blur-sm">
	<div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 border border-stone-200 shadow-2xl space-y-5 animate-in fade-in zoom-in duration-200">
		<div class="flex items-center justify-between border-b border-stone-100 pb-4">
			<div>
				<h3 class="font-serif font-bold text-lg text-stone-950">Panduan Ukuran Sepatu Pria Mix-D</h3>
				<p class="text-xs text-stone-500 mt-0.5">Standar ukuran EU / Indonesia (Panjang Telapak Kaki)</p>
			</div>
			<button type="button" id="btnCloseSizeGuide" class="text-stone-400 hover:text-stone-700 p-1 text-xl leading-none">✕</button>
		</div>

		<div class="overflow-x-auto">
			<table class="w-full text-left text-xs">
				<thead class="bg-stone-50 text-stone-600 font-bold border-b border-stone-200">
					<tr>
						<th class="py-2.5 px-3">Ukuran (EU)</th>
						<th class="py-2.5 px-3">Panjang Kaki (cm)</th>
						<th class="py-2.5 px-3">Saran Pemakaian</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-stone-100 font-tabular">
					<tr><td class="py-2.5 px-3 font-bold text-stone-900">39</td><td class="py-2.5 px-3">24.5 cm</td><td class="py-2.5 px-3 text-stone-500">Pas untuk telapak 24.0 - 24.5 cm</td></tr>
					<tr><td class="py-2.5 px-3 font-bold text-stone-900">40</td><td class="py-2.5 px-3">25.0 cm</td><td class="py-2.5 px-3 text-stone-500">Pas untuk telapak 24.6 - 25.0 cm</td></tr>
					<tr><td class="py-2.5 px-3 font-bold text-stone-900">41</td><td class="py-2.5 px-3">26.0 cm</td><td class="py-2.5 px-3 text-stone-500">Pas untuk telapak 25.1 - 26.0 cm</td></tr>
					<tr><td class="py-2.5 px-3 font-bold text-stone-900">42</td><td class="py-2.5 px-3">26.5 cm</td><td class="py-2.5 px-3 text-stone-500">Pas untuk telapak 26.1 - 26.5 cm</td></tr>
					<tr><td class="py-2.5 px-3 font-bold text-stone-900">43</td><td class="py-2.5 px-3">27.5 cm</td><td class="py-2.5 px-3 text-stone-500">Pas untuk telapak 26.6 - 27.5 cm</td></tr>
					<tr><td class="py-2.5 px-3 font-bold text-stone-900">44</td><td class="py-2.5 px-3">28.0 cm</td><td class="py-2.5 px-3 text-stone-500">Pas untuk telapak 27.6 - 28.0 cm</td></tr>
					<tr><td class="py-2.5 px-3 font-bold text-stone-900">45</td><td class="py-2.5 px-3">29.0 cm</td><td class="py-2.5 px-3 text-stone-500">Pas untuk telapak 28.1 - 29.0 cm</td></tr>
				</tbody>
			</table>
		</div>

		<div class="text-[11px] text-stone-500 bg-stone-50 p-3.5 rounded-xl border border-stone-200/80 leading-relaxed">
			💡 <em>Tips:</em> Jika kaki Anda bertipe melebar atau memiliki punggung kaki tebal, disarankan untuk memilih 1 ukuran lebih besar (up-size) demi kenyamanan maksimal.
		</div>

		<div class="text-right pt-2">
			<button type="button" onclick="document.getElementById('sizeGuideModal').classList.add('hidden')" class="px-5 py-2 rounded-xl bg-stone-900 hover:bg-brand-600 text-white text-xs font-bold transition">
				Tutup Panduan
			</button>
		</div>
	</div>
</div>

<!-- Interactive JS for Size Picker, Quantity, and Direct WA Checkout -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const qtyInput = document.getElementById('qtyInput');
		const qtyMinus = document.getElementById('qtyMinus');
		const qtyPlus  = document.getElementById('qtyPlus');
		const maxStock = parseInt(qtyInput ? qtyInput.getAttribute('max') : 999) || 999;
		const alertBanner = document.getElementById('sizeAlertBanner');

		if (qtyMinus && qtyPlus && qtyInput) {
			qtyMinus.addEventListener('click', function() {
				let val = parseInt(qtyInput.value) || 1;
				if (val > 1) {
					qtyInput.value = val - 1;
				}
			});

			qtyPlus.addEventListener('click', function() {
				let val = parseInt(qtyInput.value) || 1;
				if (val < maxStock) {
					qtyInput.value = val + 1;
				}
			});
		}

		// Size radio changes hide alert
		document.querySelectorAll('input[name="size"]').forEach(function(radio) {
			radio.addEventListener('change', function() {
				if (alertBanner) alertBanner.classList.add('hidden');
			});
		});

		// Size Guide Modal Open/Close
		const btnOpenSizeGuide = document.getElementById('btnOpenSizeGuide');
		const btnCloseSizeGuide = document.getElementById('btnCloseSizeGuide');
		const sizeGuideModal = document.getElementById('sizeGuideModal');

		if (btnOpenSizeGuide && sizeGuideModal) {
			btnOpenSizeGuide.addEventListener('click', function() {
				sizeGuideModal.classList.remove('hidden');
			});
		}
		if (btnCloseSizeGuide && sizeGuideModal) {
			btnCloseSizeGuide.addEventListener('click', function() {
				sizeGuideModal.classList.add('hidden');
			});
		}

		// Direct WhatsApp Order (Without window.alert!)
		const btnDirectWa = document.getElementById('btnDirectWa');
		if (btnDirectWa) {
			btnDirectWa.addEventListener('click', function() {
				const selectedSizeInput = document.querySelector('input[name="size"]:checked');
				if (!selectedSizeInput) {
					if (alertBanner) {
						alertBanner.classList.remove('hidden');
						alertBanner.scrollIntoView({ behavior: 'smooth', block: 'center' });
					}
					return;
				}

				const size = selectedSizeInput.value;
				const qty = qtyInput ? qtyInput.value : 1;
				const productName = <?= json_encode($product['name']) ?>;
				const price = "Rp " + new Intl.NumberFormat('id-ID').format(<?= (float)$product['price'] ?>);
				const waNumber = <?= json_encode(preg_replace('/[^0-9]/', '', isset($store_settings['whatsapp_number']) ? $store_settings['whatsapp_number'] : '')) ?>;

				const text = "Halo Mix-D, saya ingin memesan langsung sepatu:\n\n" +
				             "• Model: *" + productName + "*\n" +
				             "• Ukuran: *" + size + "*\n" +
				             "• Jumlah: " + qty + " pasang\n" +
				             "• Harga: " + price + "\n\n" +
				             "Mohon konfirmasi ketersediaan stok & ongkir ke alamat saya. Terima kasih!";

				const waUrl = "https://api.whatsapp.com/send?phone=" + waNumber + "&text=" + encodeURIComponent(text);
				window.open(waUrl, '_blank');
			});
		}
	});
</script>

