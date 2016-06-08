<?php

$params = require(__DIR__ . '/params.php');
require_once( dirname(__FILE__) . '/../components/Authenticate.php');
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'nikkie',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => false,
        ],
		'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@app/mail',
			'useFileTransport' => false,//set this property to false to send mails to real email addresses
			//comment the following array to send mail using php's mail function
			'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'yanikblake@gmail.com',
            'password' => 'N@ruto123',
            'port' => '587',
            'encryption' => 'tls',
                        ],
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
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'rules' => [
			
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
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
