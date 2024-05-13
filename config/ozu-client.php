<?php

return [
    'api_host' => env('OZU_API_HOST', 'http://ozu.test/'),
    'api_key' => env('OZU_API_KEY'),
    'api_version' => env('OZU_API_VERSION', 'v3'),
    'website_key' => env('OZU_WEBSITE_KEY'),
    'collections' => [
        \App\Models\Page::class,
        \App\Models\Project::class
    ],
];
