<?php

return [
    'default' => 'sql_db',
    'connections' => [
        'sql_db' => [
            'driver' => env('DB_CONNECTION'),
            'host' => env('DB_HOST'),
            'port' =>env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => env('DB_CHARSET',''),
            'collation' => env('DB_COLLATION',''),
            'prefix' => '',
            'timezone' => env('DB_TIMEZONE',''),
            'strict' => env('DB_STRICT_MODE','')
        ],
        'mongodb' => array(
            'driver'   => 'mongodb',
            'host'     => env('MONGO_HOST', 'localhost'),
            'port'     => env('MONGO_PORT', 27017),
            'username' => env('MONGO_USERNAME', ''),
            'password' => env('MONGO_PASSWORD', ''),
            'database' => env('MONGO_DATABASE', ''),
            'options' => array(
                'db' => env('MONGO_AUTHDATABASE', '') //Sets the auth DB
            )
        ),
        'utalk_server' => array(
            'driver'   => 'mongodb',
            'host'     => env('UTALK_MONGO_HOST', 'localhost'),
            'port'     => env('UTALK_MONGO_PORT', 27017),
            'username' => env('UTALK_MONGO_USERNAME', ''),
            'password' => env('UTALK_MONGO_PASSWORD', ''),
            'database' => env('UTALK_MONGO_DATABASE', ''),
            'options' => array(
                'db' => env('UTALK_MONGO_AUTHDATABASE', '') //Sets the auth DB
            )
        ),
    ],
    'migrations' => 'migrations',
];
