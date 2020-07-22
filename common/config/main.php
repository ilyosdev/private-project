<?php
return [
    'name' => 'Riddin',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'telegram' => [
            'class' => 'aki\telegram\Telegram',
            'botToken' => '1273105986:AAE5K1PKG3552Hwy6pVWEGB3DqKa2z3us58',
        ],
    ],
];
