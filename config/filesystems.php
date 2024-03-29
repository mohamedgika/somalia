<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),



    'disks' => [

        'profileauth' => [
            'driver' => 'local',
            'root' => public_path('profileauth'),
            'url'=>env('APP_URL').'/profileauth',
            'visibility' => 'public',
            'throw' => false,
        ],

        'ads' => [
            'driver' => 'local',
            'root' => public_path('ads'),
            'url'=>env('APP_URL').'/ads',
            'visibility' => 'public',
            'throw' => false,
        ],

        'category' => [
            'driver' => 'local',
            'root' => public_path('category'),
            'url'=>env('APP_URL').'/category',
            'visibility' => 'public',
            'throw' => false,
        ],

        'subcategory' => [
            'driver' => 'local',
            'root' => public_path('subcategory'),
            'url'=>env('APP_URL').'/subcategory',
            'visibility' => 'public',
            'throw' => false,
        ],

        'shop' => [
            'driver' => 'local',
            'root' => public_path('shop'),
            'url'=>env('APP_URL').'/shop',
            'visibility' => 'public',
            'throw' => false,
        ],

        'shopads' => [
            'driver' => 'local',
            'root' => public_path('shopads'),
            'url'=>env('APP_URL').'/shopads',
            'visibility' => 'public',
            'throw' => false,
        ],

        'slider' => [
            'driver' => 'local',
            'root' => public_path('slider'),
            'url'=>env('APP_URL').'/slider',
            'visibility' => 'public',
            'throw' => false,
        ],

        'blog' => [
            'driver' => 'local',
            'root' => public_path('blog'),
            'url'=>env('APP_URL').'/blog',
            'visibility' => 'public',
            'throw' => false,
        ],

        'country' => [
            'driver' => 'local',
            'root' => public_path('country'),
            'url'=>env('APP_URL').'/country',
            'visibility' => 'public',
            'throw' => false,
        ],

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],


        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
