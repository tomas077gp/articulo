<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name'=>' Control de actividades',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
         'rbac' => 'dektrium\rbac\RbacWebModule',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
       /* 'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],*/
        'session' => [
            // this is the name of the session cookie used for login on the backend
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

        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],

    ],
	'modules' => [
            'user' => [
                'class' => 'dektrium\user\Module',
                'enableUnconfirmedLogin' => false,
                'confirmWithin' => 21600,
                'cost' => 12,
                'admins' => ['superadmin','marc']
            ],
            'audit' => [

                    'class' => 'bedezign\yii2\audit\Audit',
                    'accessUsers' => [1, 2, 3],

             ],
            'rbac' => [
                     'class' => 'dektrium\rbac\RbacConsoleModule',
            ],
            'gridview' => ['class' => 'kartik\grid\Module'],
        ],
    'params' => $params,
];
