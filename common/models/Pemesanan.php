<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "pemesanan".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $jumlah
 * @property string|null $tipe
 * @property string|null $alamat
 * @property string|null $telepon
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $user
 * @property RiwayatStatusPemesanan[] $riwayatStatusPemesanans
 */
class Pemesanan extends \yii\db\ActiveRecord
{
    const STATUS_DITERIMA = 'diterima';
    const STATUS_DIANTAR = 'dikirim';
    const STATUS_SELESAI = 'selesai';
    const STATUS_DIPROSES = 'diproses';

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
        return 'pemesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_DITERIMA],
            ['status', 'in', 'range' => [self::STATUS_DITERIMA, self::STATUS_DIANTAR, self::STATUS_SELESAI,self::STATUS_DIPROSES]],
            [['id_user', 'jumlah', 'status', 'created_at', 'updated_at'], 'integer'],
            [['tipe', 'alamat', 'telepon'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'jumlah' => 'Jumlah',
            'tipe' => 'Tipe',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * Gets query for [[RiwayatStatusPemesanans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatStatusPemesanans()
    {
        return $this->hasMany(RiwayatStatusPemesanan::className(), ['id_pemesanan' => 'id']);
    }
}
