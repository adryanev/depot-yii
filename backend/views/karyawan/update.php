<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Ubah User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>

<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="user-update">
                    <h5> <?= Form user ?></h5>

                    <?= $this->render('_form', [
                    'model' => $model,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>



