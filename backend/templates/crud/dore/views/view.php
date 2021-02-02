<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\bootstrap4\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5> <?= "<?= " ?>Html::encode($this->title) ?></h5>
                <?= "<?php " ?>$this->beginBlock('action-button') ?>
                <div class="float-sm-right">
                    <?="<?= "?>Html::a('<i class="simple-icon-pencil"> Edit</i>',['update', <?= $urlParams ?>],['class'=>'btn btn-lg btn-warning '])?>
                    <?="<?= "?>Html::a('<i class="simple-icon-trash"> Hapus </i>',['delete', <?= $urlParams ?>],['class'=>'btn btn-lg btn-danger', 'data' => [
                    'confirm' => <?= $generator->generateString('Apakah anda yakin untuk menghapus item ini?') ?>,
                    'method' => 'post',
                    ],])?>
                </div>
                <?= "<?php "?> $this->endBlock() ?>

                <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">


                    <?= "<?= " ?>DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                    <?php
                    if (($tableSchema = $generator->getTableSchema()) === false) {
                        foreach ($generator->getColumnNames() as $name) {
                            echo "            '" . $name . "',\n";
                        }
                    } else {
                        foreach ($generator->getTableSchema()->columns as $column) {
                            $format = $generator->generateColumnFormat($column);
                            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                        }
                    }
                    ?>
                    ],
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>



