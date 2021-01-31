<?php
use yii\bootstrap4\Html;



?>


    <div class="section home subpage">
        <div class="container">
            <div class="row home-row">
                <div class="col-12 col-xl-5 col-lg-12 col-md-12">
                    <div class="home-text">
                        <div class="display-1">
                            Dapatkan Harga Terbaik dari Kami
                        </div>
                        <p class="white mb-5">
                            Harga yang kami berikan adalah harga terbaik dengan kualitas yang terjamin! Dapatkan Layanan dan Air dengan Mudah dengan Memesan Air dengan cara Online!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-circle btn-outline-semi-light hero-circle-button scrollTo" href="#content"
           id="homeCircleButton"><i
                    class="simple-icon-arrow-down"></i></a>
    </div>
    <div class="row">
        <div class="col-12 p-0">
            <div class="owl-container">
                <div class="owl-carousel home-carousel">
                    <?php

                    foreach ($item as $barang):


                    ?>
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="price-top-part">

                                <?=Html::img(Yii::getAlias('@web/upload/'.$barang->gambar),['class'=>'mb-3','width'=>'80%','height'=>'150px'])?>
                                <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4"><?=$barang-> nama?></h5>
                                <p class="text-large mb-2 text-default"><?=Yii::$app->formatter->asCurrency($barang-> harga)?></p>

                            </div>
                            <div class="pl-3 pr-3 pt-3 pb-0 d-flex price-feature-list flex-column">
                                <ul class="list-unstyled">
                                    <li>
                                        <p class="mb-0 ">
                                            <?=$barang-> deskripsi?>
                                        </p>
                                    </li>

                                </ul>
                                <div>
                                    <a href="#" class="btn btn-link btn-empty btn-lg">Pesan Sekarang <i
                                                class="simple-icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>


                </div>
            </div>
        </div>
    </div>
    <div class="section background background-no-bottom mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-0 col-lg-8 offset-lg-2 text-center">
                    <h1>Tertarik? Silahkan Klik Tombol dibawah</h1>
                    <p>
                        Kami akan Mencoba Memberikan Pelayanan Terbaik dari kami! silahkan login dan mulailah Pesan Air dengan Depot Kami!
                    </p>
                </div>

                <div class="col-12 offset-0 col-lg-6 offset-lg-3 newsletter-input-container">
                    <div class="text-center mb-3">
                        <button class="btn btn-secondary btn-xl" type="button">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


