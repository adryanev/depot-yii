<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'id-ID',
    'sourceLanguage' => 'id-ID',
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
