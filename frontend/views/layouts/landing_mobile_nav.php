<?php

use yii\bootstrap4\Html;

?>

<div class="mobile-menu">

    <?= Html::a('<span></span>', Yii::$app->homeUrl, ['class' => 'logo-mobile']) ?>
    <ul class="navbar-nav">
        <li class="nav-item <?= $action === 'fitur' ? 'active' : '' ?>">
            <?= Html::a('FITUR', ['site/fitur']) ?>
        </li>

        <li class="nav-item <?= $action === 'harga' ? 'active' : '' ?>">
            <?= Html::a('HARGA', ['site/harga']) ?>
        </li>

        <li class="nav-item">
            <div class="separator"></div>
        </li>
        <li class="nav-item mt-2 <?= $action === 'login' ? 'active' : '' ?>">
            <?= Html::a('MASUK', ['site/login']) ?>
        </li>

        <li class="nav-item <?= $action === 'signup' ? 'active' : '' ?>">
            <?= Html::a('DAFTAR', ['site/signup']) ?>
        </li>
    </ul>
</div>