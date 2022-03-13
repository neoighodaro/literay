<?php

return [
    'ray_host' => env('RAY_HOST', 'literay'),
    'domain' => env('LITERAY_DOMAIN'),

    'exclude_middlewares' => [
        \App\Http\Middleware\VerifyCsrfToken::class,
    ],

    'data_source' => 'file',

    'data_sources' => [
        'file' => [
            'path' => storage_path('logs'),
            'class' => \Neo\LiteRay\Sources\RayFileSource::class,
        ],
    ],
];
