<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PelangganSignupForm */
/* @var $modelUpload backend\models\ImageUploadForm */

$this->title = 'Tambah Pelanggan';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="user-create">
                    <h5> Form Pelanggan</h5>

                    <?= $this->render('_form', [
                        'model' => $model,
                        'modelUpload'=>$modelUpload
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>

