<?php
/* @var $this yii\web\View */
/* @var $cart yz\shoppingcart\ShoppingCart */

/* @var $produkDataProvider yii\data\ActiveDataProvider */

use yii\widgets\ListView;

$this->title = 'Pemesanan';
?>


<div class="section home subpage">
    <div class="container">
        <div class="row home-row">
            <div class="col-12 col-xl-5 col-lg-12 col-md-12">
                <div class="home-text">
                    <div class="display-1">
                        Pemesanan
                    </div>
                    <p class="white mb-5">
                        Anda bisa memesan produk yang kami tawarkan di bawah ini.
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
                <h2 class="mb-3">Produk Kami</h2>

                <?=\yii\helpers\Html::a('<i class="iconsmind-Shopping-Cart"></i class="iconsmind-Shopping-Cart"> LIHAT KERANJANG',['cart-view'],['class'=>'btn btn-primary'])?>


                <?php
                $colsCount = 3;
                $cl = 12 / $colsCount;
                echo ListView::widget([
                    'dataProvider' => $produkDataProvider,
                    'layout' => '{items}{pager}',
                    'options' => ['class' =>'mt-4' ],
                    'itemOptions' => ['class' => 'col-md-12 mb-4 col-lg-'. $cl],
                    'beforeItem' => function ($model, $key, $index, $widget) use ($cl) {
                        if ($index % $cl === 0) {
                            return "<div class='row'>";
                        }
                        return '';
                    },
                    'itemView' => '_produk_item',
                    'viewParams'=>['cart'=>$cart],
                    'afterItem' => function ($model, $key, $index, $widget) use ($cl) {
                        $content = '';
                        if (($index > 0) && ($index % $cl === $cl - 1)) {
                            $content .= '</div>';
                        }
                        return $content;
                    },
                ]);
                if ($produkDataProvider->count % $cl !== 0) {
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
