<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\UpdateAccountForm */

$this->title = 'Ubah Karyawan: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->nama, 'url' => ['view', 'id' => $model->user->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="user-update">
                    <h5> Form Update Karyawan </h5>

                    <?= $this->render('_update_form', [
                    'model' => $model,
                        'modelUpload'=>$modelUpload,
                    ]) ?>

                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="password-update">
                    <h5> Update Passwod </h5>

                    <?= $this->render('_update_password_form', [
                        'modelPassword'=>$modelPassword,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>



