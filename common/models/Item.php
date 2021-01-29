<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
class Item extends \yii\db\ActiveRecord
{


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
            'id' => 'ID',
            'nama' => 'Nama',
            'harga' => 'Harga',
            'gambar' => 'Gambar',
            'deskripsi' => 'Deskripsi',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
