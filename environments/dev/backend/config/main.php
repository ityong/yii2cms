<?php

$config = [
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //memcache缓存组件 我们的框架用到了memcache缓存哦，所以需要配置这个
        'memcache' => [
            'class' => 'yii\caching\MemCache',
            'useMemcached' =>0, //这里简单说明一下 0是memcache, 1是memcached 两个是php里不同的扩展
            'servers' => [
                [
                    'host' => '127.0.0.1',
                    'port' => 11211,
                    'weight' => 100,
                ]
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2cms',
            'username' => 'root',
            'password' => 'root',
            'tablePrefix' => 't_',
            'charset' => 'utf8mb4',
            'enableSchemaCache' => false,
        ],
    ]
];


if (YII_ENV_DEV || YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}



return $config;
