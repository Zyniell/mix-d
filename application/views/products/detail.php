<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="bg-slate-100 py-4 border-b border-slate-200">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<nav class="text-xs text-slate-500 flex items-center gap-2 flex-wrap">
			<a href="<?= base_url() ?>" class="hover:text-dark-900">Beranda</a>
			<span>/</span>
			<a href="<?= base_url('produk') ?>" class="hover:text-dark-900">Katalog Sepatu</a>
			<?php if (!empty($product['category_name'])): ?>
				<span>/</span>
				<a href="<?= base_url('produk?kategori=' . $product['category_slug']) ?>" class="hover:text-dark-900">
					<?= html_escape($product['category_name']) ?>
				</a>
			<?php endif; ?>
			<span>/</span>
			<span class="text-dark-900 font-semibold truncate max-w-xs"><?= html_escape($product['name']) ?></span>
		</nav>
	</div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
	<div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
		
		<!-- Left: Product Image -->
		<div class="lg:col-span-6">
			<div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm sticky top-28">
				<div class="relative h-96 sm:h-[480px] bg-slate-50 flex items-center justify-center overflow-hidden">
					<?php 
					$imagePath = 'uploads/products/' . $product['image'];
					if (!empty($product['image']) && file_exists(FCPATH . $imagePath)): 
					?>
						<img src="<?= base_url($imagePath) ?>" alt="<?= html_escape($product['name']) ?>" class="w-full h-full object-cover">
					<?php else: ?>
						<div class="flex flex-col items-center justify-center text-slate-300 p-8 text-center">
							<span class="text-8xl mb-3">👞</span>
							<span class="text-sm font-bold uppercase tracking-widest text-slate-400">Mix-D Men's Collection</span>
							<span class="text-xs text-slate-400 mt-1">Spesialis Sepatu Pria</span>
						</div>
					<?php endif; ?>

					<!-- Category Pill -->
					<?php if (!empty($product['category_name'])): ?>
						<span class="absolute top-4 left-4 bg-dark-950/80 backdrop-blur-md text-white text-xs font-bold px-3 py-1.5 rounded-xl">
							<?= html_escape($product['category_name']) ?>
						</span>
					<?php endif; ?>

					<!-- Views Counter Badge -->
					<span class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-slate-700 text-xs font-semibold px-3 py-1 rounded-xl shadow-sm flex items-center gap-1.5">
						👁 <span class="font-bold"><?= (int)$product['views'] ?></span> kali dilihat
					</span>
				</div>
			</div>
		</div>

		<!-- Right: Product Information & Purchase Form -->
		<div class="lg:col-span-6 space-y-6">
			
			<div>
				<h1 class="text-2xl sm:text-3xl font-extrabold text-dark-900 tracking-tight leading-tight">
					<?= html_escape($product['name']) ?>
				</h1>
				
				<!-- Price & Discount -->
				<div class="mt-4 flex items-baseline gap-4">
					<span class="text-3xl font-extrabold text-amber-600">
						Rp <?= number_format($product['price'], 0, ',', '.') ?>
					</span>
					<?php if (!empty($product['original_price']) && $product['original_price'] > $product['price']): ?>
						<span class="text-lg text-slate-400 line-through">
							Rp <?= number_format($product['original_price'], 0, ',', '.') ?>
						</span>
						<?php 
						$discount = round((($product['original_price'] - $product['price']) / $product['original_price']) * 100);
						?>
						<span class="px-2.5 py-0.5 rounded-lg bg-rose-100 text-rose-700 text-xs font-bold">
							Hemat <?= $discount ?>%
						</span>
					<?php endif; ?>
				</div>

				<!-- Stock Info -->
				<div class="mt-3 flex items-center gap-2 text-xs">
					<?php if ($product['stock'] > 0): ?>
						<span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
						<span class="font-semibold text-emerald-700">Stok Tersedia (<?= (int)$product['stock'] ?> pasang)</span>
					<?php else: ?>
						<span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
						<span class="font-semibold text-rose-700">Stok Habis</span>
					<?php endif; ?>
				</div>
			</div>

			<hr class="border-slate-200">

			<!-- Add to Cart Form -->
			<form id="addToCartForm" method="POST" action="<?= base_url('cart/add') ?>" class="space-y-6">
				<!-- CSRF Token -->
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
				<input type="hidden" name="product_id" value="<?= (int)$product['id'] ?>">

				<!-- Size Selection -->
				<div>
					<div class="flex items-center justify-between mb-2">
						<label class="block text-sm font-bold text-dark-900">
							Pilih Ukuran Sepatu (Pria):
						</label>
						<span class="text-xs text-slate-500">Standar EU/Indonesia</span>
					</div>

					<?php if (!empty($sizes)): ?>
						<div class="grid grid-cols-4 sm:grid-cols-6 gap-2.5" id="sizeSelectorContainer">
							<?php foreach ($sizes as $sz): ?>
								<label class="cursor-pointer">
									<input type="radio" name="size" value="<?= html_escape($sz) ?>" class="sr-only peer" required>
									<div class="py-3 text-center border-2 border-slate-200 rounded-xl font-bold text-sm text-slate-700 transition peer-checked:border-amber-600 peer-checked:bg-amber-50 peer-checked:text-amber-800 hover:border-slate-300">
										<?= html_escape($sz) ?>
									</div>
								</label>
							<?php endforeach; ?>
						</div>
					<?php else: ?>
						<div class="p-3 bg-amber-50 rounded-xl text-amber-800 text-xs font-medium">
							Ukuran all-size atau hubungi admin via WhatsApp untuk konfirmasi ukuran.
							<input type="hidden" name="size" value="All Size">
						</div>
					<?php endif; ?>
				</div>

				<!-- Quantity -->
				<div>
					<label class="block text-sm font-bold text-dark-900 mb-2">Jumlah Pasang:</label>
					<div class="flex items-center gap-3 w-40">
						<button type="button" id="qtyMinus" class="w-10 h-10 rounded-xl border border-slate-300 bg-white hover:bg-slate-100 font-bold text-slate-700 flex items-center justify-center transition">
							-
						</button>
						<input type="number" id="qtyInput" name="qty" value="1" min="1" max="<?= max(1, (int)$product['stock']) ?>" class="w-16 py-2 text-center rounded-xl border border-slate-300 font-bold text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
						<button type="button" id="qtyPlus" class="w-10 h-10 rounded-xl border border-slate-300 bg-white hover:bg-slate-100 font-bold text-slate-700 flex items-center justify-center transition">
							+
						</button>
					</div>
				</div>

				<!-- Action Buttons -->
				<div class="pt-2 flex flex-col sm:flex-row gap-3">
					<button type="submit" 
					        <?= ($product['stock'] <= 0) ? 'disabled' : '' ?>
					        class="flex-1 py-4 px-6 rounded-2xl bg-amber-600 hover:bg-amber-500 disabled:bg-slate-300 disabled:cursor-not-allowed text-white font-bold text-sm transition shadow-lg shadow-amber-900/20 flex items-center justify-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
						</svg>
						Tambah ke Keranjang
					</button>

					<?php if (!empty($store_settings['whatsapp_number'])): ?>
						<button type="button" 
						        id="btnDirectWa"
						        class="py-4 px-6 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm transition flex items-center justify-center gap-2 shadow-sm">
							<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
								<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
							</svg>
							Beli Cepat via WA
						</button>
					<?php endif; ?>
				</div>
			</form>

			<hr class="border-slate-200">

			<!-- Deskripsi Produk -->
			<div class="space-y-3">
				<h3 class="text-sm font-bold text-dark-900 uppercase tracking-wider">Deskripsi & Spesifikasi:</h3>
				<div class="text-sm text-slate-600 leading-relaxed whitespace-pre-line bg-slate-50 p-5 rounded-2xl border border-slate-200">
					<?= nl2br(html_escape($product['description'])) ?>
				</div>
			</div>

			<!-- Jaminan Belanja di Mix-D -->
			<div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200 text-xs text-amber-900 space-y-2">
				<div class="font-bold flex items-center gap-1.5">
					<span>🛡️ Jaminan Kepuasan Mix-D:</span>
				</div>
				<ul class="list-disc list-inside space-y-1 text-amber-800">
					<li>100% Produk baru dengan kontrol kualitas ketat sebelum kirim</li>
					<li>Bisa konsultasi ukuran langsung dengan admin via WhatsApp</li>
					<li>Pengiriman cepat & packing rapi menggunakan box kokoh</li>
				</ul>
			</div>

		</div>

	</div>

	<!-- Rekomendasi Produk Terkait -->
	<?php if (!empty($related_products)): ?>
		<div class="mt-20 pt-12 border-t border-slate-200">
			<div class="mb-8">
				<h2 class="text-xs font-bold text-amber-600 uppercase tracking-widest mb-1">Rekomendasi Serupa</h2>
				<p class="text-2xl font-extrabold text-dark-900 tracking-tight">Sepatu Pria Lainnya yang Mungkin Anda Suka</p>
			</div>

			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
				<?php foreach ($related_products as $rel): ?>
					<div class="bg-white rounded-2xl border border-slate-200 hover:border-amber-300 hover:shadow-lg transition duration-300 overflow-hidden flex flex-col group">
						<a href="<?= base_url('produk/' . $rel['slug']) ?>" class="block relative h-48 bg-slate-100 overflow-hidden">
							<?php 
							$relImg = 'uploads/products/' . $rel['image'];
							if (!empty($rel['image']) && file_exists(FCPATH . $relImg)): 
							?>
								<img src="<?= base_url($relImg) ?>" alt="<?= html_escape($rel['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
							<?php else: ?>
								<div class="w-full h-full flex flex-col items-center justify-center bg-slate-100 text-slate-400">
									<span class="text-4xl mb-1">👞</span>
									<span class="text-[10px] font-semibold tracking-wider text-slate-400 uppercase">Mix-D</span>
								</div>
							<?php endif; ?>
						</a>
						<div class="p-4 flex-1 flex flex-col justify-between">
							<h3 class="font-bold text-sm text-dark-900 group-hover:text-amber-700 transition line-clamp-1">
								<a href="<?= base_url('produk/' . $rel['slug']) ?>">
									<?= html_escape($rel['name']) ?>
								</a>
							</h3>
							<div class="mt-3 flex items-center justify-between">
								<span class="text-sm font-bold text-amber-600">
									Rp <?= number_format($rel['price'], 0, ',', '.') ?>
								</span>
								<a href="<?= base_url('produk/' . $rel['slug']) ?>" class="text-xs font-bold text-dark-900 hover:text-amber-600 transition">
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

<!-- Interactive JS for Size Picker & Quantity Counter -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const qtyInput = document.getElementById('qtyInput');
		const qtyMinus = document.getElementById('qtyMinus');
		const qtyPlus  = document.getElementById('qtyPlus');
		const maxStock = parseInt(qtyInput.getAttribute('max')) || 999;

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

		// Direct WhatsApp Order
		const btnDirectWa = document.getElementById('btnDirectWa');
		if (btnDirectWa) {
			btnDirectWa.addEventListener('click', function() {
				const selectedSizeInput = document.querySelector('input[name="size"]:checked');
				if (!selectedSizeInput) {
					alert('Silakan pilih ukuran sepatu terlebih dahulu!');
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
				             "Mohon konfirmasi ketersediaan stok & total ongkir ke alamat saya. Terima kasih!";

				const waUrl = "https://api.whatsapp.com/send?phone=" + waNumber + "&text=" + encodeURIComponent(text);
				window.open(waUrl, '_blank');
			});
		}
	});
</script>
