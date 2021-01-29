<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model common\models\Item */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5> <?= Html::encode($this->title) ?></h5>
                <?php$this->beginBlock('action-button') ?>
                <div class="float-sm-right">
                    <?= Html::a('<i class="simple-icon-pencil"> Edit</i>',['update', 'id' => $model->id],['class'=>'btn btn-lg btn-outline-warning '])?>
                    <?= Html::a('<i class="simple-icon-trash"> Hapus </i>',['delete', 'id' => $model->id],['class'=>'btn btn-lg btn-outline-danger', 'data' => [
                    'confirm' => 'Apakah anda yakin untuk menghapus item ini?',
                    'method' => 'post',
                    ],])?>
                </div>
                <?php  $this->endBlock() ?>

                <div class="item-view">


                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                                'id',
            'nama',
            'harga',
            'gambar',
            'deskripsi:ntext',
            'created_at',
            'updated_at',
                    ],
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>



