<?php


namespace common\auth\rbac\rules;


use common\models\Pemesanan;
use yii\rbac\Item;

class AccessOwnPesanan extends \yii\rbac\Rule
{
    public $name = 'accessOwnPesanan';

    /**
     * @inheritDoc
     */
    public function execute($user, $item, $params)
    {
        $pesanan = Pemesanan::findOne(['id']);

        return $user === $pesanan->id_user;
    }
}