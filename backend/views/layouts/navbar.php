<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left">
        <a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1" />
                <rect x="0.48" y="7.5" width="7" height="1" />
                <rect x="0.48" y="15.5" width="7" height="1" />
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1" />
                <rect x="1.56" y="7.5" width="16" height="1" />
                <rect x="1.56" y="15.5" width="16" height="1" />
            </svg>
        </a>

        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1" />
                <rect x="0.5" y="7.5" width="25" height="1" />
                <rect x="0.5" y="15.5" width="25" height="1" />
            </svg>
        </a>

    </div>


    <?=\yii\helpers\Html::a(' <span class="logo d-none d-xs-block"></span>
        <span class="logo-mobile d-block d-xs-none"></span>',Yii::$app->homeUrl,['class'=>'navbar-logo'])?>

    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">

            <div class="position-relative d-inline-block">
                <button class="header-icon btn btn-empty" type="button" id="notificationButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="simple-icon-bell"></i>
                    <span class="count">1</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-3 scroll position-absolute" id="notificationDropdown">

                    <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                        <a href="#">
                            <img src="<?=Yii::getAlias('@web/upload/default.png')?>" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                        </a>
                        <div class="pl-3 pr-2">
                            <a href="#">
                                <p class="font-weight-medium mb-1">Joisse Kaycee just sent a new comment!</p>
                                <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                <span class="name"><?=Yii::$app->user->identity->username?></span>
                <span>
                    <?=\yii\helpers\Html::img(Yii::getAlias('@web/upload/'.Yii::$app->user->identity->foto),['alt'=>'Foto Profil'])?>
                    </span>
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="#">Account</a>
                <a class="dropdown-item" href="#">Features</a>
                <a class="dropdown-item" href="#">History</a>
                <a class="dropdown-item" href="#">Support</a>
                <a class="dropdown-item" href="#">Sign out</a>
            </div>
        </div>
    </div>
</nav>