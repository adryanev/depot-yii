<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Item */
/* @var $form yii\bootstrap4\ActiveForm;
*/
?>


<div class="item-form">

    <?php $form = ActiveForm::begin(['id'=>'item-form']); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'gambar')->widget(\kartik\file\FileInput::className(),[
    ]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton('<i class=\'simple-icon-check\'></i> Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
