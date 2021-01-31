<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


/* @var $this yii\web\View */
/* @var $model \frontend\models\SignupForm */
/* @var $modelUpload \backend\models\ImageUploadForm */
/* @var $form yii\bootstrap4\ActiveForm;
*/
?>


<div class="user-form">

    <?php $form = ActiveForm::begin(['id'=>'user-form']); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelUpload, 'gambar')->widget(\kartik\file\FileInput::className(),[]) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class=\'simple-icon-check\'></i> Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
