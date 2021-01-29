<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Kirim Ulang Verifikasi Email';
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
                        Silahkan isi email untuk pengiriman kode verifikasi.
                    </p>


                    <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form','options'=>['class'=>'dark-background']]); ?>

                    <?= $form->field($model, 'email',['options'=>['class'=>'form-group has-top-label','tag'=>'label']])->textInput(['autofocus' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('KIRIM', ['class' => 'btn btn-outline-semi-light btn-xl mt-4' ]) ?>
                    </div>


                    <?php ActiveForm::end(); ?>



                </div>
            </div>
        </div>
    </div>
</div>
