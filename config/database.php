<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
     */

    'default'     => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
     */

    'connections' => [

        'sqlite'                   => [
            'driver'                  => 'sqlite',
            'database'                => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix'                  => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql'                    => [
            'driver'         => 'mysql',
            'host'           => env('DB_HOST', '127.0.0.1'),
            'port'           => env('DB_PORT', '3306'),
            'database'       => env('DB_DATABASE', 'forge'),
            'username'       => env('DB_USERNAME', 'forge'),
            'password'       => env('DB_PASSWORD', ''),
            'unix_socket'    => env('DB_SOCKET', ''),
            'charset'        => 'utf8mb4',
            'collation'      => 'utf8mb4_unicode_ci',
            'prefix'         => '',
            'prefix_indexes' => true,
            'strict'         => true,
            'engine'         => null,
            // 'options'        => array_filter([
            //     PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            // ]),
        ],

        'task'                     => [
            'driver'      => 'mysql',
            'host'        => env('TASK_HOST', '127.0.0.1'),
            'port'        => env('TASK_PORT', '3306'),
            'database'    => env('TASK_DATABASE', 'forge'),
            'username'    => env('TASK_USERNAME', 'forge'),
            'password'    => env('TASK_PASSWORD', ''),
            'unix_socket' => env('TASK_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],

        'sitios'                   => [
            'driver'      => 'mysql',
            'host'        => env('SITIOS_HOST', '127.0.0.1'),
            'port'        => env('SITIOS_PORT', '3306'),
            'database'    => env('SITIOS_DATABASE', 'forge'),
            'username'    => env('SITIOS_USERNAME', 'forge'),
            'password'    => env('SITIOS_PASSWORD', ''),
            'unix_socket' => env('SITIOS_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],

        'ework'                    => [
            'driver'      => 'mysql',
            'host'        => env('EWORK_HOST', '127.0.0.1'),
            'port'        => env('EWROK_PORT', '3306'),
            'database'    => env('EWORK_DATABASE', 'forge'),
            'username'    => env('EWORK_USERNAME', 'forge'),
            'password'    => env('EWORK_PASSWORD', ''),
            'unix_socket' => env('EWORK_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'sgc'                      => [
            'driver'      => 'mysql',
            'host'        => env('SGC_HOST', '127.0.0.1'),
            'port'        => env('SGC_PORT', '3306'),
            'database'    => env('SGC_DATABASE', 'forge'),
            'username'    => env('SGC_USERNAME', 'forge'),
            'password'    => env('SGC_PASSWORD', ''),
            'unix_socket' => env('SGC_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => false,
            'engine'      => null,
        ],
        'portal'                   => [
            'driver'      => 'mysql',
            'host'        => env('PORTAL_HOST', '127.0.0.1'),
            'port'        => env('PORTAL_PORT', '3306'),
            'database'    => env('PORTAL_DATABASE', 'forge'),
            'username'    => env('PORTAL_USERNAME', 'forge'),
            'password'    => env('PORTAL_PASSWORD', ''),
            'unix_socket' => env('PORTAL_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => false,
            'engine'      => null,
        ],
        'plataforma'               => [
            'driver'      => 'mysql',
            'host'        => env('PLATAFORMA_HOST', '127.0.0.1'),
            'port'        => env('PLATAFORMA_PORT', '3306'),
            'database'    => env('PLATAFORMA_DATABASE', 'forge'),
            'username'    => env('PLATAFORMA_USERNAME', 'forge'),
            'password'    => env('PLATAFORMA_PASSWORD', ''),
            'unix_socket' => env('PLATAFORMA_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'psa'                      => [
            'driver'      => 'mysql',
            'host'        => env('PSA_HOST', '127.0.0.1'),
            'port'        => env('PSA_PORT', '3306'),
            'database'    => env('PSA_DATABASE', 'forge'),
            'username'    => env('PSA_USERNAME', 'forge'),
            'password'    => env('PSA_PASSWORD', ''),
            'unix_socket' => env('PSA_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'repositorio'              => [
            'driver'      => 'mysql',
            'host'        => env('REPOSITORIO_HOST', '127.0.0.1'),
            'port'        => env('REPOSITORIO_PORT', '3306'),
            'database'    => env('REPOSITORIO_DATABASE', 'forge'),
            'username'    => env('REPOSITORIO_USERNAME', 'forge'),
            'password'    => env('REPOSITORIO_PASSWORD', ''),
            'unix_socket' => env('REPOSITORIO_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'entel_g_redes_inventario' => [
            'driver'      => 'mysql',
            'host'        => env('ENTEL_G_REDES_INVENTARIO_HOST', '127.0.0.1'),
            'port'        => env('ENTEL_G_REDES_INVENTARIO_PORT', '3306'),
            'database'    => env('ENTEL_G_REDES_INVENTARIO_DATABASE', 'forge'),
            'username'    => env('ENTEL_G_REDES_INVENTARIO_USERNAME', 'forge'),
            'password'    => env('ENTEL_G_REDES_INVENTARIO_PASSWORD', ''),
            'unix_socket' => env('ENTEL_G_REDES_INVENTARIO_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'control_cambios'          => [
            'driver'      => 'mysql',
            'host'        => env('CONTROLCAMBIO_HOST', '127.0.0.1'),
            'port'        => env('CONTROLCAMBIO_PORT', '3306'),
            'database'    => env('CONTROLCAMBIO_DATABASE', 'forge'),
            'username'    => env('CONTROLCAMBIO_USERNAME', 'forge'),
            'password'    => env('CONTROLCAMBIO_PASSWORD', ''),
            'unix_socket' => env('CONTROLCAMBIO_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'providers_ticket'         => [
            'driver'      => 'mysql',
            'host'        => env('PROVIDER_TICKET_HOST', '127.0.0.1'),
            'port'        => env('PROVIDER_TICKET_PORT', '3306'),
            'database'    => env('PROVIDER_TICKET_DATABASE', 'forge'),
            'username'    => env('PROVIDER_TICKET_USERNAME', 'forge'),
            'password'    => env('PROVIDER_TICKET_PASSWORD', ''),
            'unix_socket' => env('PROVIDER_TICKET_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'fomulario_online'         => [
            'driver'      => 'mysql',
            'host'        => env('FORMULARIO_ONLINE_HOST', '127.0.0.1'),
            'port'        => env('FORMULARIO_ONLINE_PORT', '3306'),
            'database'    => env('FORMULARIO_ONLINE_DATABASE', 'forge'),
            'username'    => env('FORMULARIO_ONLINE_USERNAME', 'forge'),
            'password'    => env('FORMULARIO_ONLINE_PASSWORD', ''),
            'unix_socket' => env('FORMULARIO_ONLINE_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_general_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'control_pep'              => [
            'driver'      => 'mysql',
            'host'        => env('CONTROL_PEP_HOST', '127.0.0.1'),
            'port'        => env('CONTROL_PEP_PORT', '3306'),
            'database'    => env('CONTROL_PEP_DATABASE', 'forge'),
            'username'    => env('CONTROL_PEP_USERNAME', 'forge'),
            'password'    => env('CONTROL_PEP_PASSWORD', ''),
            'unix_socket' => env('CONTROL_PEP_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_general_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'ticket_ingenieria'        => [
            'driver'      => 'mysql',
            'host'        => env('TICKET_INGENIERIA_HOST', '127.0.0.1'),
            'port'        => env('TICKET_INGENIERIA_PORT', '3306'),
            'database'    => env('TICKET_INGENIERIA_DATABASE', 'forge'),
            'username'    => env('TICKET_INGENIERIA_USERNAME', 'forge'),
            'password'    => env('TICKET_INGENIERIA_PASSWORD', ''),
            'unix_socket' => env('TICKET_INGENIERIA_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_general_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'reports'        => [
            'driver'      => 'mysql',
            'host'        => env('REPORTS_HOST', '127.0.0.1'),
            'port'        => env('REPORTS_PORT', '3306'),
            'database'    => env('REPORTS_DATABASE', 'forge'),
            'username'    => env('REPORTS_USERNAME', 'forge'),
            'password'    => env('REPORTS_PASSWORD', ''),
            'unix_socket' => env('REPORTS_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_general_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'itos'        => [
            'driver'      => 'mysql',
            'host'        => env('ITOS_HOST', '127.0.0.1'),
            'port'        => env('ITOS_PORT', '3306'),
            'database'    => env('ITOS_DATABASE', 'forge'),
            'username'    => env('ITOS_USERNAME', 'forge'),
            'password'    => env('ITOS_PASSWORD', ''),
            'unix_socket' => env('ITOS_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_general_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],
        'surrender'        => [
            'driver'      => 'mysql',
            'host'        => env('SURRENDER_HOST', '127.0.0.1'),
            'port'        => env('SURRENDER_PORT', '3306'),
            'database'    => env('SURRENDER_DATABASE', 'forge'),
            'username'    => env('SURRENDER_USERNAME', 'forge'),
            'password'    => env('SURRENDER_PASSWORD', ''),
            'unix_socket' => env('SURRENDER_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_general_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],

        'pgsql'                    => [
            'driver'         => 'pgsql',
            'host'           => env('DB_HOST', '127.0.0.1'),
            'port'           => env('DB_PORT', '5432'),
            'database'       => env('DB_DATABASE', 'forge'),
            'username'       => env('DB_USERNAME', 'forge'),
            'password'       => env('DB_PASSWORD', ''),
            'charset'        => 'utf8',
            'prefix'         => '',
            'prefix_indexes' => true,
            'schema'         => 'public',
            'sslmode'        => 'prefer',
        ],

        'sqlsrv'                   => [
            'driver'         => 'sqlsrv',
            'host'           => env('DB_HOST', 'localhost'),
            'port'           => env('DB_PORT', '1433'),
            'database'       => env('DB_DATABASE', 'forge'),
            'username'       => env('DB_USERNAME', 'forge'),
            'password'       => env('DB_PASSWORD', ''),
            'charset'        => 'utf8',
            'prefix'         => '',
            'prefix_indexes' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
     */

    'migrations'  => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
     */

    'redis'       => [

        'client'  => env('REDIS_CLIENT', 'predis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'predis'),
        ],

        'default' => [
            'host'     => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port'     => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DB', 0),
        ],

        'cache'   => [
            'host'     => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port'     => env('REDIS_PORT', 6379),
            'database' => env('REDIS_CACHE_DB', 1),
        ],

    ],

];
