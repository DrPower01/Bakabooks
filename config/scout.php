<?php
// File: config/scout.php

return [
    'driver' => env('SCOUT_DRIVER', 'tntsearch'),

    'tntsearch' => [
        'storage'  => storage_path('searchindex/'), // Ensure this directory exists and is writable
        'fuzziness' => env('TNTSEARCH_FUZZINESS', false),
        'fuzzy' => [
            'prefix_length' => 2,
            'max_expansions' => 50,
            'distance' => 2
        ],
        'asYouType' => false,
        'searchBoolean' => env('TNTSEARCH_BOOLEAN', false),
    ],
];