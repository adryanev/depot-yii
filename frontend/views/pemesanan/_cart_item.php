<?php
/**
 * @var $model common\models\Item
 * @var $cart yz\shoppingcart\ShoppingCart
 */
?>

<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-8 float-left">
                <div class="d-inline">
                    <?= \yii\bootstrap4\Html::img(Yii::getAlias('@web/upload/' . $model->gambar),
                        ['width' => 80, 'height' => 80, 'class' => 'semi-rounded']) ?> &nbsp;

                </div>
                <div style="display:inline;"><h3 class="text-capitalize mb-4 d-inline"><?= $model->nama ?></h3>
                    <p class="mt-3 mb-3 d-inline">(<?= Yii::$app->formatter->asCurrency($model->harga) ?>)</p></div>
            </div>
            <div class="col-4 mt-4">
                <div class="pull-right">
                    <?= \yii\helpers\Html::a('<i class="simple-icon-plus"></i>', ['add-to-cart', 'id' => $model->id],
                        ['class' => 'btn btn-xs btn-success']) ?>
                    <?= \yii\bootstrap4\Html::textInput('jumlah', $model->quantity,
                        ['readonly' => true, 'style' => 'width:50px', 'maxlength' => 1, 'class' => 'text-center']) ?>
                    <?= \yii\helpers\Html::a('<i class="simple-icon-minus"></i>', ['remove-from-cart', 'id' => $model->id],
                        ['class' => 'btn btn-xs btn-danger']) ?>
                </div>

            </div>
        </div>


    </div>
</div>
