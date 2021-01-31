<?php

namespace common\models;

use common\components\NotificationHandler;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "pemesanan".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $jumlah
 * @property string|null $alamat
 * @property string|null $telepon
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $user
 * @property RiwayatStatusPemesanan[] $riwayatStatusPemesanans
 * @property DetailPemesanan[] $details
 */
class Pemesanan extends \yii\db\ActiveRecord
{
    const STATUS_DITERIMA = 'diterima';
    const STATUS_DIANTAR = 'diantar';
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
            [['alamat', 'telepon'], 'string', 'max' => 255],
            ['status','safe'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'Id User'),
            'jumlah' => Yii::t('app', 'Jumlah'),
            'alamat' => Yii::t('app', 'Alamat'),
            'telepon' => Yii::t('app', 'Telepon'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetails()
    {
        return $this->hasMany(DetailPemesanan::className(), ['id_pemesanan'=>'id']);
    }

    public function init()
    {
        $notificationHandler = new NotificationHandler();
        $this->on(self::EVENT_AFTER_INSERT, [$notificationHandler,'sendNotification'],['entity'=>$this,'entity_type'=>1]);
        $this->on(self::EVENT_AFTER_UPDATE, [$notificationHandler,'sendNotification'],['entity'=>$this,'entity_type'=>null]);
        parent::init();
    }
}
