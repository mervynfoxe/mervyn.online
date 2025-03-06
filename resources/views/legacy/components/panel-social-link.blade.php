<div class="flex-item">
    <?php if (!empty($link->label)): ?>
        <strong><?= $link->label ?></strong><br/>
    <?php endif; ?>
    <?php if (!empty($link->url)): ?>
        <a href="<?= $link->url ?>"
           class="panel-link <?= $link->class ?? '' ?>"
           target="<?= $link->target ?? '_blank' ?>"
                <?= !empty($link->rel) ? 'rel="' . $link->rel . '"' : '' ?>>
                <?= $link->title ?>
        </a>
    <?php else: ?>
        <?= $link->title ?>
    <?php endif; ?>
</div>
