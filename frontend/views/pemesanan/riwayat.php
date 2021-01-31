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
                       Riwayat Pemesanan
                    </div>
                    <p class="white">
                        Berikut Riwayat Pemesanan Anda
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
                <h2 class="mb-3">Riwayat Pemesanan Anda</h2>


                <?=\yii\grid\GridView::widget([
                        'dataProvider'=>$dataProvider,
                    'summary'=>false,
                    'columns'=>[
                            ['class'=>\yii\grid\SerialColumn::class,'header'=>'No'],
                            'id',
                        'alamat',
                        'telepon',
                        'statusPemesanan',
                        'created_at:datetime',
                        ['class'=>\common\widgets\ActionColumn::class,

                            'template'=>'{view}']
                    ]
                ])?>

            </div>
        </div>
    </div>
</div>