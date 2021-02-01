<?php


namespace common\assets;


use yii\bootstrap4\BootstrapAsset;
use yii\web\YiiAsset;

class BootstrapNotifyAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@npm/bootstrap-notify';

    public $js =[
        'bootstrap-notify.min.js'
    ];

    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class
    ];
}