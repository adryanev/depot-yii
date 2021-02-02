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
<body class="show-spinner">
<?php $this->beginBody() ?>
<?= \dominus77\sweetalert2\Alert::widget(['useSessionFlash'=>true]) ?>
    <div class="landing-page">
        <?=$this->render('landing_mobile_nav',['action'=>$action])?>
        <div class="main-container">
            <?=$this->render('landing_nav',['action'=>$action])?>
            <div class="content-container" id="home">
                <?= $content ?>
                <?=$this->render('@frontend/views/layouts/footer')?>
            </div>


        </div>
    </div>
<?php $this->endBody() ?>
<script>
    <?php if(!Yii::$app->user->isGuest) : ?>
    var config = <?=\yii\helpers\Json::encode(Yii::$app->params['pusher']) ?>;
    var user = <?=\yii\helpers\Json::encode(Yii::$app->user->identity->username)?>;

    var pusher = new Pusher(config.key, {
        cluster: config.cluster
    });

    if(user!== null){
        var channel = pusher.subscribe(user);
        channel.bind('pemesanan', function(data) {
            var notifyConfig = {
                icon:data.icon,
                title:data.title,
                message:data.message,
                url:'<?=\yii\helpers\Url::to(['pemesanan/view'],true)?>'+'?id='+data.entity,
            };
            createNotification(notifyConfig);
        });
    }
    <?php endif; ?>

</script>

</body>
</html>
<?php $this->endPage() ?>
