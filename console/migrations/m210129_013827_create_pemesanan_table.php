<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pemesanan}}`.
 */
class m210129_013827_create_pemesanan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pemesanan}}', [
            'id' => $this->primaryKey(),
            'id_user'=>$this->integer(),
            'jumlah'=>$this->integer(3),
            'tipe'=>$this->string(),
            'alamat'=>$this->string(),
            'telepon'=>$this->string(),
            'status'=>$this->tinyInteger(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->addForeignKey('fk-pemesanan-user','{{%pemesanan}}','id_user','{{%user}}','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pemesanan}}');
    }
}
