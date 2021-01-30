<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Item */

$this->title = 'Ubah Item: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>

<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="item-update">
                    <h5> Form Item</h5>

                    <?= $this->render('_form', [
                        'model' => $model,
                        'uploadForm' => $uploadForm
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>



