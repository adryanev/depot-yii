<?php

use common\widgets\ActionColumn;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model yii\base\DynamicModel */

$this->title = 'Cetak Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> <?= Html::encode($this->title) ?></h5>

                <div class="laporan-index">
                    <?php $form = ActiveForm::begin() ?>
                    <?= $form->field($model, 'dari')->widget(\kartik\datecontrol\DateControl::className(),[
                        'type' => \kartik\datecontrol\Module::FORMAT_DATE,
                        'widgetOptions' => [
                            'pluginOptions'=>['autoclose'=>true]
                        ]
                    ]) ?>
                    <?= $form->field($model, 'sampai')->widget(\kartik\datecontrol\DateControl::className(),[
                        'type' => \kartik\datecontrol\Module::FORMAT_DATE,
                        'widgetOptions' => [
                            'pluginOptions'=>['autoclose'=>true]
                        ]
                    ]) ?>
                    <div class="form-group">
                        <?=Html::submitButton('<i class="simple-icon-printer"></i> Cetak',['class'=>'btn btn-primary btn-xl'])?>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>

            </div>
        </div>
    </div>
</div>



