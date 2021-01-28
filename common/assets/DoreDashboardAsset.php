<?php

namespace common\assets;

use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class DoreDashboardAsset extends AssetBundle
{

    public $sourcePath = '@common/assets/dore';
    public $js = [
        'js/dore.scripts.js',
        'js/scripts.single.theme.js',
        'js/custom.js'
    ];

    public $depends = [
        DoreAsset::class
    ];
}
