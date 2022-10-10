<div class="copyright col-lg-12 text-center">
    &copy;2014-<?= date("Y") ?>
	<?php if (Config::$sCurrentEnv === 'public'): ?>
        Mervyn Fox
	<?php elseif (Config::$sCurrentEnv === 'professional'): ?>
        Ren Fox
	<?php elseif (Config::$sCurrentEnv === 'professional-old'): ?>
        Alex Schaeffer
	<?php endif; ?>
</div>
