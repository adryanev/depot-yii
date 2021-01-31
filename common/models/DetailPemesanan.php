<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_pemesanan".
 *
 * @property int $id
 * @property int|null $id_pemesanan
 * @property int|null $id_item
 * @property int|null $qty
 * @property int|null $total
 *
 * @property Pemesanan $pemesanan
 * @property Item $item
 */
class DetailPemesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_pemesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemesanan', 'id_item', 'qty','total'], 'integer'],
            [['id_pemesanan'], 'exist', 'skipOnError' => true, 'targetClass' => Pemesanan::className(), 'targetAttribute' => ['id_pemesanan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pemesanan' => Yii::t('app', 'Id Pemesanan'),
            'id_item' => Yii::t('app', 'Id Item'),
            'qty' => Yii::t('app', 'Jumlah'),
            'Total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * Gets query for [[Pemesanan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanan()
    {
        return $this->hasOne(Pemesanan::className(), ['id' => 'id_pemesanan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem(){
        return $this->hasOne(Item::className(),['id'=>'id_item']);
    }
}
