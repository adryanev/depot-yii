<?php

/* @var $this \yii\web\View */
/* @var $content string */
$controller = $this->context->id;
$action = $this->context->action->id;
use backend\assets\AppAsset;
use yii\bootstrap4\Html;

use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap4\Modal;

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
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <?php $this->head() ?>
</head>
<body id="app-container" class="menu-default show-spinner">
<?php $this->beginBody() ?>

<?=$this->render('navbar',['controller'=>$controller,'action'=>$action])?>
<?=$this->render('sidebar',['controller'=>$controller,'action'=>$action])?>

<main class="default-transition">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1><?=Html::encode($this->title)?></h1>
                <?php if (isset($this->blocks['action-button'])): ?>
                    <?= $this->blocks['action-button'] ?>
                <?php endif; ?>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'navOptions'=>['class'=>'breadcrumb-container d-none d-sm-block d-lg-inline-block']
                ]) ?>
                <div class="separator mb-5"></div>

                <?=$content?>
            </div>

        </div>
    </div>
</main>
<?=\dominus77\sweetalert2\Alert::widget(['useSessionFlash'=>true])?>

<?php Modal::begin([
    'title' => '<span id="modalHeaderTitle"></span>',
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]
])?>
<div id="modalContent"></div>
<?php Modal::end() ?>

<?php $this->endBody() ?>
<script>
    var config = <?=\yii\helpers\Json::encode(Yii::$app->params['pusher']) ?>;
    var user = <?=\yii\helpers\Json::encode(Yii::$app->user->identity->username)?>;

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher(config.key, {
        cluster: config.cluster
    });

    if(user!== null){
        var channel = pusher.subscribe(user);
        channel.bind('pemesanan', function(data) {
            alert(JSON.stringify(data));
        });
    }

</script>

</body>
</html>
<?php $this->endPage() ?>
