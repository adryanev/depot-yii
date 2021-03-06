<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Atur Ulang Kata Sandi';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="section home subpage-long">
    <div class="container">
        <div class="row home-row mb-0">
            <div class="col-12 col-lg-6 col-xl-4 col-md-12">
                <div class="home-text">
                    <div class="display-1">
                        <?= Html::encode($this->title) ?>
                    </div>
                    <p class="white mb-5">
                        Masukkan password baru anda.
                    </p>


                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form','options'=>['class'=>'dark-background']]); ?>



                    <?= $form->field($model, 'password',['options'=>['class'=>'form-group has-top-label','tag'=>'label']])->passwordInput(['autofocus' => true]) ?>



                    <div class="form-group">
                        <?= Html::submitButton('SIMPAN', ['class' => 'btn btn-outline-semi-light btn-xl mt-4', 'name' => 'login-button']) ?>
                    </div>


                    <?php ActiveForm::end(); ?>



                </div>
            </div>
        </div>
    </div>
</div>
