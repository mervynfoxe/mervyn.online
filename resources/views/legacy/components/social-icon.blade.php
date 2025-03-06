<span><a href="<?= $url ?>"
         class="social-link <?= $class ?? '' ?>"
         id="<?= $id ?>"
         title="<?= $title ?>"
         <?= !empty($rel) ? 'rel="' . $rel . '"' : '' ?>
         <?= !empty($panelLinks) ? 'data-toggle="collapse" data-parent="#socialPanels"' : '' ?>
         target="<?= $target ?? '_blank' ?>">
            <?php if (!empty($icon)): ?>
        {{ svg($icon) }}
        <?php else: ?>
                <img src="{{ Vite::asset('resources/legacy/img/social/' . $iconImg) }}" alt="<?= $alt ?>"/>
            <?php endif; ?>
        </a></span>
