<?php
    $links = [
        'public' => [
            array(
                'url' => 'https://twitter.com/MervynFoxe',
                'icon' => 'icon-twitter.png',
                'id' => 'twitter-link',
                'alt' => 'birdsite',
                'title' => '@MervynFoxe on Twitter',
                'panel_links' => NULL
            ),
            array(
                'url' => 'https://steamcommunity.com/id/MervynFoxe',
                'icon' => 'icon-steam.png',
                'id' => 'steam-link',
                'alt' => 'steam',
                'title' => 'Mervyn on Steam',
                'panel_links' => NULL
            ),
            array(
                'url' => 'https://www.flickr.com/photos/mervynfoxe',
                'icon' => 'icon-flickr.png',
                'id' => 'flickr-link',
                'alt' => 'flickr',
                'title' => 'Mervyn Fox on Flickr',
                'panel_links' => NULL
            ),
            //	array(
            //		'url' => 'https://twitch.tv/mervynfoxe',
            //		'icon' => 'icon-twitch.png',
            //		'id' => 'twitch-link',
            //		'alt' => 'twitch',
            //		'title' => 'MervynFoxe on Twitch',
            //		'panel_links' => NULL
            //	),
            array(
                'url' => '#panel-other-links',
                'icon' => 'icon-other.png',
                'id' => 'other-links',
                'alt' => 'other',
                'title' => 'Everywhere else',
                'panel_links' => array('a')
            ),
            array(
                'url' => '#panel-support',
                'icon' => 'icon-money.png',
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
                'id' => 'resume-link',
                'alt' => 'resume',
                'title' => 'My Resume',
                'panel_links' => NULL
            ),
            array(
                'url' => 'https://www.linkedin.com/in/renfox',
                'icon' => 'icon-linkedin.png',
                'id' => 'linkedin-link',
                'alt' => 'linkedin',
                'title' => 'Ren Fox on LinkedIn',
                'panel_links' => NULL
            ),
            array(
                'url' => '#panel-email-link',
                'icon' => 'icon-email.png',
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
                'title' => 'mervynfoxe'
            ),
            array(
                'label' => 'Cohost',
                'url' => 'https://cohost.org/MervynFoxe',
                'title' => 'mervynfoxe'
            ),
            array(
                'label' => 'Instagram',
                'url' => 'https://www.instagram.com/mervynfoxe/',
                'title' => 'mervynfoxe'
            ),
            array(
                'label' => 'Discord',
                'url' => NULL,
                'title' => 'Mervyn#0827'
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
                'label' => '3DS',
                'url' => NULL,
                'title' => '4012-4350-8803'
            ),
            array(
                'label' => 'Switch',
                'url' => NULL,
                'title' => 'SW-6318-7125-1032'
            ),
            //		array(
            //			'label' => 'Mastodon',
            //			'url' => 'https://yiff.life/@mervyn',
            //			'title' => '@mervyn@yiff.life'
            //		),
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
            //		array(
            //			'label' => NULL,
            //			'url' => 'https://streamlabs.com/mervynfoxe/tip',
            //			'title' => 'Streamlabs'
            //		),
        )
    ],
    'professional' => [
        'panel-email-link' => [
            [
                'label' => NULL,
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
    <span><a href="<?= $item->url ?>" id="<?= $item->id ?>"
             title="<?= $item->title ?>"
             <?= !empty($item->panel_links) ? 'data-toggle="collapse" data-parent="#socialPanels"' : '' ?>
             target="_blank"><img src="{{ Vite::asset('resources/legacy/img/social/' . $item->icon) }}" alt="<?= $item->alt ?>"/></a></span>
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
                    <a href="<?= $link->url ?>" target="_blank"><?= $link->title ?></a>
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
