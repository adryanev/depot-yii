<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Item */
/* @var $uploadForm backend\models\ImageUploadForm */
/* @var $form yii\bootstrap4\ActiveForm;
*/
?>


<div class="item-form">

    <?php $form = ActiveForm::begin(['id'=>'item-form']); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?php if(!$model->isNewRecord && $model->gambar):?>
    <p>Gambar Saat ini: <small class="text-danger"><?=$model->gambar?></small></p>
        <div class="row">
            <div class="col-lg-12">
                <?=Html::img(Yii::getAlias('@web/upload/'.$model->gambar),['class'=>'img img-responsive mb-3','width'=>'50%'])?>

            </div>
        </div>
    <div class="clearfix"></div>


    <?php endif?>


    <?=$form->field($uploadForm,'gambar')->widget(\kartik\file\FileInput::className(),[

    ])?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton('<i class=\'simple-icon-check\'></i> Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
