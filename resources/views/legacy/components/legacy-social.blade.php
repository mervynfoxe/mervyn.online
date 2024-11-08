<?php
    // Cohost Countdown
    $now = new DateTime();
    $ch_dl = new DateTime('2024-10-01');
    $ch_id = $now > $ch_dl;
    $ch_td = $now->diff($ch_dl);
    $ch_cd = [
        'header' => $ch_id ? 'RIP Eggbug 😔' : ($ch_td->d > 0 ? $ch_td->d . ' days, ' : '') . $ch_td->h . ' hours remain',
        'link' => $ch_id ? 'https://web.archive.org/web/https://cohost.org/mervyn' : 'https://cohost.org/mervyn'
    ];

    // Social links array
    $links = [
        'public' => [
            array(
                'url' => 'https://twitter.com/MervynFoxe',
                'icon' => 'icon-twitter.png',
                'icon_buk' => 'ri-twitter-fill',
                'id' => 'twitter-link',
                'alt' => 'birdsite',
                'title' => '@MervynFoxe on Twitter',
                'rel' => 'me',
                'panel_links' => NULL
            ),
            array(
                'url' => 'https://steamcommunity.com/id/MervynFoxe',
                'icon' => 'icon-steam.png',
                'icon_buk' => 'ri-steam-fill',
                'id' => 'steam-link',
                'alt' => 'steam',
                'title' => 'Mervyn on Steam',
                'rel' => 'me',
                'panel_links' => NULL
            ),
            array(
                'url' => '/blog',
                'icon' => 'icon-document.png',
                'icon_buk' => 'ri-file-list-3-line',
                'id' => 'blog-link',
                'alt' => 'blog',
                'title' => 'My Blog',
                'panel_links' => NULL,
                'target' => '_self'
            ),
            array(
                'url' => '#panel-other-links',
                'icon' => 'icon-other.png',
                'icon_buk' => 'bi-globe',
                'id' => 'other-links',
                'alt' => 'other',
                'title' => 'Everywhere else',
                'panel_links' => array('a')
            ),
            array(
                'url' => '#panel-support',
                'icon' => 'icon-money.png',
                'icon_buk' => 'bi-currency-dollar',
                'id' => 'support-me',
                'alt' => 'support',
                'title' => 'Support me',
                'panel_links' => array('b')
            ),
        ],
        'professional' => [
            array(
                'url' => 'https://renfox.s3.amazonaws.com/files/ref/resume.pdf',
                'icon' => 'icon-document.png',
                'icon_buk' => 'ri-file-copy-2-line',
                'id' => 'resume-link',
                'alt' => 'resume',
                'title' => 'My Resume',
                'panel_links' => NULL
            ),
            array(
                'url' => 'https://www.linkedin.com/in/renfox',
                'icon' => 'icon-linkedin.png',
                'icon_buk' => 'ri-linkedin-fill',
                'id' => 'linkedin-link',
                'alt' => 'linkedin',
                'title' => 'Ren Fox on LinkedIn',
                'panel_links' => NULL
            ),
            array(
                'url' => '#panel-email-link',
                'icon' => 'icon-email.png',
                'icon_buk' => 'ri-mail-line',
                'id' => 'email-link',
                'alt' => 'email',
                'title' => 'Email me',
                'panel_links' => array('a')
            ),
        ]
    ];

    $panels = [
        'public' => [
            'panel-other-links' => array(
                array(
                    'label' => 'Tumblr',
                    'url' => 'https://tumblr.mervyn.online/',
                    'title' => 'mervynfoxe',
                    'rel' => 'me'
                ),
                array(
                    'label' => 'Cohost (' . $ch_cd['header'] . ')',
                    'url' => $ch_cd['link'],
                    'title' => 'mervyn'
                ),
                array(
                    'label' => 'Mastodon',
                    'url' => 'https://yiff.life/@mervyn',
                    'title' => '@mervyn@yiff.life',
                    'rel' => 'me'
                ),
                array(
                    'label' => 'Flickr',
                    'url' => 'https://www.flickr.com/photos/mervynfoxe',
                    'title' => 'Mervyn Fox',
                    'rel' => 'me'
                ),
                array(
                    'label' => 'Instagram',
                    'url' => 'https://www.instagram.com/mervynfoxe/',
                    'title' => 'mervynfoxe',
                    'rel' => 'me'
                ),
                array(
                    'label' => 'Discord',
                    'url' => NULL,
                    'title' => 'mervyn'
                ),
                array(
                    'label' => 'Telegram',
                    'url' => 'https://t.me/MervynFoxe',
                    'title' => '@MervynFoxe'
                ),
                array(
                    'label' => 'Battle.net',
                    'url' => NULL,
                    'title' => 'MervynFoxe#1946'
                ),
                array(
                    'label' => 'Switch',
                    'url' => NULL,
                    'title' => 'SW-6318-7125-1032'
                ),
                array(
                    'label' => 'Email',
                    'class' => 'email-link',
                    'url' => '#',
                    'title' => '%email%'
                )
            ),
            'panel-support' => array(
                array(
                    'label' => NULL,
                    'url' => 'https://paypal.me/AMVPh34r',
                    'title' => 'PayPal'
                ),
                array(
                    'label' => NULL,
                    'url' => 'https://cash.app/$MervynFoxe',
                    'title' => 'Cash App'
                ),
                array(
                    'label' => NULL,
                    'url' => 'https://ko-fi.com/mervyn',
                    'title' => 'Ko-fi'
                ),
    //            array(
    //                'label' => NULL,
    //                'url' => 'https://streamlabs.com/mervynfoxe/tip',
    //                'title' => 'Streamlabs'
    //            ),
            )
        ],
        'professional' => [
            'panel-email-link' => [
                [
                    'label' => NULL,
                    'class' => 'email-link',
                    'url' => '#',
                    'title' => '%email%'
                ]
            ]
        ]
    ];

    $link_set = $links[$environment];
    $panel_set = $panels[$environment];
?>

<div id="social">
    <?php
    foreach ($link_set as $item):
        $item = (object)$item;
        ?>
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
    <?php endforeach; ?>
</div>

<div class="panel-group" id="socialPanels">
    <div class="panel panel-default">
        <?php foreach ($panel_set as $id => $links): ?>
        <div id="<?= $id ?>" class="panel-collapse collapse">
            <div class="panel-body flex-container">
                    <?php
                foreach ($links as $link):
                    $link = (object)$link;
                    ?>
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
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php if ($environment === 'public'): ?>
    <div class="panel panel-default nobg">
        <div id="codePanel" class="panel-collapse collapse">
            <div class="panel-body encoded">
                Bu nera'g lbh n fzneg bar? Fbeel ohg V'z gbb ynml gb npghnyyl qb fbzrguvat pbby urer.
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
