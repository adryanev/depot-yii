<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5> <?= Html::encode($this->title) ?></h5>
                <?php$this->beginBlock('action-button') ?>
                <div class="float-sm-right">
                    <?= Html::a('<i class="simple-icon-pencil"> Edit</i>',['update', 'id' => $model->id],['class'=>'btn btn-lg btn-warning '])?>
                    <?= Html::a('<i class="simple-icon-trash"> Hapus </i>',['delete', 'id' => $model->id],['class'=>'btn btn-lg btn-danger', 'data' => [
                    'confirm' => 'Apakah anda yakin untuk menghapus item ini?',
                    'method' => 'post',
                    ],])?>
                </div>
                <?php  $this->endBlock() ?>

                <div class="user-view">


                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                                'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'nama',
            'alamat',
            'telepon',
            'status',
            'created_at',
            'updated_at',
            'verification_token',
            'foto',
                    ],
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>



