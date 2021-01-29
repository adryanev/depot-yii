<?php

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
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <?php $this->beginBlock('action-button') ?>
                <div class="float-sm-right">
                    <?= Html::button('<i class=simple-icon-plus></i> Tambah Item', ['value' => Url::to(['create']), 'title' => 'Tambah Item', 'class' => 'showModalButton btn btn-success']); ?>
                </div>
                <?php  $this->endBlock() ?>
                <h5> <?= Html::encode($this->title) ?></h5>

                <div class="item-index">




                                                                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    
                                            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
        'columns' => [
                        ['class' => 'yii\grid\SerialColumn','header'=>'No'],

                                    'id',
            'nama',
            'harga',
            'gambar',
            'deskripsi:ntext',
            //'created_at',
            //'updated_at',

                        ['class' => 'common\widgets\ActionColumn','header'=>'Aksi'],
                        ],
                        ]); ?>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>



