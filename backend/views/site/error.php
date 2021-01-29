<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$posTag = strpos($name, '#');
$substring = substr($name, $posTag + 1, '3');
?>

<div class="form-side">
    <div class="text-center">
        <?=Html::a('<span class="logo-single"></span>',Yii::$app->homeUrl)?>

        <h6 class="mb-4">Ups. Sepertinya terjadi kesahalan.</h6>
        <p class="mb-0 text-muted text-small mb-0">Kode kesalahan</p>
        <p class="display-1 font-weight-bold mb-5">
            <?= $substring ?>
        </p>
        <?=Html::a('KEMBALI KE BERANDA',Yii::$app->homeUrl,['class'=>'btn btn-primary btn-lg btn-shadow'])?>
    </div>

</div>