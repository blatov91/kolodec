<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'language' => 'ru',
    'defaultRoute' => 'default',
    'layout' => 'kolodec',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '4aAUYj0RSVSH5haIGl1DzXtxxSfwWdHt',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '' => 'default/index',
                '<a:(index|photo|calculator|contact|faq|forum|documents|brigade)>' => 'default/<a>',
                'login' => 'user-management/auth/login',
                'registration' => 'user-management/auth/registration',
                '<c:(gii)>' => '<c>',
                '<c:\w+>' => '<c>/index',
                '<c:\w+>/<a:\w+>/<id:\d+>' => '<c>/<a>',
                '<c:\w+>/<a:\w+>' => '<c>/<a>',
                '<m:.+>/<c:.+>/<a:.+>' => '<m>/<c>/<a>',
                '<m:.+>/<c:.+>/<a:.+>/<id:\d+>' => '<m>/<c>/<a>',
            ],
        ],
        'i18n'=>[
            'translations' => [
                'view'=>[
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@app/i18n",
                    'sourceLanguage' => 'ru_RU',
                    'fileMap' => [
                        'view'=>'view.php',
                    ]
                ],
                'model'=>[
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@app/i18n",
                    'sourceLanguage' => 'ru_RU',
                    'fileMap' => [
                        'model'=>'model.php',
                    ]
                ],
            ]
        ],
        'user' => [
            'class' => 'webvimark\modules\UserManagement\components\UserConfig',

            // Comment this if you don't want to record user logins
            'on afterLogin' => function($event) {
                \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
            }
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'modules'=>[
        'user-management' => [
            'class' => 'webvimark\modules\UserManagement\UserManagementModule',

            // Here you can set your handler to change layout for any controller or action
            // Tip: you can use this event in any module
            'on beforeAction'=>function(yii\base\ActionEvent $event) {
                if ( $event->action->uniqueId == 'user-management/auth/login' )
                {
                    $event->action->controller->layout = 'loginLayout.php';
                };
            },

            'registrationRegexp' => '/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
