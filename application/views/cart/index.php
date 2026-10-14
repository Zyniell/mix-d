<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="bg-slate-100 py-6 border-b border-slate-200">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<h1 class="text-2xl sm:text-3xl font-extrabold text-dark-900 tracking-tight">
			Keranjang Belanja Sepatu
		</h1>
		<p class="text-xs sm:text-sm text-slate-500 mt-1">
			Tinjau pesanan Anda dan lengkapi data pemesan untuk checkout langsung ke WhatsApp.
		</p>
	</div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

	<?php if (!empty($validation_error)): ?>
		<div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm">
			<div class="font-bold mb-1 flex items-center gap-2">
				<span>⚠️ Mohon lengkapi formulir dengan benar:</span>
			</div>
			<div class="space-y-1 text-xs"><?= $validation_error ?></div>
		</div>
	<?php endif; ?>

	<?php if (!empty($cart_items)): ?>
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
			
			<!-- Left: Cart Items List -->
			<div class="lg:col-span-7 space-y-4">
				
				<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
					<div class="p-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
						<span class="text-xs font-bold uppercase tracking-wider text-slate-600">
							Daftar Item (<?= (int)$cart_count ?> pasang)
						</span>
						<a href="<?= base_url('cart/clear') ?>" 
						   onclick="return confirm('Kosongkan semua sepatu di keranjang?')"
						   class="text-xs font-semibold text-rose-600 hover:text-rose-800 transition">
							Kosongkan Keranjang
						</a>
					</div>

					<div class="divide-y divide-slate-100">
						<?php foreach ($cart_items as $item): ?>
							<div class="p-4 sm:p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
								
								<!-- Product Info -->
								<div class="flex items-center gap-4 flex-1">
									<div class="w-20 h-20 bg-slate-100 rounded-xl overflow-hidden flex-shrink-0 border border-slate-200">
										<?php 
										$img = 'uploads/products/' . $item['image'];
										if (!empty($item['image']) && file_exists(FCPATH . $img)): 
										?>
											<img src="<?= base_url($img) ?>" alt="<?= html_escape($item['name']) ?>" class="w-full h-full object-cover">
										<?php else: ?>
											<div class="w-full h-full flex items-center justify-center text-2xl">👞</div>
										<?php endif; ?>
									</div>

									<div>
										<h3 class="font-bold text-sm text-dark-900 leading-snug">
											<a href="<?= base_url('produk/' . $item['slug']) ?>" class="hover:text-amber-600 transition">
												<?= html_escape($item['name']) ?>
											</a>
										</h3>
										<div class="mt-1 flex items-center gap-2">
											<span class="px-2 py-0.5 rounded-md bg-amber-100 text-amber-800 text-[11px] font-bold">
												Ukuran: <?= html_escape($item['size']) ?>
											</span>
											<span class="text-xs text-slate-500">
												@ Rp <?= number_format($item['price'], 0, ',', '.') ?>
											</span>
										</div>
									</div>
								</div>

								<!-- Quantity & Subtotal Controls -->
								<div class="flex items-center justify-between w-full sm:w-auto gap-6 pt-2 sm:pt-0 border-t sm:border-t-0 border-slate-100">
									
									<!-- Qty form -->
									<form method="POST" action="<?= base_url('cart/update') ?>" class="flex items-center gap-1.5">
										<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
										<input type="hidden" name="key" value="<?= html_escape($item['key']) ?>">
										
										<button type="submit" name="qty" value="<?= max(1, $item['qty'] - 1) ?>" class="w-8 h-8 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 font-bold text-xs text-slate-700 flex items-center justify-center transition">
											-
										</button>
										<span class="w-8 text-center text-sm font-bold text-dark-900">
											<?= (int)$item['qty'] ?>
										</span>
										<button type="submit" name="qty" value="<?= $item['qty'] + 1 ?>" class="w-8 h-8 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 font-bold text-xs text-slate-700 flex items-center justify-center transition">
											+
										</button>
									</form>

									<!-- Subtotal -->
									<div class="text-right">
										<div class="text-sm font-extrabold text-amber-600">
											Rp <?= number_format($item['subtotal'], 0, ',', '.') ?>
										</div>
										<a href="<?= base_url('cart/remove/' . $item['key']) ?>" 
										   onclick="return confirm('Hapus sepatu ini dari keranjang?')" 
										   class="text-[11px] text-slate-400 hover:text-rose-600 transition">
											Hapus
										</a>
									</div>

								</div>

							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="flex justify-between items-center pt-2">
					<a href="<?= base_url('produk') ?>" class="inline-flex items-center gap-2 text-xs font-bold text-amber-700 hover:text-amber-800 transition">
						← Tambah Sepatu Lain
					</a>
				</div>

			</div>

			<!-- Right: Checkout via WhatsApp Form -->
			<div class="lg:col-span-5 bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm sticky top-28 space-y-6">
				
				<div class="border-b border-slate-100 pb-4">
					<h2 class="text-lg font-bold text-dark-900">Ringkasan & Checkout WhatsApp</h2>
					<p class="text-xs text-slate-500 mt-1">Data pemesan akan dikirim langsung ke WhatsApp toko untuk diproses.</p>
				</div>

				<!-- Total Summary -->
				<div class="space-y-2 py-3 bg-slate-50 p-4 rounded-2xl border border-slate-100">
					<div class="flex justify-between text-xs text-slate-600">
						<span>Total Item</span>
						<span class="font-bold text-dark-900"><?= (int)$cart_count ?> Pasang</span>
					</div>
					<div class="flex justify-between text-base font-extrabold text-dark-900 pt-2 border-t border-slate-200">
						<span>Total Belanja</span>
						<span class="text-amber-600">Rp <?= number_format($cart_total, 0, ',', '.') ?></span>
					</div>
					<div class="text-[10px] text-slate-400 pt-1">
						*Ongkos kirim akan dihitung oleh admin saat konfirmasi di WhatsApp.
					</div>
				</div>

				<!-- Customer Form -->
				<form method="POST" action="<?= base_url('cart/checkout') ?>" class="space-y-4">
					<!-- CSRF Token -->
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

					<div>
						<label class="block text-xs font-bold text-dark-900 mb-1">
							Nama Lengkap Pemesan <span class="text-rose-500">*</span>
						</label>
						<input type="text" 
						       name="customer_name" 
						       value="<?= set_value('customer_name') ?>" 
						       required 
						       placeholder="Contoh: Budi Santoso" 
						       class="w-full py-2.5 px-3.5 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
					</div>

					<div>
						<label class="block text-xs font-bold text-dark-900 mb-1">
							Nomor WhatsApp Aktif <span class="text-rose-500">*</span>
						</label>
						<input type="tel" 
						       name="customer_phone" 
						       value="<?= set_value('customer_phone') ?>" 
						       required 
						       placeholder="Contoh: 081234567890" 
						       class="w-full py-2.5 px-3.5 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
					</div>

					<div>
						<label class="block text-xs font-bold text-dark-900 mb-1">
							Alamat Pengiriman Lengkap <span class="text-rose-500">*</span>
						</label>
						<textarea name="shipping_address" 
						          rows="3" 
						          required 
						          placeholder="Alamat jalan, nomor rumah, RT/RW, Kelurahan, Kecamatan, Kota, Kode Pos" 
						          class="w-full py-2 px-3.5 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-amber-500"><?= set_value('shipping_address') ?></textarea>
					</div>

					<div>
						<label class="block text-xs font-bold text-dark-900 mb-1">
							Catatan Pesanan (Opsional)
						</label>
						<input type="text" 
						       name="notes" 
						       value="<?= set_value('notes') ?>" 
						       placeholder="Misal: Tolong kirim dengan bubble wrap tebal ya min" 
						       class="w-full py-2 px-3.5 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
					</div>

					<!-- Checkout Button -->
					<button type="submit" class="w-full py-4 px-6 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm transition shadow-lg shadow-emerald-900/20 flex items-center justify-center gap-2">
						<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
							<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
						</svg>
						Pesan Sekarang via WhatsApp
					</button>

					<p class="text-[11px] text-slate-400 text-center leading-relaxed">
						Dengan menekan tombol di atas, Anda akan dialihkan ke WhatsApp resmi toko Mix-D dengan rincian pesanan yang sudah terformat rapi.
					</p>
				</form>

			</div>

		</div>
	<?php else: ?>
		<!-- Empty Cart State -->
		<div class="max-w-lg mx-auto bg-white p-12 rounded-3xl border border-slate-200 text-center shadow-sm">
			<div class="w-20 h-20 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center text-4xl mx-auto mb-4">
				🛒
			</div>
			<h2 class="text-xl font-bold text-dark-900 mb-2">Keranjang Belanja Anda Kosong</h2>
			<p class="text-sm text-slate-500 mb-8 leading-relaxed">
				Anda belum menambahkan sepatu pria pilihan ke dalam keranjang. Silakan pilih sepatu favorit Anda di katalog.
			</p>
			<a href="<?= base_url('produk') ?>" class="inline-block px-8 py-3.5 bg-amber-600 hover:bg-amber-500 text-white rounded-xl font-bold text-sm transition shadow-md shadow-amber-900/20">
				Jelajahi Katalog Sepatu Pria
			</a>
		</div>
	<?php endif; ?>

</div>
