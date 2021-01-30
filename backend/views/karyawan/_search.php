<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KaryawanSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="user-search">

                    <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                                            'options' => [
                        'data-pjax' => 1
                        ],
                                        ]); ?>

                        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'password_hash') ?>

    <?= $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'telepon') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'verification_token') ?>

    <?php // echo $form->field($model, 'foto') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>
        </div>
    </div>
</div>
