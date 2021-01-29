<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%laporan_penjualan}}`.
 */
class m210129_013546_create_laporan_penjualan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%laporan_penjualan}}', [
            'id' => $this->primaryKey(),
            'tanggal_mulai'=>$this->integer(),
            'tanggal_selesai'=>$this->integer(),
            'nama_berkas'=>$this->string(),
            'isi_berkas'=>$this->string(),
            'bentuk_berkas'=>$this->string(5),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%laporan_penjualan}}');
    }
}
