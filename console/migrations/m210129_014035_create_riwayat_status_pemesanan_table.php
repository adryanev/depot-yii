<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%riwayat_status_pemesanan}}`.
 */
class m210129_014035_create_riwayat_status_pemesanan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%riwayat_status_pemesanan}}', [
            'id' => $this->primaryKey(),
            'id_pemesanan'=>$this->integer(),
            'status'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->addForeignKey('fk-riwayat_status_pemesanan-pemesanan','{{%riwayat_status_pemesanan}}','id_pemesanan','{{%pemesanan}}','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%riwayat_status_pemesanan}}');
    }
}
