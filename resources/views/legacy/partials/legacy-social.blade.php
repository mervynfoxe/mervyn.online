<?php
    // Social links array
    $links = [
        'public' => [
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
                'url' => 'https://bsky.app/profile/mervyn.online',
                'icon_buk' => 'ri-bluesky-fill',
                'id' => 'bsky-link',
                'alt' => 'bluesky',
                'title' => '@mervyn.online on Bluesky',
                'rel' => 'me',
                'panel_links' => NULL
            ),
            array(
                'url' => 'https://gts.mervyn.online/@fox',
                'icon_buk' => 'forkawesome-fediverse',
                'id' => 'fedi-link',
                'alt' => 'mastodon',
                'title' => '@fox@mervyn.online on Fedi',
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
                'url' => 'https://cdn.renfox.online/assets/doc/RenFox-Resume.pdf',
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
                    'label' => 'Code Forge',
                    'url' => 'https://git.mervyn.online/fox',
                    'title' => 'fox',
                    'rel' => 'me'
                ),
                array(
                    'label' => 'Tumblr',
                    'url' => 'https://tumblr.mervyn.online/',
                    'title' => 'mervynfoxe',
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
                    'label' => 'Twitter',
                    'url' => 'https://twitter.com/MervynFoxe',
                    'title' => 'mervynfoxe',
                    'rel' => 'me'
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
    <?php foreach ($link_set as $item): ?>
    <x-social-icon
        :url="$item['url']"
        :icon="$item['icon_buk']"
        :title="$item['title']"
        :alt="$item['alt']"
        :target="$item['target'] ?? '_blank'"
        :class="$item['class'] ?? NULL"
        :rel="$item['rel'] ?? NULL"
        :id="$item['id']"
        :icon-img="$item['icon'] ?? NULL"
        :panel-links="$item['panel_links'] ?? NULL"
    />
    <?php endforeach; ?>
</div>

<div class="panel-group" id="socialPanels">
    <div class="panel panel-default">
        <?php foreach ($panel_set as $id => $links): ?>
        <div id="<?= $id ?>" class="panel-collapse collapse">
            <div class="panel-body flex-container">
                <?php foreach ($links as $link): ?>
                    <x-panel-social-link
                        :header="$link['label'] ?? ''"
                        :url="$link['url'] ?? ''"
                        :label="$link['title']"
                        :target="$link['target'] ?? '_blank'"
                        :class="$link['class'] ?? NULL"
                        :rel="$link['rel'] ?? NULL"
                    />
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
