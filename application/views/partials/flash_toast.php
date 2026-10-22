<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Floating Toast Flash Messages Component
 * Displays auto-dismissing notifications at the top center of the viewport.
 */
$flashTypes = array(
	'success' => array(
		'title'       => 'Berhasil',
		'badge_bg'    => 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20',
		'card_border' => 'border-emerald-500/30',
		'shadow'      => 'shadow-emerald-500/10',
		'progress'    => 'bg-emerald-500',
		'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />'
	),
	'error' => array(
		'title'       => 'Perhatian',
		'badge_bg'    => 'bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20',
		'card_border' => 'border-rose-500/30',
		'shadow'      => 'shadow-rose-500/10',
		'progress'    => 'bg-rose-500',
		'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'
	),
	'warning' => array(
		'title'       => 'Peringatan',
		'badge_bg'    => 'bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20',
		'card_border' => 'border-amber-500/30',
		'shadow'      => 'shadow-amber-500/10',
		'progress'    => 'bg-amber-500',
		'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />'
	),
	'info' => array(
		'title'       => 'Informasi',
		'badge_bg'    => 'bg-sky-500/10 text-sky-600 dark:text-sky-400 border border-sky-500/20',
		'card_border' => 'border-sky-500/30',
		'shadow'      => 'shadow-sky-500/10',
		'progress'    => 'bg-sky-500',
		'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'
	)
);

$activeToasts = array();
foreach ($flashTypes as $type => $meta) {
	$msg = $this->session->flashdata($type);
	if (!empty($msg)) {
		$activeToasts[] = array(
			'type'    => $type,
			'message' => $msg,
			'meta'    => $meta
		);
	}
}

if (!empty($activeToasts)):
?>
<!-- Floating Flash Toast Container -->
<div id="flash-toast-container" class="fixed top-5 left-1/2 -translate-x-1/2 z-[9999] w-[92%] sm:w-auto sm:min-w-[380px] sm:max-w-md pointer-events-none flex flex-col gap-2.5 items-center">
	<?php foreach ($activeToasts as $idx => $toast): ?>
		<div id="flash-toast-<?= $idx ?>" 
		     data-duration="2000" 
		     class="flash-toast-item pointer-events-auto w-full bg-white/95 dark:bg-stone-900/95 backdrop-blur-md rounded-2xl p-4 shadow-xl <?= $toast['meta']['shadow'] ?> border <?= $toast['meta']['card_border'] ?> transition-all duration-300 transform -translate-y-4 opacity-0 scale-95 relative overflow-hidden select-none">
			
			<div class="flex items-start gap-3">
				<!-- Icon Badge -->
				<div class="flex-shrink-0 w-9 h-9 rounded-xl flex items-center justify-center <?= $toast['meta']['badge_bg'] ?>">
					<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<?= $toast['meta']['icon'] ?>
					</svg>
				</div>

				<!-- Text Content -->
				<div class="flex-1 min-w-0 pr-2">
					<p class="text-xs font-bold uppercase tracking-wider text-stone-500 dark:text-stone-400 mb-0.5">
						<?= $toast['meta']['title'] ?>
					</p>
					<p class="text-sm font-semibold text-stone-800 dark:text-stone-100 leading-snug break-words">
						<?= $toast['message'] ?>
					</p>
				</div>

				<!-- Close Button -->
				<button type="button" 
				        class="toast-close-btn flex-shrink-0 p-1 -mt-1 -mr-1 text-stone-400 hover:text-stone-700 dark:hover:text-stone-200 rounded-lg hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors" 
				        title="Tutup notifikasi">
					<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>
			</div>

			<!-- Progress Bar Timer -->
			<div class="absolute bottom-0 left-0 right-0 h-1 bg-stone-100 dark:bg-stone-800">
				<div class="toast-progress-bar h-full <?= $toast['meta']['progress'] ?> w-full transition-all"></div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<script>
(function() {
	function initFlashToasts() {
		var toasts = document.querySelectorAll('.flash-toast-item');
		toasts.forEach(function(toast) {
			var duration = parseInt(toast.getAttribute('data-duration') || '4500', 10);
			var progressBar = toast.querySelector('.toast-progress-bar');
			var closeBtn = toast.querySelector('.toast-close-btn');

			// Trigger entrance animation smoothly
			requestAnimationFrame(function() {
				toast.classList.remove('-translate-y-4', 'opacity-0', 'scale-95');
				toast.classList.add('translate-y-0', 'opacity-100', 'scale-100');
			});

			var startTime = Date.now();
			var remainingTime = duration;
			var timerId = null;
			var isPaused = false;

			// Animate progress bar linearly
			if (progressBar) {
				progressBar.style.transition = 'width ' + duration + 'ms linear';
				requestAnimationFrame(function() {
					progressBar.style.width = '0%';
				});
			}

			function dismiss() {
				if (!toast.parentElement) return;
				toast.classList.remove('translate-y-0', 'opacity-100', 'scale-100');
				toast.classList.add('-translate-y-4', 'opacity-0', 'scale-95');
				setTimeout(function() {
					toast.remove();
					var container = document.getElementById('flash-toast-container');
					if (container && container.children.length === 0) {
						container.remove();
					}
				}, 300);
			}

			function startTimer() {
				startTime = Date.now();
				timerId = setTimeout(dismiss, remainingTime);
			}

			if (closeBtn) {
				closeBtn.addEventListener('click', function(e) {
					e.stopPropagation();
					clearTimeout(timerId);
					dismiss();
				});
			}

			// Pause countdown on mouse hover
			toast.addEventListener('mouseenter', function() {
				clearTimeout(timerId);
				remainingTime -= (Date.now() - startTime);
				isPaused = true;
				if (progressBar) {
					var computedWidth = window.getComputedStyle(progressBar).width;
					progressBar.style.transition = 'none';
					progressBar.style.width = computedWidth;
				}
			});

			// Resume countdown on mouse leave
			toast.addEventListener('mouseleave', function() {
				if (isPaused && remainingTime > 0) {
					if (progressBar) {
						progressBar.style.transition = 'width ' + remainingTime + 'ms linear';
						progressBar.style.width = '0%';
					}
					startTimer();
					isPaused = false;
				}
			});

			startTimer();
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initFlashToasts);
	} else {
		initFlashToasts();
	}
})();
</script>
<?php endif; ?>
