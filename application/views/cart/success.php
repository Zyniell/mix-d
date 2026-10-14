<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
	<div class="bg-white rounded-3xl border border-slate-200 p-8 sm:p-12 text-center shadow-lg space-y-6">
		
		<!-- Success Icon -->
		<div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-4xl mx-auto shadow-inner">
			✓
		</div>

		<div>
			<h1 class="text-2xl sm:text-3xl font-extrabold text-dark-900 tracking-tight">
				Pesanan Berhasil Disiapkan!
			</h1>
			<p class="text-sm text-slate-500 mt-2">
				Rincian pesanan Anda telah tersusun rapi. Silakan klik tombol di bawah untuk langsung membuka obrolan dengan admin toko Mix-D di WhatsApp.
			</p>
		</div>

		<!-- Direct WhatsApp Button -->
		<div class="pt-2">
			<a href="<?= $wa_url ?>" target="_blank" id="btnOpenWa" class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-base rounded-2xl shadow-xl shadow-emerald-900/30 transition transform hover:-translate-y-0.5 w-full sm:w-auto">
				<svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
					<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.177.181-.076.355.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825z"/>
				</svg>
				Kirim Pesanan ke WhatsApp Sekarang
			</a>
		</div>

		<!-- Message Preview Accordion -->
		<div class="text-left bg-slate-50 p-5 rounded-2xl border border-slate-200 text-xs">
			<div class="font-bold text-dark-900 mb-2 flex items-center justify-between">
				<span>Rincian Format Pesanan WhatsApp:</span>
				<span class="text-emerald-700">✓ Siap Dikirim</span>
			</div>
			<pre class="whitespace-pre-wrap font-sans text-slate-600 bg-white p-4 rounded-xl border border-slate-200 leading-relaxed"><?= html_escape($message_text) ?></pre>
		</div>

		<div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-center gap-4">
			<a href="<?= base_url('produk') ?>" class="text-xs font-semibold text-slate-500 hover:text-dark-900 transition">
				← Kembali ke Katalog Sepatu
			</a>
			<span class="text-slate-300 hidden sm:inline">•</span>
			<a href="<?= base_url() ?>" class="text-xs font-semibold text-slate-500 hover:text-dark-900 transition">
				Halaman Utama
			</a>
		</div>

	</div>
</div>

<script>
	// Attempt to trigger opening WhatsApp automatically on page load
	window.addEventListener('DOMContentLoaded', function() {
		setTimeout(function() {
			window.location.href = <?= json_encode($wa_url) ?>;
		}, 1200);
	});
</script>
