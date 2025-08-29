<?php

return [
    'secret' => env('NOCAPTCHA_SECRET'),
    'sitekey' => env('NOCAPTCHA_SITEKEY'),
    'version' => env('NOCAPTCHA_VERSION', 2), // <--- aquí indicamos la versión
    'options' => [
        'timeout' => 30,
    ],
];
