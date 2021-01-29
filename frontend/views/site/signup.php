<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
$this->title = 'Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="section home subpage-long">
        <div class="container">
            <div class="row home-row mb-0">
                <div class="col-12 col-lg-6 col-xl-4 col-md-12">
                    <div class="home-text">
                        <div class="display-1">
                            <?=$this->title?>
                        </div>
                        <p class="white mb-5">
                            Silahkan gunakan form berikut untuk mendaftar
                            Jika sudah memiliki akun, silahkan <?=Html::a(Yii::t('app','masuk'),['site/login'],['class'=>'white-underline-link'])?>.
                        </p>


                        <?php $form = ActiveForm::begin(['id' => 'form-signup','options'=>['class'=>'dark-background']]); ?>

                        <?= $form->field($model, 'username',['options'=>['class'=>'form-group has-top-label','tag'=>'label']])->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'email',['options'=>['class'=>'form-group has-top-label','tag'=>'label']]) ?>

                        <?= $form->field($model, 'password',['options'=>['class'=>'form-group has-top-label','tag'=>'label']])->passwordInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Daftar', ['class' => 'btn btn-outline-semi-light btn-xl mt-4', 'name' => 'signup-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
