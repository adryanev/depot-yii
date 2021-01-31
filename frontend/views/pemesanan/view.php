<?php
/* @var $this yii\web\View */

/* @var $pemesanan common\models\Pemesanan */

use common\models\User;
use yii\widgets\DetailView;
use yii\widgets\ListView;

$this->title = 'Pemesanan Anda'
?>

<div class="section home subpage">
    <div class="container">
        <div class="row home-row">
            <div class="col-12 col-xl-5 col-lg-12 col-md-12">
                <div class="home-text">
                    <div class="display-1">
                        Pemesanan: <?= $pemesanan->id ?>
                    </div>
                    <p class="white">
                        Status: <?=$pemesanan->statusPemesanan?>
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
                <h2 class="mb-3">Pemesanan Anda</h2>

                <?= DetailView::widget([
                    'model' => $pemesanan,
                    'attributes' => [
                        'id',
                        'user.nama',
                        'alamat',
                        'telepon',
                        'statusPemesanan',
                        'created_at:datetime'

                    ]
                ]) ?>

                <h3 class="mt-4 mb-e">Detail Pemesanan</h3>
                <?=\yii\grid\GridView::widget([
                        'dataProvider'=>new \yii\data\ActiveDataProvider(['query'=>$pemesanan->getDetails()]),
                    'summary'=>false,
                    'columns'=>[
                        ['class'=>\yii\grid\SerialColumn::class,'header'=>'No'],
                        'item.nama',
                        'qty',
                        'total',
                    ]
                ])?>

            </div>
        </div>
    </div>
</div>