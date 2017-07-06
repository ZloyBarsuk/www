<?php
use \kartik\datecontrol\Module;

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'admin',
    ],
    'sourceLanguage' => 'en',
    'language' => 'ru-RU',
    'name' => 'Inwiz',
    // 'baseUrl'=> '',
    'aliases' => [
      //  '@mdm/admin' =>'@vendor/mdmsoft/yii2-admin',
        // for example: '@mdm/admin' => '@app/extensions/mdm/yii2-admin-2.0.0',

    ],
    'components' => [

        'assetManager' => [
            //   'linkAssets' => true
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager '
        ],
        'i18n' => [
            'translations' => [


                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',


                ],
               /* 'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',


                ],*/
                /* 'menu*'  => [
                     'class'    => 'yii\i18n\PhpMessageSource',
                     'basePath' => '@app/messages',
                 ],*/

                'kvgrid' => [
                    'class' => 'yii\i18n\PhpMessageSource',
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
            'identityClass' => 'mdm\admin\models\User',
            'loginUrl' => ['admin/user/login'],
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
    'modules' => [

       'admin' => [
           'class' => 'mdm\admin\Module',
           'layout' => 'left-menu',
           'mainLayout' => '@app/views/layouts/main.php',
           'controllerMap' => [
               'assignment' => [
                   'class' => 'mdm\admin\controllers\AssignmentController',
                   /* 'userClassName' => 'app\models\User', */
                   'userClassName' => 'mdm\admin\models\User',
                   'idField' => 'id',
                   'usernameField' => 'username',
                  // 'fullnameField' => 'profile.name',
                  /* 'extraColumns' => [
                       [
                           'attribute' => 'name',
                           'label' => 'Full Name',
                           'value' => function($model, $key, $index, $column) {
                               return $model->profile->full_name;
                           },
                       ],
                       [
                           'attribute' => 'dept_name',
                           'label' => 'Department',
                           'value' => function($model, $key, $index, $column) {
                               return $model->profile->dept->name;
                           },
                       ],
                       [
                           'attribute' => 'post_name',
                           'label' => 'Post',
                           'value' => function($model, $key, $index, $column) {
                               return $model->profile->post->name;
                           },
                       ],
                   ],*/
                  // 'searchClass' => 'app\models\UserSearch'
                   'searchClass' => 'mdm\admin\models\searchs\User',
               ],
           ],

       ],
        'menus' => [
            'assignment' => [
                'label' => 'FUCKER MOTHER' // change label
            ],
            'route' => true, // disable menu route
        ],

        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',

            // format settings for displaying each date attribute (ICU format example)
            'displaySettings' => [
                Module::FORMAT_DATE => 'dd-MM-yyyy',
                Module::FORMAT_TIME => 'hh:mm:ss a',
                Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss a',
            ],

            // format settings for saving each date attribute (PHP format example)
            'saveSettings' => [
                Module::FORMAT_DATE => 'php:Y-m-d',//'php:U', // saves as unix timestamp
                Module::FORMAT_TIME => 'php:H:i:s',
                Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
            ],

            // set your display timezone
            // 'displayTimezone' => 'Asia/Kolkata',

            // set your timezone for date saved to db
            //  'saveTimezone' => 'UTC',

            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,

            // default settings for each widget from kartik\widgets used when autoWidget is true
            'autoWidgetSettings' => [
                Module::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]], // example
                Module::FORMAT_DATETIME => [], // setup if needed
                Module::FORMAT_TIME => [], // setup if needed
            ],

            // custom widget settings that will be used to render the date input instead of kartik\widgets,
            // this will be used when autoWidget is set to false at module or widget level.
            'widgetSettings' => [
                Module::FORMAT_DATE => [
                    'class' => 'yii\jui\DatePicker', // example
                    'options' => [
                        'dateFormat' => 'php:d-M-Y',
                        'options' => ['class' => 'form-control'],
                    ]
                ]
            ]
            // other settings
        ]
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            'admin/user/logout',
            'admin/user/security/logout',
                'gii/*',
                'user/*',
                'debug/*',
            'site/index', // home
        'site/captcha', // captcha in contact
        'user/security/*', // login and logout
        'user/recovery/*', // change password
        'user/settings/*', // edit self infos
        'user/profile/*', // user Profile

        ]
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
