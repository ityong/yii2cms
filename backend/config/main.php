<?php

return [
    'id' => 'app-backend',
    'name' => 'alili后台管理系统',
    'basePath' => dirname(__DIR__),
    'language' => 'zh-CN',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Shanghai',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        "auth" => [
            'class' => 'auth\Module',
        ],
        "system" => [
            'class' => 'system\Module',
        ],
    ],
    "aliases" => [
        '@auth'   => '@backend/modules/auth',
        '@system' => '@backend/modules/system',
        '@backup' => '@backend/modules/backup',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => '8tPt7bDj244hrkwLdq5GvJg-08vkyo-ssss',
        ],
        'user' => [
            'identityClass' => 'auth\models\User',
            'loginUrl' => ['/auth/user/login'],
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        "authManager" => [
            "class" => 'auth\components\DbManager',
            "defaultRoles" => ["guest"],
        ],
        "urlManager" => [
            "enablePrettyUrl" => true,
            "enableStrictParsing" => false,
            "showScriptName" => false,
            "suffix" => "",
            "rules" => [
                "<controller:\w+>/<id:\d+>"=>"<controller>/view",
                "<controller:\w+>/<action:\w+>"=>"<controller>/<action>"
            ],
        ],
    ],
    'as access' => [
        'class' => 'auth\components\AccessControl',
        'allowActions' => [
            'auth/user/request-password-reset',
            'auth/user/reset-password'
        ]
    ],

];