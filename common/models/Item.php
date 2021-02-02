<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii2mod\cart\models\CartItemInterface;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string|null $nama
 * @property int|null $harga
 * @property string|null $gambar
 * @property string|null $deskripsi
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Item extends \yii\db\ActiveRecord implements CartPositionInterface
{
    use CartPositionTrait;


    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama','harga','deskripsi','gambar'],'required'],
            [['harga', 'created_at', 'updated_at'], 'integer'],
            [['deskripsi'], 'string'],
            [['nama', 'gambar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
            'harga' => Yii::t('app', 'Harga'),
            'gambar' => Yii::t('app', 'Gambar'),
            'deskripsi' => Yii::t('app', 'Deskripsi'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getPrice(): int
    {
        return  $this->harga;
    }


    public function getId()
    {
        return $this->id;
    }

}
