<?php
/**
 * @var $model common\models\Item
 * @var $cart yz\shoppingcart\ShoppingCart
 */
$itemCart = $cart->getPositionById($model->id);
?>

<div class="card">
    <div class="card-body text-center ">
        <h3 class="text-capitalize mb-4"><?=$model->nama?></h3>
        <?=\yii\bootstrap4\Html::img(Yii::getAlias('@web/upload/'.$model->gambar),['width'=>300,'height'=>200,'class'=>'semi-rounded mx-auto d-block'])?>
        <h5 class="mt-3 mb-3"><?=Yii::$app->formatter->asCurrency($model->harga)?></h5>
        <p><?=$model->deskripsi?></p>

        <?=\yii\helpers\Html::a('<i class="simple-icon-plus"></i>',['add-to-cart','id'=>$model->id],['class'=>'btn btn-xs btn-success'])?>
        <?=\yii\bootstrap4\Html::textInput('jumlah',$itemCart ? $itemCart->quantity:'0',['readonly'=>true,'style'=>'width:50px','maxlength'=>1,'class'=>'text-center'])?>
        <?=\yii\helpers\Html::a('<i class="simple-icon-minus"></i>',['remove-from-cart','id'=>$model->id],['class'=>'btn btn-xs btn-danger'])?>

    </div>
</div>
