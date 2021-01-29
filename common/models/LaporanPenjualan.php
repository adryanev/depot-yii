<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "laporan_penjualan".
 *
 * @property int $id
 * @property int|null $tanggal_mulai
 * @property int|null $tanggal_selesai
 * @property string|null $nama_berkas
 * @property string|null $isi_berkas
 * @property string|null $bentuk_berkas
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class LaporanPenjualan extends \yii\db\ActiveRecord
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
        return 'laporan_penjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_mulai', 'tanggal_selesai', 'created_at', 'updated_at'], 'integer'],
            [['nama_berkas', 'isi_berkas'], 'string', 'max' => 255],
            [['bentuk_berkas'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'nama_berkas' => 'Nama Berkas',
            'isi_berkas' => 'Isi Berkas',
            'bentuk_berkas' => 'Bentuk Berkas',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
