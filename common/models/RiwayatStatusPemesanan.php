<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "riwayat_status_pemesanan".
 *
 * @property int $id
 * @property int|null $id_pemesanan
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string $statusPemesanan
 *
 * @property Pemesanan $pemesanan
 */
class RiwayatStatusPemesanan extends \yii\db\ActiveRecord
{

    const STATUS_DITERIMA = Pemesanan::STATUS_DITERIMA;
    const STATUS_DIPROSES = Pemesanan::STATUS_DIPROSES;
    const STATUS_DIANTAR = Pemesanan::STATUS_DIANTAR;
    const STATUS_SELESAI = Pemesanan::STATUS_SELESAI;

    public function getStatusPemesanan(){
        $status = [
            self::STATUS_DITERIMA=>'Pesanan diterima',
            self::STATUS_DIPROSES=>'Sedang di proses',
            self::STATUS_DIANTAR=>'Dalam perjalanan',
            self::STATUS_SELESAI =>'Pesanan Selesai dan Sampai kepada pembeli.'
        ];
        return $status[$this->status];
    }

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
        return 'riwayat_status_pemesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_DITERIMA],
            ['status', 'in', 'range' => [self::STATUS_DITERIMA, self::STATUS_DIANTAR, self::STATUS_SELESAI,self::STATUS_DIPROSES]],
            [['id_pemesanan','status', 'created_at', 'updated_at'], 'integer'],
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
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
}
