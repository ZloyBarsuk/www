<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'sourceLanguage' => 'en',
    'language' => 'ru-RU',
    'name'=>'Inwiz',
    // 'baseUrl'=> '',
    'components' => [

        'assetManager' => [
            'linkAssets' => true
        ],
        'i18n'         => [
            'translations' => [


                'app*'   => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',


                ],
                'user'   => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',


                ],
                /* 'menu*'  => [
                     'class'    => 'yii\i18n\PhpMessageSource',
                     'basePath' => '@app/messages',
                 ],*/

                'kvgrid' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', //'@vendor/kartik-v/yii2-grid/messages',

                ],
            ],
        ],
        'request' => [
            'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'VMIQ1tNYucszbTOQpJp9hCfyWldKiIHd',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<scenario:\w+>/<model_id:\d+>' => '<controller>/<action>',

            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
