<?php

return [
    '__name' => 'lib-user-auth-google-auth',
    '__version' => '0.1.0',
    '__git' => 'git@github.com:getmim/lib-user-auth-google-auth.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-user-auth-google-auth' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-user' => NULL
            ]
        ],
        'optional' => [],
        'composer' => [
            'sonata-project/google-authenticator' => '^2.3'
        ]
    ],
    'autoload' => [
        'classes' => [
            'LibUserAuthGoogleAuth\\Library' => [
                'type' => 'file',
                'base' => 'modules/lib-user-auth-google-auth/library'
            ],
            'LibUserAuthGoogleAuth\\Model' => [
                'type' => 'file',
                'base' => 'modules/lib-user-auth-google-auth/model'
            ]
        ],
        'files' => []
    ]
];
