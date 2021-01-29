<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Masuk';
?>
<div class="form-side">
    <a href="Dashboard.Default.html">
        <span class="logo-single"></span>
    </a>
    <h6 class="mb-4"><?=Html::encode($this->title)?></h6>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>


    <?= $form->field($model, 'username',['options'=>['class'=>'form-group has-float-label mb-4','tag'=>'label']])->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password',['options'=>['class'=>'form-group has-float-label mb-4','tag'=>'label']])->passwordInput()?>

    <div class="d-flex justify-content-between align-items-center">
        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <?= Html::submitButton('MASUK', ['class' => 'btn btn-primary btn-lg btn-shadow', 'name' => 'login-button']) ?>
    </div>


    <?php ActiveForm::end(); ?>
</div>