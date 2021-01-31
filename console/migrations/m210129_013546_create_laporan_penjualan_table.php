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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%laporan_penjualan}}', [
            'id' => $this->primaryKey(),
            'tanggal_mulai'=>$this->integer(),
            'tanggal_selesai'=>$this->integer(),
            'nama_berkas'=>$this->string(),
            'isi_berkas'=>$this->string(),
            'bentuk_berkas'=>$this->string(5),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%laporan_penjualan}}');
    }
}
