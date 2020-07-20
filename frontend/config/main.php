<?php

use yii\web\View;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language' => 'uz',
    'bootstrap' => ['log', 'assetsAutoCompress'],
    'controllerNamespace' => 'frontend\controllers',
    'container' => [
        'definitions' => [
            'yii\widgets\LinkPager' => 'yii\bootstrap4\LinkPager',
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'assetManager' => [
            // override bundles to use CDN :
            'bundles' => [
                'yii\bootstrap4\BootstrapAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0',
                    'css' => [
                        'css/bootstrap.min.css'
                    ],
                ],
                'yii\bootstrap4\BootstrapPluginAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0',
                    'js' => [
                        'js/bootstrap.bundle.min.js'
                    ],
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'assetsAutoCompress' => [
            'class' => 'skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
            'enabled' => false,
            'readFileTimeout' => 5,           //Time in seconds for reading each asset file

            'jsCompress' => true,        //Enable minification js in html code
            'jsCompressFlaggedComments' => true,        //Cut comments during processing js

            'cssCompress' => true,        //Enable minification css in html code

            'cssFileCompile' => true,        //Turning association css files
            'cssFileRemouteCompile' => false,       //Trying to get css files to which the specified path as the remote file, skchat him to her.
            'cssFileCompress' => true,        //Enable compression and processing before being stored in the css file
            'cssFileBottom' => false,       //Moving down the page css files
            'cssFileBottomLoadOnJs' => false,       //Transfer css file down the page and uploading them using js

            'jsFileCompile' => true,        //Turning association js files
            'jsFileRemouteCompile' => false,       //Trying to get a js files to which the specified path as the remote file, skchat him to her.
            'jsFileCompress' => true,        //Enable compression and processing js before saving a file
            'jsFileCompressFlaggedComments' => true,        //Cut comments during processing js

            'noIncludeJsFilesOnPjax' => true,        //Do not connect the js files when all pjax requests

            'htmlFormatter' => [
                'class' => 'skeeks\yii2\assetsAuto\formatters\html\TylerHtmlCompressor',
                'extra' => true,       //use more compact algorithm
                'noComments' => true,        //cut all the html comments
                'maxNumberRows' => 50000,       //The maximum number of rows that the formatter runs on
            ]
        ]
        ,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
