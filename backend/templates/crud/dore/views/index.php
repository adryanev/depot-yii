<?php

use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\helpers\Url;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <?= "<?php " ?>$this->beginBlock('action-button') ?>
                <div class="float-sm-right">
                    <?= "<?=" ?> Html::button(<?= $generator->generateString("<i class=simple-icon-plus></i> Tambah " . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, ['value' => Url::to(['create']), 'title' => <?= $generator->generateString("Tambah " . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, 'class' => 'showModalButton btn btn-success']); ?>
                </div>
                <?= "<?php "?> $this->endBlock() ?>
                <h5> <?= "<?= " ?>Html::encode($this->title) ?></h5>

                <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">




                    <?= $generator->enablePjax ? "    <?php Pjax::begin(); ?>\n" : '' ?>
                    <?php if(!empty($generator->searchModelClass)): ?>
                        <?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?php endif; ?>

                    <?php if ($generator->indexWidgetType === 'grid'): ?>
                        <?= "<?= " ?>GridView::widget([
                        'dataProvider' => $dataProvider,
                        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "'columns' => [\n"; ?>
                        ['class' => 'yii\grid\SerialColumn','header'=>'No'],

                        <?php
                        $count = 0;
                        if (($tableSchema = $generator->getTableSchema()) === false) {
                            foreach ($generator->getColumnNames() as $name) {
                                if (++$count < 6) {
                                    echo "            '" . $name . "',\n";
                                } else {
                                    echo "            //'" . $name . "',\n";
                                }
                            }
                        } else {
                            foreach ($tableSchema->columns as $column) {
                                $format = $generator->generateColumnFormat($column);
                                if (++$count < 6) {
                                    echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                } else {
                                    echo "            //'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                }
                            }
                        }
                        ?>

                        ['class' => 'common\widgets\ActionColumn','header'=>'Aksi'],
                        ],
                        ]); ?>
                    <?php else: ?>
                        <?= "<?= " ?>ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemOptions' => ['class' => 'item'],
                        'itemView' => function ($model, $key, $index, $widget) {
                        return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
                        },
                        ]) ?>
                    <?php endif; ?>

                    <?= $generator->enablePjax ? "    <?php Pjax::end(); ?>\n" : '' ?>

                </div>
            </div>
        </div>
    </div>
</div>



