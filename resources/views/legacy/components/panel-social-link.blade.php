<div class="flex-item">
    <?php if (!empty($header)): ?>
        <strong><?= $header ?></strong><br/>
    <?php endif; ?>
    <?php if (!empty($url)): ?>
        <a href="<?= $url ?>"
           class="panel-link <?= $class ?? '' ?>"
           target="<?= $target ?? '_blank' ?>"
                <?= !empty($rel) ? 'rel="' . $rel . '"' : '' ?>>
                <?= $label ?>
        </a>
    <?php else: ?>
        <?= $label ?>
    <?php endif; ?>
</div>
