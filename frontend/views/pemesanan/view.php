<?php
/* @var $this yii\web\View */
/* @var $cart yz\shoppingcart\ShoppingCart */
/* @var $pemesanan common\models\Pemesanan */
/* @var $user User */

use common\models\User;
use yii\widgets\ListView;
$this->title = 'Pemesanan Anda'
?>

<div class="section home subpage">
    <div class="container">
        <div class="row home-row">
            <div class="col-12 col-xl-5 col-lg-12 col-md-12">
                <div class="home-text">
                    <div class="display-1">
                        Pemesanan Anda
                    </div>
                    <p class="white mb-5">
                        Lihat barang yang anda pesan di keranjang ini.
                    </p>
                </div>

            </div>
        </div>
    </div>
    <a class="btn btn-circle btn-outline-semi-light hero-circle-button scrollTo" href="#content"
       id="homeCircleButton"><i
                class="simple-icon-arrow-down"></i></a>
</div>
<div class="section">
    <div class="container" id="content">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-3">Keranjang Anda</h2>


            </div>
        </div>
    </div>
</div>