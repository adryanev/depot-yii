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
<div class="row h-100">
    <div class="col-12 col-md-10 mx-auto my-auto">
        <div class="card auth-card">
            <div class="position-relative image-side ">
                <p class=" text-white h2">ANTAR JEMPUT GALON?</p>
                <p class="text-white mb-0">DEPOT-IN AJA!</p>
            </div>
            <div class="form-side">
                <div class="text-center">
                    <a href="Dashboard.Default.html">
                        <span class="logo-single"></span>
                    </a>

                    <h6 class="mb-4">Ups. Sepertinya terjadi kesahalan.</h6>
                    <p class="mb-0 text-muted text-small mb-0">Kode kesalahan</p>
                    <p class="display-1 font-weight-bold mb-5">
                        <?= $substring ?>
                    </p>
                    <?=Html::a('KEMBALI KE BERANDA',Yii::$app->homeUrl,['class'=>'btn btn-primary btn-lg btn-shadow'])?>
                </div>

            </div>
        </div>
    </div>
</div>
