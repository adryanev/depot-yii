<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


/* @var $this yii\web\View */
/* @var $modelPassword \common\models\UpdatePasswordForm */
/* @var $form yii\bootstrap4\ActiveForm;
*/
?>


<div class="user-form">

    <?php $form = ActiveForm::begin(['id'=>'password-form']); ?>

    <?=$form->field($modelPassword,'oldPassword')->passwordInput()?>
    <?=$form->field($modelPassword,'newPassword')->passwordInput()?>
    <?=$form->field($modelPassword,'repeatPassword')->passwordInput()?>


    <div class="mt-2 form-group float-right">
        <?= Html::submitButton('<i class=\'simple-icon-check\'></i> Simpan', ['class' => 'btn btn-xl btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
