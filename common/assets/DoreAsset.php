<?php
namespace common\assets;

use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\YiiAsset;

class DoreAsset extends AssetBundle
{

    public $sourcePath = '@common/assets/dore';

    public $css = [
        'font/iconsmind/style.css',
        'font/simple-line-icons/css/simple-line-icons.css',
        'css/vendor/bootstrap-stars.css',
        'css/vendor/owl.carousel.min.css',
        'css/vendor/bootstrap-float-label.min.css',
        'css/vendor/component-custom-switch.min.css',
        'css/vendor/jquery.contextMenu.min.css',
        'css/vendor/nouislider.min.css',
        'css/vendor/perfect-scrollbar.css',
        'css/vendor/slick.css',
        'css/vendor/video-js.css',

        'css/dore.light.blue.css',
        'css/main.css'
    ];

    public $js = [
        'js/dore-plugins/select.from.library.js',
        'js/vendor/jquery.contextMenu.min.js',
        'js/vendor/moment.min.js',
        'js/vendor/mousetrap.js',
        'js/vendor/nouislider.min.js',
        'js/vendor/owl.carousel.min.js',
        'js/vendor/perfect-scrollbar.min.js',
        'js/vendor/progressbar.min.js',
        'js/vendor/slick.min.js',
        'js/vendor/Sortable.js',
        'js/vendor/video.js',
        'js/vendor/videojs-youtube.min.js',
        'js/vendor/jquery.barrating.min.js',

    ];

    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        BootstrapPluginAsset::class
    ];
}