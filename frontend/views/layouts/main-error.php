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
        <?= $content ?>
    </div>
</main>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
