<?php

namespace common\assets;

use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class DoreLandingAsset extends AssetBundle
{

    public $sourcePath = '@common/assets/dore';
    public $js = [
        'js/vendor/landing-page/headroom.min.js',
        'js/vendor/landing-page/jquery.autoellipsis.js',
        'js/vendor/landing-page/jQuery.headroom.js',
        'js/vendor/landing-page/jquery.scrollTo.min.js',
        'js/dore.scripts.landingpage.js',
        'js/scripts.single.theme.js',
        'js/custom.js'
    ];

    public $depends = [
        DoreAsset::class
    ];
}
