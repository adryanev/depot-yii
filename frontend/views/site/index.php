<?php

/* @var $this yii\web\View */

$this->title = 'Selamat Datang';
?>
<div class="section home">
    <div class="container">
        <div class="row home-row">
            <div class="col-12 d-block d-md-none">
                <a href="#">
                    <img alt="mobile hero" class="mobile-hero rounded"
                         src="<?= Yii::getAlias('@web/' . 'images/galon-pusing.png') ?>"/>
                </a>
            </div>

            <div class="col-12 col-xl-4 col-lg-5 col-md-6">
                <div class="home-text">
                    <div class="display-1">Solusi Antar Jemput Galon</div>
                    <p class="white mb-5">
                        Depot adalah aplikasi antar jemput galon yang memanfaatkan teknologi terkini.
                    </p>
                    <?php if (!Yii::$app->user->isGuest): ?>
                        <?= \yii\bootstrap4\Html::a('Pesan Sekarang!', ['/pemesanan/pesan'], ['class' => 'btn btn-outline-semi-light btn-xl']) ?>
                    <?php else: ?>
                        <?= \yii\bootstrap4\Html::a('Daftar Sekarang!', ['site/signup'], ['class' => 'btn btn-outline-semi-light btn-xl']) ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-xl-7 offset-xl-1 col-lg-7 col-md-6  d-none d-md-block">
                <a href="#">
                    <img class="rounded" alt="hero" src="<?= Yii::getAlias('@web/' . 'images/galon-pusing.png') ?>"/>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 p-0">
                <div class="owl-container">
                    <div class="owl-carousel home-carousel">
                        <div class="card">
                            <div class="card-body text-center">
                                <div>
                                    <i class="iconsmind-Money large-icon"></i>
                                    <h5 class="mb-0 font-weight-semibold">
                                        Murah
                                    </h5>
                                </div>
                                <div>
                                    <p class="detail-text">
                                        Harga pengisisan dan antar jemput murah.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body text-center">
                                <div>
                                    <i class="iconsmind-Line-Chart2 large-icon"></i>
                                    <h5 class="mb-0 font-weight-semibold">
                                        Cepat
                                    </h5>
                                </div>
                                <div>
                                    <p class="detail-text">
                                        Pemesanan Langsung di Proses.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body text-center">
                                <div>
                                    <i class="iconsmind-Three-ArrowFork large-icon"></i>
                                    <h5 class="mb-0 font-weight-semibold">
                                        Terjamin
                                    </h5>
                                </div>
                                <div>
                                    <p class="detail-text">
                                        Keamanan dan kebersihan air anda terjamin.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body text-center">
                                <div>
                                    <i class="iconsmind-Environmental large-icon"></i>
                                    <h5 class="mb-0 font-weight-semibold">
                                        Sehat
                                    </h5>
                                </div>
                                <div>
                                    <p class="detail-text">
                                        Kandungan mineral yang seimbang untuk tubuh anda.
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

    <a class="btn btn-circle btn-outline-semi-light hero-circle-button scrollTo" href="#features" id="homeCircleButton"><i
                class="simple-icon-arrow-down"></i></a>
</div>



<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 mb-4">
                <h1 class="heading-team">Meet the Team</h1>
                <p>
                    Perkenalkan Anggota Kelompok kami!
                </p>
            </div>

            <div class="col-12 col-lg-7 offset-0 offset-lg-1 pl-0 pr-0">
                <div class="owl-container">
                    <div class="owl-carousel team-carousel">
                        <?php
                        foreach ($karyawan as $team):

                        ?>
                        <div class="card">
                            <div class="position-relative">
                                <?=\yii\bootstrap4\Html::img(Yii::getAlias('@web/upload/'.$team->foto),['class'=>'card-img-top'])?>
                                <span class="badge badge-pill badge-theme-1 position-absolute badge-top-left">Karyawan</span>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-4"><?=$team['nama']?></h6>
                                <footer>
                                    <p class="text-muted text-small mb-0 font-weight-light">
                                        Developer
                                    </p>
                                </footer>
                            </div>
                        </div>
                        <?php
                        endforeach;
                        ?>

                    </div>
                    <div class=" slider-nav text-center">
                        <a href="#" class="left-arrow owl-prev">
                            <i class="simple-icon-arrow-left"></i>
                        </a>
                        <div class="slider-dot-container"></div>
                        <a href="#" class="right-arrow owl-next">
                            <i class="simple-icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





