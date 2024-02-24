<?php

return [
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],

        'architects' => [
            'driver' => 'session',
            'provider' => 'architects',
        ],
    ],
];
