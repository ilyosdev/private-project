<?php

    $params = array_merge(
        require __DIR__ . '/../../common/config/params.php',
        require __DIR__ . '/../../common/config/params-local.php',
        require __DIR__ . '/params.php',
        require __DIR__ . '/params-local.php'
    );

    return [
        'language'            => 'uz',
        'id'                  => 'app-backend',
        'name'                => 'RIDDIN',
        'basePath'            => dirname(__DIR__),
        'controllerNamespace' => 'backend\controllers',
        'bootstrap'           => ['log'],
        'modules'             => [
            'gridview' => ['class' => '\kartik\grid\Module'],
        ],
        'components'          => [
            'ltn'           => [
                'class' => 'frontend\components\LtnComponent'
            ],
            'request'       => [
                'baseUrl'   => '/admin',
                'csrfParam' => '_csrf-backend',
            ],
            'user'          => [
                'identityClass'   => 'common\models\User',
                'enableAutoLogin' => true,
                'identityCookie'  => ['name' => '_identity-backend', 'httpOnly' => true],
            ],
            'session'       => [
                'name' => 'advanced-backend',
            ],
            'log'           => [
                'traceLevel' => YII_DEBUG ? 3 : 0,
                'targets'    => [
                    [
                        'class'  => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'errorHandler'  => [
                'errorAction' => 'site/error',
            ],
            'urlManager'    => [
                'class'               => '\yii\web\UrlManager',
                'showScriptName'      => false,
                'enablePrettyUrl'     => true,
                'enableStrictParsing' => true,
                'rules'               => [
                    ''                                                          => '/site/index',
                    '<controller>'                                              => '<controller>',
                    '<controller>/<action>'                                     => '<controller>/<action>',
                    '<controller>/<action>/<id:\d+>'                            => '<controller>/<action>',
                    '<controller>/<action:\d+>?<id:\d+>'                        => '<controller>/<action>',
                    '<controller>/<action>/<s:\d+>'                             => '<controller>/<action>',
                    '<controller>/<action>/<action:\d+>&<id:\d+>&<days:\d+>'    => '<controller>/<action>',
                    '<controller>/<action>/<id:\d+>/<title>'                    => '<controller>/<action>',
                    '<controller>/<id:\d+>/<title>'                             => '<controller>/index',
                    '<controller>/<action>/<params:\S+>'                        => '<controller>/<action>',
                    '<controller>/<action>/<folder_id:\d+>/<lang:\s+>/<id:\d+>' => '<controller>/<action>',
                ],
            ],
            'cacheFrontend' => [
                'class'     => 'yii\caching\FileCache',
                'cachePath' => Yii::getAlias('@frontend') . '/runtime/cache'
            ],
            'i18n'          => [
                'translations' => [
                    '*'   => [
                        'class'    => 'yii\i18n\PhpMessageSource',
                        'basePath' => '@backend/messages',
                        'fileMap'  => [
                            'app' => 'app.php',
                        ],
                    ],
                    'yii' => [
                        'class'          => 'yii\i18n\PhpMessageSource',
                        'basePath'       => "@backend/messages",
                        'sourceLanguage' => 'en',
                        'fileMap'        => [
                            'yii' => 'yii.php',
                        ],
                    ]
                ],
            ],
            'formatter'     => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
            'pager'         => [
                'class'          => 'yii\widgets\LinkPager',
                'firstPageLabel' => 'First',
                'lastPageLabel'  => 'Last'
            ],
        ],
        'container'           => [
            'definitions' => [
                'yii\widgets\LinkPager' => 'yii\bootstrap4\LinkPager',
            ],
        ],
        'controllerMap'       => [
            'elfinder' => [
                'class'  => 'mihaildev\elfinder\Controller',
                'access' => ['@'],
                'roots'  => [
                    [
                        'baseUrl'  => '',
                        'basePath' => Yii::getAlias('@frontend') . "/web/",
                        'path'     => 'uploads',
                        'name'     => 'Global',
                    ],
                    [
                        'baseUrl'  => '',
                        'basePath' => Yii::getAlias('@frontend') . "/web/",
                        'path'     => 'old',
                        'name'     => 'Old',
                    ],
                ],
            ]
        ],

        'params' => $params,
    ];