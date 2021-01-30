<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <?php $this->beginBlock('action-button') ?>
                <div class="float-sm-right">
                    <?= Html::button('<i class=simple-icon-plus></i> Tambah Karyawan', [
                        'value' => Url::to(['create']),
                        'title' => 'Tambah Karyawan',
                        'class' => 'showModalButton btn btn-success'
                    ]); ?>
                </div>
                <?php $this->endBlock() ?>
                <h5> <?= Html::encode($this->title) ?></h5>

                <div class="user-index">


                    <?php Pjax::begin(); ?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn', 'header' => 'No'],

//                            'id',
//                            'username',
//                            'auth_key',
//                            'password_hash',
//                            'password_reset_token',
//                            'email:email',
                            'nama',
//                            'alamat',
                            'telepon',
                            'foto',
                            //'status',
//                            'created_at:datetime',
                            //'updated_at',
                            //'verification_token',


                            ['class' => 'common\widgets\ActionColumn', 'header' => 'Aksi'],
                        ],
                    ]); ?>

                    <?php Pjax::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>



