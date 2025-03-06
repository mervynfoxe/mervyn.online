<span><a href="<?= $item->url ?>"
         class="social-link <?= $item->class ?? '' ?>"
         id="<?= $item->id ?>"
         title="<?= $item->title ?>"
         <?= !empty($item->rel) ? 'rel="' . $item->rel . '"' : '' ?>
         <?= !empty($item->panel_links) ? 'data-toggle="collapse" data-parent="#socialPanels"' : '' ?>
         target="<?= $item->target ?? '_blank' ?>">
            <?php if (!empty($item->icon_buk)): ?>
        {{ svg($item->icon_buk) }}
        <?php else: ?>
                <img src="{{ Vite::asset('resources/legacy/img/social/' . $item->icon) }}" alt="<?= $item->alt ?>"/>
            <?php endif; ?>
        </a></span>
