<?php

use common\models\Pemesanan;
use yii\bootstrap4\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */
/* @var $riwayat common\models\RiwayatStatusPemesanan[] */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pemesanan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-9">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <?= Html::encode($this->title) ?></h4>
                <?php if(!($model->status === Pemesanan::STATUS_SELESAI)):?>
                <?php $this->beginBlock('action-button') ?>
                <div class="float-sm-right">
                    <?= Html::a(
                        '<i class="iconsmind-Add-Cart"> PROSES</i>',
                        ['update-status'],
                        [
                            'class' => 'btn btn-lg btn-primary ',
                            'data-method' => 'POST',
                            'data-params' => [
                                'id' => $model->id,
                                'status' => Pemesanan::STATUS_DIPROSES,
                            ]
                        ]
                    ) ?>
                    <?= Html::a(
                        '<i class="iconsmind-Mail-Send"> KIRIM</i>',
                        ['update-status'],
                        [
                            'class' => 'btn btn-lg btn-info ',
                            'data-method' => 'POST',
                            'data-params' => ['id' => $model->id, 'status' => Pemesanan::STATUS_DIANTAR,]
                        ]
                    ) ?>
                    <?= Html::a(
                        '<i class="simple-icon-check"> SELESAI</i>',
                        ['update-status'],
                        [
                            'class' => 'btn btn-lg btn-success ',
                            'data-method' => 'POST',
                            'data-params' => ['id' => $model->id, 'status' => Pemesanan::STATUS_SELESAI,]
                        ]
                    ) ?>

                </div>
                <?php $this->endBlock() ?>
                <?php endif; ?>

                <div class="pemesanan-view">


                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'user.username',
                            'jumlah:currency',
                            'alamat',
                            'telepon',
                            'statusPemesanan',
                            'created_at:datetime',
                            'updated_at:datetime',
                        ],
                    ]) ?>

                    <div class="separator"></div>
                    <h5 class="mt-3">Detail Pemesanan</h5>
                    <?= GridView::widget([
                        'dataProvider' => new ActiveDataProvider(['query' => $model->getDetails()]),
                        'summary' => false,
                        'columns' => [
                            ['class' => SerialColumn::class, 'header' => 'No'],
                            'item.nama',
                            'qty',
                            'total:currency'
                        ]
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Riwayat Pemesanan</h5>
                <div class="scroll">

                    <?php foreach ($riwayat as $value): ?>
                        <div class="mt-3 pl-3 pt-2 pr-2 pb-2 table-bordered">
                                <p class="list-item-heading"><?= $value->statusPemesanan ?></p>
                                <div class="text-primary text-small font-weight-medium"><?= Yii::$app->formatter->asDatetime($value->created_at) ?></div>
                        </div>
                    <?php endforeach; ?>


                </div>
            </div>
        </div>
    </div>
</div>



