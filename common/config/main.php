<?php

use common\components\PusherComponent;
$pusher = parse_ini_file(__DIR__.'/../../configuration.ini');
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'id-ID',
    'sourceLanguage' => 'en',
    'timezone' => 'Asia/Jakarta',
    'container'=> [
        'definitions'=>[
            'kartik\file\FileInput'=>[
                'options' => ['multiple' => false],
                'pluginOptions'=>[
                    'theme'=>'explorer-fas',
                    'showUpload'=>false,
                    'allowedFileExtensions'=> ['jpeg','jpg','gif','tiff','svg','bmp','png'],
                    'previewFileType'=>'image',
                    'fileActionSettings'=>[
                        'showZoom'=>true,
                        'showRemove'=>false,
                        'showUpload'=>false,
                    ]

                ]
            ]
        ]

    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::class
        ],
        'formatter' => [
            'locale' => 'id_ID',
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',

        ],
        'i18n' => [
            'translations' => [
                'notification' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'notification' => 'notification.php',
                    ],
                ],
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'id-ID',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
                'error' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'id-ID',
                    'fileMap' => [
                        'error' => 'error.php',
                    ],
                ],
            ],
        ],
        'pusher'=>[
            'class'=> PusherComponent::class,
            'appId'=>$pusher['app_id'],
            'appKey'=>$pusher['key'],
            'appSecret'=>$pusher['secret'],
            'options' => ['encrypted' => true, 'cluster' => $pusher['cluster']]
        ],
//        'cart' => [
//            'class' => 'yii2mod\cart\Cart',
//            // you can change default storage class as following:
//            'storageClass' => [
//                'class' => 'yii2mod\cart\storage\DatabaseStorage',
//            ]
//        ],
        'cart' => [
            'class' => 'yz\shoppingcart\ShoppingCart',
            'cartId' => 'depot_cart',
        ]
    ],
];
