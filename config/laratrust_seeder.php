<?php

return [


    'role_structure' => [

        'superadmin' => [
            'users'                 => 'c,r,u,d',
            'orders'                => 'c,r,u,d',
            'warehouses'            => 'c,r,u,d',
            'warehouseorders'       => 'c,r,u,d',
            'drivers'               => 'c,r,u,d',
            'markets'               => 'c,r,u,d',
            'bills'                 => 'c,r,u,d',
            'dashboard'             => 'r',
        ],

        'warehouses' => [
            'warehouses'            => 'c,r,u,d',
            'warehouseorders'       => 'c,r,u,d',
        ],

        'drivers' => [
            'dashboard'             => 'r',
        ],

        'market' => [
            'dashboard'             => 'r',
        ],

    ],
    'permission_structure' => [
        'super' => [
            'users'                 => 'c,r,u,d',
            'orders'                => 'c,r,u,d',
            'warehouses'            => 'c,r,u,d',
            'warehouseorders'       => 'c,r,u,d',
            'drivers'               => 'c,r,u,d',
            'bills'                 => 'c,r,u,d',
            'markets'               => 'c,r,u,d',
            'dashboard'             => 'r',
        ],
    ],


    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
