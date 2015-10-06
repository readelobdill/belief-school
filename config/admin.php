<?php
return [
    'menu' => [
        [
            'name' => 'Dashboard',
            'url' => 'admin.home',
            'icon' => 'circle-o'
        ],
        [
            'name' => 'Users',
            'icon' => 'circle-o',
            'children' => [
                [
                    'name' => 'List Users',
                    'url' => 'admin.users.list',
                ],
                [
                    'name' => 'Create User',
                    'url' => 'admin.users.create',
                ]
            ]
        ],
        [
            'name' => 'Modules',
            'icon' => 'circle-o',
            'url' => 'admin.modules.list'
        ]
    ]
];