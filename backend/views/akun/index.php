<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\User
 */

use yii\widgets\DetailView;

$this->title = 'Akun Saya';
$this->params['breadcrumbs'][] = ['label'=>$this->title];

?>

<div class="row">
    <div class="col-lg-4 col-12 mb-4">
        <div class="card mb-4">
            <div class="card-body text-center">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="img-fluid">
                            <?=\yii\helpers\Html::img('@web/upload/'.$model->foto,['alt'=>'Foto Profil','class'=>'img img-responsive','width'=>150])?>

                        </div>

                    </div>
                </div>

                <h5 class="font-weight-bold"><?=$model->nama?></h5>
                <h6 class="text-primary">Hak Akses: <?=$model->role->item_name?></h6>

                <?=\yii\helpers\Html::a('<i class="simple-icon-pencil"></i> UBAH',['update'],['class'=>'btn btn-xl btn-warning'])?>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12 mb-4">
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="mb-4">Detail Akun</h4>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
//                        'id',
                        'username',
//                            'auth_key',
//                            'password_hash',
//                            'password_reset_token',
                        'email:email',
                        'nama',
                        'alamat',
                        'telepon',
//                            'status',
//                        'created_at:datetime',
//                        'updated_at:datetime',
//                            'verification_token',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

