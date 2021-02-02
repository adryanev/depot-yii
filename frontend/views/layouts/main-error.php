<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

\common\assets\DoreLandingAsset::register($this);
$action = $this->context->action->id;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - Depot</title>
    <?php $this->head() ?>
</head>
<body class="background show-spinner">
<?php $this->beginBody() ?>
<div class="fixed-background"></div>
<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">
                        <p class=" text-white h2">ANTAR JEMPUT GALON?</p>
                        <p class="text-white mb-0">DEPOT-IN AJA!</p>
                    </div>
                    <?=$content?>
                </div>
            </div>
        </div>
    </div>
</main>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
