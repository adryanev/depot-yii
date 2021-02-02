<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

\common\assets\DoreDashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - <?=Yii::$app->name?></title>
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

                        <p class=" text-white h2">Harap masuk.</p>

                        <p class="white mb-0">
                           Silahkan masuk dengan menggunakan kredensial anda.
                        </p>
                    </div>
                    <?= $content ?>
                </div>

            </div>
        </div>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
