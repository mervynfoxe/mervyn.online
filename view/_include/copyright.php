<div class="copyright col-lg-12 text-center">
    &copy;2014-<?= date("Y") ?>
	<?php if (Config::$sCurrentEnv === 'public'): ?>
        Mervyn Fox
	<?php elseif (Config::$sCurrentEnv === 'professional'): ?>
        Alex Schaeffer
	<?php elseif (Config::$sCurrentEnv === 'professional-ren'): ?>
        <span class="tooltip-enable" title="Alex Schaeffer">Ren Fox</span>
	<?php endif; ?>
</div>
