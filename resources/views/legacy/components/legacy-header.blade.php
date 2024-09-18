<?php
    $env = 'public';

    $text_arrs = [
        'public' => [
            'Web Dev',
            'Internet Fox',
            'Slacker',
            'Bad to the Bone',
            'Bad at Games',
            'Time-waster',
            'Coffee-consumer',
            //    'Lucio Main',
            'No one of Importance',
            'Never Sleeps',
            'Key Smasher',
            'Soft Friend',
            'Photo-taker',
        ],
        'professional' => [
            'Applications',
            'Websites',
            'Databases'
        ],
    ];

    $text_arr = $text_arrs[$env];
    if ($env === 'public') {
        $name = 'Mervyn Fox';
        shuffle($text_arr);
    } else {
        $name = 'Ren Fox';
    }
?>

<h1><?= $name ?></h1>
<p><?= implode(' | ', array_slice($text_arr, 0, 3)) ?></p>
