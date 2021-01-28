<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
$this->context->layout = 'main-login';
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="section home subpage-long">
        <div class="container">
            <div class="row home-row mb-0">
                <div class="col-12 col-lg-6 col-xl-4 col-md-12">
                    <div class="home-text">
                        <div class="display-1">
                            Masuk
                        </div>
                        <p class="white mb-5">
                            Silahkan masuk menggunakan akun anda.<br>
                            Jika belum memiliki akun, silahkan <?=Html::a('mendaftar',['site/signup'],['class'=>'white-underline-link'])?>.
                        </p>


                        <?php $form = ActiveForm::begin(['id' => 'login-form','options'=>['class'=>'dark-background']]); ?>


                                <?= $form->field($model, 'username',['options'=>['class'=>'form-group has-top-label','tag'=>'label']])->textInput(['autofocus' => true]) ?>

                                <?= $form->field($model, 'password',['options'=>['class'=>'form-group has-top-label','tag'=>'label']])->passwordInput()?>


                        <?= $form->field($model, 'rememberMe',['options'=>['class'=>'white']])->checkbox() ?>
                        <div style="color:#fff;margin:1em 0">
                            Lupa password? <?= Html::a('Atur ulang', ['site/request-password-reset']) ?>.
                            <br>
                            Butuh verifikasi email baru? <?= Html::a('Kirim ulang', ['site/resend-verification-email']) ?>
                        </div>


                        <div class="form-group">
                            <?= Html::submitButton('MASUK', ['class' => 'btn btn-outline-semi-light btn-xl mt-4', 'name' => 'login-button']) ?>
                        </div>


                        <?php ActiveForm::end(); ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
