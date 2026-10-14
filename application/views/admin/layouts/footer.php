<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
		</main>

		<!-- Admin Footer -->
		<footer class="bg-white border-t border-slate-200 px-6 sm:px-8 py-4 text-xs text-slate-400 flex flex-col sm:flex-row justify-between items-center gap-2 flex-shrink-0">
			<div>
				&copy; <?= date('Y') ?> <strong>Mix-D Men's Footwear</strong>. Panel Pengelolaan Toko Sepatu Pria.
			</div>
			<div>
				CI 3.1.13 | PHP <?= phpversion() ?>
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
