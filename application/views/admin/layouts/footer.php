<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
		</main>

		<!-- Admin Footer -->
		<footer class="bg-white border-t border-stone-200/80 px-6 sm:px-8 py-4 text-xs text-stone-400 flex flex-col sm:flex-row justify-between items-center gap-2 flex-shrink-0">
			<div class="flex items-center gap-2">
				<span>&copy; <?= date('Y') ?></span>
				<strong class="font-serif text-stone-800">MIX-D</strong>
				<span class="text-stone-300">|</span>
				<span class="text-stone-500">Panel Manajemen Sepatu Pria</span>
			</div>
			<div class="font-mono text-[11px] text-stone-400">
				CodeIgniter 3.1.13 &bull; PHP <?= phpversion() ?>
			</div>
		</footer>

		</div> <!-- End Scrollable Content Viewport -->

	</div> <!-- End Main Wrapper -->

	<!-- Script for Mobile Sidebar Drawer -->
	<script>
		document.getElementById('adminSidebarToggle')?.addEventListener('click', function() {
			const sidebar = document.getElementById('adminSidebar');
			if (sidebar) {
				sidebar.classList.toggle('hidden');
				sidebar.classList.toggle('fixed');
				sidebar.classList.toggle('inset-0');
				sidebar.classList.toggle('z-50');
			}
		});
	</script>
</body>
</html>

