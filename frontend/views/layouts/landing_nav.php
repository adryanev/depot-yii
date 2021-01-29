<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

?>
    <nav class="landing-page-nav">
        <div class="container d-flex align-items-center justify-content-between">
            <?= Html::a(' <span class="white"></span>
                <span class="dark"></span>', Yii::$app->homeUrl, ['class' => 'navbar-logo pull-left']) ?>
            <ul class="navbar-nav d-none d-lg-flex flex-row">
                <li class="nav-item <?= $action === 'fitur' ? 'active' : '' ?>">
                    <?= Html::a('FITUR', ['site/fitur']) ?>
                </li>

                <li class="nav-item <?= $action === 'harga' ? 'active' : '' ?>">
                    <?= Html::a('HARGA', ['site/harga']) ?>
                </li>

                <?php if (Yii::$app->user->isGuest): ?>
                    <li class="nav-item mr-3 <?= $action === 'login' ? 'active' : '' ?>">
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
                    <li class="nav-item pl-2">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-outline-semi-light btn-sm pr-4 pl-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?=Yii::$app->user->identity->username?>
                            </a>
                            <div class="dropdown-menu">
                                <?=Html::a('Profil',['profil/update'],['class'=>'dropdown-item'])?>
                                <?=Html::a('Keluar',['site/logout'],['class'=>'dropdown-item','data-method'=>'POST'])?>
                            </div>
                        </div>

                    </li>
                <?php endif ?>
            </ul>


            <a href="#" class="mobile-menu-button">
                <i class="simple-icon-menu"></i>
            </a>
        </div>
    </nav>
<?php

//NavBar::begin([
//    'brandImage' => Yii::getAlias('@web/img/logo-white.svg'),
//    'brandUrl' => Yii::$app->homeUrl,
//
//    'options' => [
//        'class' => 'landing-page-nav',
//    ],
//    'brandOptions'=>['class'=>'navbar-logo pull-left'],
//
//    'innerContainerOptions'=>['class'=>'container d-flex align-items-center justify-content-between']
//]);
//$menuItems = [
//    ['label' => 'Home', 'url' => ['/site/index'],'options'=>['class'=>'']],
//    ['label' => 'About', 'url' => ['/site/about'],'options'=>['class'=>'']],
//    ['label' => 'Contact', 'url' => ['/site/contact'],'options'=>['class'=>'']],
//];
//if (Yii::$app->user->isGuest) {
//    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
//    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
//} else {
//    $menuItems[] = '<li>'
//        . Html::beginForm(['/site/logout'], 'post')
//        . Html::submitButton(
//            'Logout (' . Yii::$app->user->identity->username . ')',
//            ['class' => 'btn btn-link logout']
//        )
//        . Html::endForm()
//        . '</li>';
//}
//echo Nav::widget([
//    'options' => ['class' => 'navbar-nav d-none d-lg-flex flex-row'],
//    'items' => $menuItems,
//]);
//NavBar::end();
