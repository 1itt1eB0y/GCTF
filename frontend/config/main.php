<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'aliases' => [
        '@docker' => '@vendor/docker/src',
    ],
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'authTimeout' => 5,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/index' => '/site/index',
                '/login' => '/site/login',
                '/logout' => '/site/logout',
                '/signup' => '/site/signup',
                '/challenge/submit' => '/challenge/submit',
                '/challenge/test' => '/challenge/test',
                '/file/<file:.*>'=> '/challenge/file',
                '/challenge/<id:\d+>' => '/challenge/view',
                '/challenge/<type:\w+>' => '/challenge/index',
                '/profile' => '/profile/index',
                '/profile/<type:email|password>' => '/profile/update',
            ],
        ],
    ],
    'params' => $params,
];
