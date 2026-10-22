<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Cart Header -->
<div class="bg-stone-100/70 py-8 border-b border-stone-200/80">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<h1 class="text-3xl font-serif font-bold text-stone-950 tracking-tight">
			Keranjang Belanja Sepatu
		</h1>
		<p class="text-xs text-stone-500 mt-1">
			Tinjau pesanan sepatu pria Anda dan lengkapi data pemesan untuk checkout langsung ke WhatsApp CS.
		</p>
	</div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

	<?php if (!empty($validation_error)): ?>
		<div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs">
			<div class="font-bold mb-1 flex items-center gap-2">
				<svg class="w-4 h-4 text-rose-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
					<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
				</svg>
				<span>Mohon lengkapi data formulir dengan benar:</span>
			</div>
			<div class="space-y-1 pl-6"><?= $validation_error ?></div>
		</div>
	<?php endif; ?>

	<?php if (!empty($cart_items)): ?>
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
			
			<!-- Left: Cart Items List (7 cols) -->
			<div class="lg:col-span-7 space-y-4">
				
				<div class="bg-white rounded-3xl border border-stone-200/80 overflow-hidden shadow-card">
					<div class="p-4 sm:px-6 bg-stone-50/80 border-b border-stone-200/80 flex items-center justify-between">
						<span class="text-xs font-bold uppercase tracking-wider text-stone-700">
							Daftar Pesanan (<span class="font-tabular font-bold text-brand-700"><?= (int)$cart_count ?></span> pasang)
						</span>
						<a href="<?= base_url('cart/clear') ?>" 
						   onclick="return confirm('Kosongkan semua sepatu di keranjang?')"
						   class="text-xs font-semibold text-rose-600 hover:text-rose-800 transition">
							Kosongkan Keranjang
						</a>
					</div>

					<div class="divide-y divide-stone-100">
						<?php foreach ($cart_items as $item): ?>
							<div class="p-4 sm:p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
								
								<!-- Product Info -->
								<div class="flex items-center gap-4 flex-1">
									<div class="w-20 h-20 bg-stone-100 rounded-2xl overflow-hidden flex-shrink-0 border border-stone-200/80">
										<?php 
										$img = 'uploads/products/' . $item['image'];
										if (!empty($item['image']) && file_exists(FCPATH . $img)): 
										?>
											<img src="<?= base_url($img) ?>" alt="<?= html_escape($item['name']) ?>" class="w-full h-full object-cover">
										<?php else: ?>
											<div class="w-full h-full flex items-center justify-center text-stone-400">
												<svg class="w-8 h-8 text-stone-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
												</svg>
											</div>
										<?php endif; ?>
									</div>

									<div>
										<h3 class="font-bold text-sm text-stone-900 leading-snug">
											<a href="<?= base_url('produk/' . $item['slug']) ?>" class="hover:text-brand-700 transition">
												<?= html_escape($item['name']) ?>
											</a>
										</h3>
										<div class="mt-1 flex items-center gap-2">
											<span class="px-2.5 py-0.5 rounded-md bg-brand-50 border border-brand-200/80 text-brand-900 text-[11px] font-bold font-tabular">
												Size <?= html_escape($item['size']) ?>
											</span>
											<span class="text-xs text-stone-500 font-tabular">
												@ Rp <?= number_format($item['price'], 0, ',', '.') ?>
											</span>
										</div>
									</div>
								</div>

								<!-- Quantity & Subtotal Controls -->
								<div class="flex items-center justify-between w-full sm:w-auto gap-6 pt-2 sm:pt-0 border-t sm:border-t-0 border-stone-100">
									
									<!-- Qty form -->
									<form method="POST" action="<?= base_url('cart/update') ?>" class="flex items-center gap-1.5">
										<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
										<input type="hidden" name="key" value="<?= html_escape($item['key']) ?>">
										
										<button type="submit" name="qty" value="<?= max(1, $item['qty'] - 1) ?>" class="w-8 h-8 rounded-lg border border-stone-300 bg-white hover:bg-stone-100 font-bold text-xs text-stone-700 flex items-center justify-center transition active:scale-95 shadow-sm">
											-
										</button>
										<span class="w-8 text-center text-sm font-bold text-stone-900 font-tabular">
											<?= (int)$item['qty'] ?>
										</span>
										<button type="submit" name="qty" value="<?= $item['qty'] + 1 ?>" class="w-8 h-8 rounded-lg border border-stone-300 bg-white hover:bg-stone-100 font-bold text-xs text-stone-700 flex items-center justify-center transition active:scale-95 shadow-sm">
											+
										</button>
									</form>

									<!-- Subtotal -->
									<div class="text-right">
										<div class="text-sm font-serif font-bold text-brand-700 font-tabular">
											Rp <?= number_format($item['subtotal'], 0, ',', '.') ?>
										</div>
										<a href="<?= base_url('cart/remove/' . $item['key']) ?>" 
										   onclick="return confirm('Hapus sepatu ini dari keranjang?')" 
										   class="text-[11px] text-stone-400 hover:text-rose-600 transition">
											Hapus
										</a>
									</div>

								</div>

							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="flex justify-between items-center pt-2">
					<a href="<?= base_url('produk') ?>" class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-700 hover:text-brand-800 transition">
						<span>←</span>
						<span>Tambah Sepatu Lainnya</span>
					</a>
				</div>

			</div>

			<!-- Right: Checkout via WhatsApp Form (5 cols) -->
			<div class="lg:col-span-5 bg-white p-6 sm:p-8 rounded-3xl border border-stone-200/80 shadow-card sticky top-28 space-y-6">
				
				<div class="border-b border-stone-100 pb-4">
					<h2 class="text-lg font-serif font-bold text-stone-950">Data Pemesan & Checkout WA</h2>
					<p class="text-xs text-stone-500 mt-1">Data pemesan akan dirangkum rapi dan dikirim langsung ke WhatsApp CS toko.</p>
				</div>

				<!-- Total Summary Box -->
				<div class="space-y-2 py-3 bg-stone-50 p-4 rounded-2xl border border-stone-200/80">
					<div class="flex justify-between text-xs text-stone-600">
						<span>Total Sepatu</span>
						<span class="font-bold text-stone-900 font-tabular"><?= (int)$cart_count ?> Pasang</span>
					</div>
					<div class="flex justify-between text-base font-serif font-bold text-stone-950 pt-2 border-t border-stone-200">
						<span>Total Belanja</span>
						<span class="text-brand-700 font-tabular">Rp <?= number_format($cart_total, 0, ',', '.') ?></span>
					</div>
					<div class="text-[10px] text-stone-400 pt-1">
						*Ongkos kirim akan dikonfirmasi oleh admin di chat WhatsApp sesuai alamat lengkap Anda.
					</div>
				</div>

				<!-- Customer Form -->
				<form method="POST" action="<?= base_url('cart/checkout') ?>" class="space-y-4">
					<!-- CSRF Token -->
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

					<div>
						<label class="block text-xs font-bold text-stone-900 mb-1">
							Nama Lengkap Pemesan <span class="text-rose-500">*</span>
						</label>
						<input type="text" 
						       name="customer_name" 
						       value="<?= set_value('customer_name') ?>" 
						       required 
						       placeholder="Contoh: Budi Santoso" 
						       class="w-full py-2.5 px-3.5 text-xs rounded-xl border border-stone-300 focus:outline-none focus:ring-2 focus:ring-brand-500/50 text-stone-800">
					</div>

					<div>
						<label class="block text-xs font-bold text-stone-900 mb-1">
							Nomor WhatsApp Aktif <span class="text-rose-500">*</span>
						</label>
						<input type="tel" 
						       name="customer_phone" 
						       value="<?= set_value('customer_phone') ?>" 
						       required 
						       placeholder="Contoh: 081234567890" 
						       class="w-full py-2.5 px-3.5 text-xs rounded-xl border border-stone-300 focus:outline-none focus:ring-2 focus:ring-brand-500/50 text-stone-800 font-tabular">
					</div>

					<div>
						<label class="block text-xs font-bold text-stone-900 mb-1">
							Alamat Pengiriman Lengkap <span class="text-rose-500">*</span>
						</label>
						<textarea name="shipping_address" 
						          rows="3" 
						          required 
						          placeholder="Alamat jalan, nomor rumah, RT/RW, Kelurahan, Kecamatan, Kota, Kode Pos" 
						          class="w-full py-2 px-3.5 text-xs rounded-xl border border-stone-300 focus:outline-none focus:ring-2 focus:ring-brand-500/50 text-stone-800"><?= set_value('shipping_address') ?></textarea>
					</div>

					<div>
						<label class="block text-xs font-bold text-stone-900 mb-1">
							Catatan Pesanan (Opsional)
						</label>
						<input type="text" 
						       name="notes" 
						       value="<?= set_value('notes') ?>" 
						       placeholder="Misal: Tolong kirim dengan bubble wrap tebal ya min" 
						       class="w-full py-2 px-3.5 text-xs rounded-xl border border-stone-300 focus:outline-none focus:ring-2 focus:ring-brand-500/50 text-stone-800">
					</div>

					<!-- Checkout Button -->
					<button type="submit" class="w-full py-4 px-6 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs tracking-wide transition shadow-lg shadow-emerald-900/20 flex items-center justify-center gap-2 active:scale-[0.98] border border-emerald-500/30">
						<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
							<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
						</svg>
						<span>Kirim Pesanan ke WhatsApp Toko</span>
					</button>

					<p class="text-[11px] text-stone-400 text-center leading-relaxed">
						Setelah menekan tombol di atas, WhatsApp Anda akan otomatis terbuka dengan ringkasan pesanan sepatu yang sudah tersusun rapi.
					</p>
				</form>

			</div>

		</div>
	<?php else: ?>
		<!-- Empty Cart State -->
		<div class="max-w-md mx-auto bg-white p-12 rounded-3xl border border-stone-200/80 text-center shadow-card">
			<div class="w-16 h-16 bg-stone-100 text-stone-400 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-stone-200">
				<svg class="w-8 h-8 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
				</svg>
			</div>
			<h2 class="text-xl font-serif font-bold text-stone-950 mb-2">Keranjang Belanja Anda Kosong</h2>
			<p class="text-xs text-stone-500 mb-8 leading-relaxed">
				Anda belum menambahkan sepatu pilihan ke dalam keranjang belanja. Silakan pilih sepatu pria favorit Anda di katalog.
			</p>
			<a href="<?= base_url('produk') ?>" class="inline-flex items-center gap-2 px-8 py-3.5 bg-brand-600 hover:bg-brand-500 text-white rounded-xl font-bold text-xs transition shadow-leather active:scale-95">
				<span>Jelajahi Katalog Sepatu Pria</span>
				<span>→</span>
			</a>
		</div>
	<?php endif; ?>

</div>

