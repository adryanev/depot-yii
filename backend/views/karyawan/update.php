<?php

/* @var $this yii\web\View */
/* @var $model common\models\UpdateAccountForm */
/* @var $modelUpload backend\models\ImageUploadForm */
/* @var $modelPassword common\models\UpdatePasswordForm */

$this->title = 'Ubah Karyawan: ' . $model->user->nama;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan', 'url' => ['index']];
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
                    <h5> Ubah Kata Sandi </h5>

                    <?= $this->render('_update_password_form', [
                        'modelPassword'=>$modelPassword,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>



