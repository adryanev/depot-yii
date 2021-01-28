<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'assetManager' => [
//            'bundles' => [
//                'yii\web\JqueryAsset' => [
//                    'sourcePath' => '@common/assets/dore',
//
//                    'js' => ['js/vendor/jquery-3.3.1.min.js']
//                ],
//                'yii\bootstrap4\BootstrapAsset' => [
//                    'sourcePath' => '@common/assets/dore',
//
//                    'css' => ['css/vendor/bootstrap.min.css'],
//                    'js' => ['js/vendor/bootstrap.bundle.min.js']
//                ]
//            ]
//        ],
    ],
];
