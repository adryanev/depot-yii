<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Item */

$this->title = 'Tambah Item';
$this->params['breadcrumbs'][] = ['label' => 'Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="item-create">
                    <h5> Form Item</h5>

                    <?= $this->render('_form', [
                        'model' => $model,
                        'uploadForm' => $uploadForm,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>

