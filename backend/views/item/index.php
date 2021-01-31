<?php

use common\widgets\ActionColumn;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <?php $this->beginBlock('action-button') ?>
                <div class="float-sm-right">
                    <?= Html::button('<i class=simple-icon-plus></i> Tambah Item', [
                        'value' => Url::to(['create']),
                        'title' => 'Tambah Item',
                        'class' => 'showModalButton btn btn-success'
                    ]); ?>
                </div>
                <?php $this->endBlock() ?>
                <h5> <?= Html::encode($this->title) ?></h5>

                <div class="item-index">


                    <?php \yii\widgets\Pjax::begin()?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn', 'header' => 'No'],

//                                    'id',
                            'nama',
                            'harga:currency',
                            [
                                'attribute' => 'gambar',
                                'format' => ['image', ['width' => '100','height'=>'100']],
                                'value' => function ($model,$url,  $key) {
                                    return Yii::getAlias('@web/upload/' . $model->gambar);
                                }
                            ],
                            'deskripsi:ntext',
                            //'created_at',
                            //'updated_at',

                            ['class' => ActionColumn::class, 'header' => 'Aksi'],
                        ],
                    ]); ?>

                    <?php \yii\widgets\Pjax::end()?>


                </div>
            </div>
        </div>
    </div>
</div>



