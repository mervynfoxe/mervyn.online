<?php

return [
    'comments' => [
        // The API host server. Should be https://cusdis.com if using the hosted service,
        // or the domain you are hosting your own instance if self-hosted
        'data_host' => env('CUSDIS_DATA_HOST', 'https://cusdis.com'),

        // The app ID provided from your Cusdis dashboard
        'app_id' => env('CUSDIS_APP_ID', ''),
    ],
];
