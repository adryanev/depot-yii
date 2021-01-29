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

        <?php if (Yii::$app->user->isGuest): ?>
            <li class="nav-item mt-2 <?= $action === 'login' ? 'active' : '' ?>">
                <?= Html::a('MASUK', ['site/login']) ?>
            </li>
            <li class="nav-item pl-2 <?= $action === 'signup' ? 'active' : '' ?>">
                <?= Html::a('DAFTAR', ['site/signup'],
                    ['class' => 'btn btn-outline-semi-light btn-sm pr-4 pl-4']) ?>

            </li>

        <?php else: ?>

            <li class="nav-item mr-3 <?= $action === 'pesan' ? 'active' : '' ?>">
                <?= Html::a('PESAN', ['pesan/pesan']) ?>
            </li>
            <li class="nav-item mr-3 <?= $action === 'riwayat' ? 'active' : '' ?>">
                <?= Html::a('RIWAYAT', ['pesan/riwayat']) ?>
            </li>
            <li class="nav-item mt-2">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=Yii::$app->user->identity->nama?>
                    </a>
                    <div class="dropdown-menu">
                        <?=Html::a('Profil',['profil/update'],['class'=>'dropdown-item'])?>
                        <?=Html::a('Keluar',['site/logout'],['class'=>'dropdown-item','data-method'=>'POST'])?>
                    </div>
                </div>

            </li>
        <?php endif ?>
    </ul>
</div>