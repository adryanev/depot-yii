<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pemesanan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5> <?= Html::encode($this->title) ?></h5>

                <div class="pemesanan-index">


                    <?php Pjax::begin(); ?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'summary' => false,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn', 'header' => 'No'],

//                            'id',
                            [
                                'attribute' => 'username',
                                'value' => 'user.username'
                            ],
                            'jumlah',
                            'alamat',
                            'telepon',
                            [
                                'attribute' => 'status',
                                'value' => 'statusPemesanan',
                                'filter' => false,
                            ],

                            [
                                'attribute' => 'created_at',
                                'filter' => false,
                                'format' => 'datetime'
                            ],
                            //'updated_at',

                            [
                                'class' => 'common\widgets\ActionColumn',
                                'header' => 'Aksi',
                                'template' => '{view}{delete}'
                            ],
                        ],
                    ]); ?>

                    <?php Pjax::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>



