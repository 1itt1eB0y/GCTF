<?php

return [
    // 'aliases' => [
    //     '@docker' => '@vendor/docker',
    // ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=172.18.0.3;dbname=yii2',
            'username' => 'yii2',
            'password' => 'toor',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com',
                'username' => '',
                'password' => '',
                // use 465 port as NO encryption
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'messageConfig'=>[ 
                'charset'=>'UTF-8', 
                'from'=>[''=>'system'] 
            ], 
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'db' => 'db',
            'sessionTable' => 'session',
        ],
    ],
];
