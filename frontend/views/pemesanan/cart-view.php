<?php
/* @var $this yii\web\View */
/* @var $cart yz\shoppingcart\ShoppingCart */
/* @var $pemesanan common\models\Pemesanan */
/* @var $user User */

use common\models\User;
use yii\widgets\ListView;
$this->title = 'Keranjang Belanjaan'
?>

<div class="section home subpage">
    <div class="container">
        <div class="row home-row">
            <div class="col-12 col-xl-5 col-lg-12 col-md-12">
                <div class="home-text">
                    <div class="display-1">
                        Keranjang Anda
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

                <?php
                $colsCount = 3;
                $cl = 12 / $colsCount;
                echo ListView::widget([
                    'dataProvider' => $cartDataProvider,
                    'layout' => '{items}{pager}',
                    'options' => ['class' =>'mt-4' ],
                    'itemView' => '_cart_item',
                ]);
                ?>
                <?php $form= \yii\bootstrap4\ActiveForm::begin() ?>

                <div class="card mt-4">
                    <div class="card-body">
                        <?=$form->field($pemesanan,'id_user')->hiddenInput(['value'=>$user->id])->label(false)?>
                        <?=$form->field($pemesanan,'alamat')->textInput(['value'=>$user->alamat])?>
                        <?=$form->field($pemesanan,'telepon')->textInput(['value'=>$user->telepon])?>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="float-left mt-2">
                            Total: <?=Yii::$app->formatter->asCurrency($cart->cost)?>
                        </div>
                        <div class="float-right">
                            <?=\yii\bootstrap4\Html::submitButton('<i class="iconsmind-Money-2"></i> Pesan Sekarang',['class'=>'btn btn-primary',['data-confirm'=>'Apakah anda yakin untuk memesan ini?']])?>
                        </div>
                    </div>
                </div>
                <?php \yii\bootstrap4\ActiveForm::end() ?>

            </div>
        </div>
    </div>
</div>